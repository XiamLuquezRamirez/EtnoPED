<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    public static function Guardar($accion, $Afec)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.log_u')->insert([
            'id_usuario' => Auth::user()->id,
            'perfil' => Auth::user()->tipo_usuario,
            'accion' => $accion,
            'id_afectado' => $Afec,
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
        ]);
    }
}
