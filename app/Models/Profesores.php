<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Profesores extends Model
{
    public static function Buscar($id)
    {
        return DB::connection('mysql')->table('pedigital.profesores')
            ->join('pedigital.users', 'pedigital.users.id', 'pedigital.profesores.usuario_profesor')
            ->select('pedigital.profesores.*', 'pedigital.users.login_usuario','pedigital.users.tipo_usuario')
            ->where('pedigital.profesores.usuario_profesor', $id)
            ->first();
    }

    public static function guardar($request)
    {
       
        $respuesta = DB::connection('mysql')->table('pedigital.alumnos')->where('usuario_alumno', Auth::user()->id)->update([
            'ident_alumno' => $request['identificacion'],
            'nombre_alumno' => $request['nomnbre'],
            'apellido_alumno' => $request['apellido'],
            'direccion_alumno' => $request['direccion'],
            'telefono_alumno' => $request['telefono'],
            'email_alumno' => $request['email'],
            'foto_alumno' => $request['img']
        ]);
        return  "ok";
    }

}
