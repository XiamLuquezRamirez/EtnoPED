<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UpdIntEval extends Model
{
    public static function guardar($IdEval)
    {
        $Resp = DB::connection('mysql')->table('etno_ped.eval_intentos')
        ->where('evaluacion', $IdEval)
            ->where('alumnos', Auth::user()->id)
            ->first();

        if ($Resp) {
            $respuesta = DB::connection('mysql')->table('etno_ped.eval_intentos')
            ->where('evaluacion', $IdEval)
                ->where('alumnos', Auth::user()->id)
                ->first();
            $respuesta->int_realizados = $respuesta->int_realizados + 1;
            $respuesta->save();
        } else {
            $respuesta = DB::connection('mysql')->table('etno_ped.eval_intentos')->insertGetId([
                'evaluacion' => $IdEval,
                'alumnos' => Auth::user()->id,
                'int_realizados' => '1',
            ]);
        }

        return $respuesta;
    }
}
