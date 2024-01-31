<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

public static function ConsulUrl($plat){
    return DB::connection('mysql')->table('para_generales')->where('plataf', $plat)->first();
}

    public static function guardar($request)
    {
       if($request['password']){
        $respuesta = DB::connection('mysql')->table('pedigital.users')->where('id', Auth::user()->id)->update([
            'nombre_usuario' => $request['nombre'].' '.$request['apellido'],
            'login_usuario' => $request['login'],
            'email_usuario' => $request['email'],
            'pasword_usuario' => bcrypt($request['password'])
        ]);
       }else{
        $respuesta = DB::connection('mysql')->table('pedigital.users')->where('id', Auth::user()->id)->update([
            'nombre_usuario' => $request['nombre'].' '.$request['apellido'],
            'login_usuario' => $request['login'],
            'email_usuario' => $request['email']
        ]);
       }
        return  "ok";
    }
}


 
