<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Usuarios extends Model
{

    public static function login($request)
    {
        $usuario = DB::connection("mysql")->select("select * from users where login_usuario ='" . $request['usuario'] . "' AND estado_usuario='ACTIVO'");
        if (!empty($usuario)) {
            $usuario = $usuario[0];
            if (\Hash::check($request['pasword'], $usuario->pasword_usuario)) {
                auth()->loginUsingId($usuario->id);
                return $usuario;
            }
        }
        return false;
    }

    public static function Buscar($id)
    {
        return DB::connection('mysql')->table('pedigital.users')
            ->where('pedigital.users.id', $id)->first();
    }

    public static function guardar($request)
    {
       
        $respuesta = DB::connection('mysql')->table('pedigital.alumnos')->where('usuario_alumno', Auth::user()->id)->update([
            'nombre' => $request['identificacion'],
            'login' => $request['login'],
            'email_usuario' => $request['apellido'],
            'direccion_alumno' => $request['direccion'],
            'telefono_alumno' => $request['telefono'],
            'email_alumno' => $request['email'],
            'foto_alumno' => $request['img']
        ]);
        return  "ok";
    }
}


 
