<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Profesores;
use App\Models\Alumnos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UsuariosController extends Controller
{
    public function Login()
    {
        $respuesta = Usuarios::login(request()->all());
        if ($respuesta) {


            $UrlReal = Usuarios::ConsulUrl("PED");
            $rutaUrl = $UrlReal->url;

            $rutaUrl =  $UrlReal->url.'/app-assets/images/';
            if ($respuesta->tipo_usuario == "Profesor") {
                $FotoUsu = Profesores::Buscar($respuesta->id);
                Session::put('ImgUsu', $rutaUrl . 'Img_Docentes/' . $FotoUsu->foto);
                Session::put('imgDefaults', $rutaUrl . 'Img_Docentes/49_defaul_profesor.jpg');
            } else if ($respuesta->tipo_usuario == "Estudiante") {
                $FotoUsu = Alumnos::Buscar($respuesta->id);
                Session::put('ImgUsu', $rutaUrl . 'Img_Estudiantes/' . $FotoUsu->foto);
                Session::put('imgDefaults', $rutaUrl . 'Img_Estudiantes/estud_mas_defaul.jpg');
            } else if ($respuesta->tipo_usuario == "root") {
                Session::put('ImgUsu', $rutaUrl . 'avatar-s-1.png');
                Session::put('imgDefaults', $rutaUrl . 'avatar-s-1.png');
            } else {
                Session::put('ImgUsu', $rutaUrl . 'avatar-s-1.png');
                Session::put('imgDefaults', $rutaUrl . 'avatar-s-1.png');
            }

            return redirect('Principal');
        } else {
            $error = "Usuario ó Contraseña Inconrrecta";
            return redirect('/')->with('error', $error);
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Sesión Finalizada');
    }


    public function Administracion()
    {
        if (Auth::check()) {
            return view('Principal');
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function Perfil()
    {
        if (Auth::check()) {
            if (Auth::user()->tipo_usuario == "Profesor") {
                $Usuario = Profesores::Buscar(Auth::user()->id);
                return view('Administracion.Perfil', compact('Usuario'));
            } else if (Auth::user()->tipo_usuario == "Estudiante") {
                $Usuario = Alumnos::Buscar(Auth::user()->id);
                return view('Administracion.Perfil', compact('Usuario'));
            } else {
                return redirect('/Principal');
            }


            return view('Administracion.Perfil', compact('Usuario'));
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function ValidarUsuario()
    {
        if (Auth::check()) {
            $idUsu = request()->get('idUsus');
            $existe = "no";

            $users = DB::connection('mysql')
                ->table('pedigital.users')
                ->where('login_usuario', $idUsu)
                ->where('estado_usuario', 'ACTIVO')
                ->where('login_usuario', '!=', Auth::user()->login_usuario)
                ->first();

            if ($users) {
                $existe = "si";
            }

            return response()->json([
                'existe' => $existe,

            ]);
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function ValidarIdentificacion()
    {
        if (Auth::check()) {
            $ident = request()->get('ident');
            $existe = "no";

            if (Auth::user()->tipo_usuario == "Estudiante") {

                $usuario = DB::connection('mysql')
                    ->table('pedigital.alumnos')
                    ->where('ident_alumno', $ident)
                    ->where('estado_alumno', 'ACTIVO')
                    ->where('usuario_alumno', '!=', Auth::user()->login_usuario)
                    ->first();
            } else {

                $usuario = DB::connection('mysql')
                    ->table('pedigital.profesores')
                    ->where('identificacion', $ident)
                    ->where('estado', 'ACTIVO')
                    ->where('usuario_profesor', '!=', Auth::user()->login_usuario)
                    ->first();
            }

            if ($usuario) {
                $existe = "si";
            }

            return response()->json([
                'existe' => $existe
            ]);
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function GuardarPerfil()
    {
        if (Auth::check()) {
            $data = request()->all();
            $rutaUrl = 'http://localhost/PEDIGITAL/public/app-assets/images/';

            if (Auth::user()->tipo_usuario == 'Estudiante') {

                if (isset($data['fotoUsuario'])) {
                    $archivo = $data['fotoUsuario'];
                    $nombreOriginal = $archivo->getClientOriginalName();
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $nombreArchivo = self::sanear_string($prefijo . '_' . $nombreOriginal);
                    $archivo->move($rutaUrl . '/app-assets/images/Img_Estudiantes/', $nombreArchivo);
                    $data['img'] = $nombreArchivo;
                } else {
                    $data['img'] = $data['foto'];
                }

                $respuesta = Alumnos::guardar($data);
            } else if (Auth::user()->tipo_usuario == 'Profesor') {
                if (isset($data['fotoUsuario'])) {
                    $archivo = $data['fotoUsuario'];
                    $nombreOriginal = $archivo->getClientOriginalName();
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $nombreArchivo = self::sanear_string($prefijo . '_' . $nombreOriginal);
                    $archivo->move($rutaUrl . '/app-assets/images/Img_Docentes/', $nombreArchivo);
                    $data['img'] = $nombreArchivo;
                } else {
                    $data['img'] = $data['foto'];
                }
                $respuesta = Profesores::guardar($data);
            }
            $respuesta = Usuarios::guardar($data);

            if (request()->ajax()) {
                return response()->json([
                    'estado' => "ok"
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function sanear_string($string)
    {

        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array(
                "¨", "º", "-", "~", "", "@", "|", "!",
                "·", "$", "%", "&", "/",
                "(", ")", "?", "'", " h¡",
                "¿", "[", "^", "<code>", "]",
                "+", "}", "{", "¨", "´",
                ">", "< ", ";", ",", ":",
                " ",
            ),
            '',
            $string
        );

        return $string;
    }
}
