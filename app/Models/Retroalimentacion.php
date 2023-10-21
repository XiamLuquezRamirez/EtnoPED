<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Retroalimentacion extends Model
{
    public static function ConsulRetro($preg, $alum)
    {
        $Retro = DB::connection('mysql')->table('etno_ped.retroalimentacion')
        ->where('pregunta', $preg)
            ->where('alumno', $alum)
            ->first();

        if ($Retro) {
            return $Retro->retro;
        } else {
            return "";
        }
    }
}
