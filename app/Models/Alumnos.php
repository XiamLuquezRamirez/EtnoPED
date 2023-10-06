<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alumnos extends Model
{
    public static function Buscar($id)
    {
        return DB::connection('mysql')->table('alumnos')
        ->join('users', 'users.id', 'alumnos.usuario_alumno')
            ->select('alumnos.*', 'users.login_usuario')
            ->where('usuario_alumno', $id)->first();
    }
}
