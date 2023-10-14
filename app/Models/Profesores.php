<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profesores extends Model
{
    public static function Buscar($id)
    {
        return DB::connection('mysql')->table('pedigital.profesores')
        ->join('pedigital.users', 'pedigital.users.id', 'pedigital.profesores.usuario_profesor')
            ->select('pedigital.profesores.*', 'pedigital.users.login_usuario','pedigital.users.tipo_usuario')
            ->where('pedigital.profesores.usuario_profesor', $id)->first();
    }
}
