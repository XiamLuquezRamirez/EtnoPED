<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class EvalPregDidact extends Model
{
    public static function Guardar($datos, $eval)
    {
        return DB::connection('mysql')->table('etno_ped.eval_pregdidactica')->insertGetId([
            'evaluacion' => $eval,
            'cont_didactico' => $datos['archivo']
        ]);
    }

    public static function Modificar($datos, $id)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.eval_pregdidactica')->updateOrCreate([
            'evaluacion' => $id
        ], [
            'cont_didactico' => $datos['archivo']
        ]);
        return $respuesta;
    }

    public static function PregDida($id)
    {
        $DesEval = DB::connection('mysql')->table('etno_ped.eval_pregdidactica')
            ->where('evaluacion', $id)
            ->first();
        return $DesEval;
    }
}
