<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Profesores;
use App\Models\Alumnos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UsuariosController extends Controller
{
    public function Login()
    {
        $respuesta = Usuarios::login(request()->all());
        if ($respuesta) {
            $rutaUrl = 'http://localhost/PEDIGITAL/public/app-assets/images/';

            if ($respuesta->tipo_usuario == "Profesor") {
                $FotoUsu = Profesores::Buscar($respuesta->id);
                Session::put('ImgUsu', $rutaUrl . 'Img_Docentes/' . $FotoUsu->foto);
            } else if ($respuesta->tipo_usuario == "Estudiante") {
                $FotoUsu = Alumnos::Buscar($respuesta->id);
                Session::put('ImgUsu', $rutaUrl . 'Img_Estudiantes/' . $FotoUsu->foto_alumno);
                Session::put('GrupoEst', $FotoUsu->grupo);
            } else if ($respuesta->tipo_usuario == "root") {
                Session::put('ImgUsu', $rutaUrl . 'avatar-s-1.png');
            } else {
                Session::put('ImgUsu', $rutaUrl . 'avatar-s-1.png');
            }

            return redirect('Administracion');
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
            return view('Administracion');
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
}
