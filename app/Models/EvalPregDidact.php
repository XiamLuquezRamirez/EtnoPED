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
        $registro = DB::connection('mysql')
            ->table('etno_ped.eval_pregdidactica')
            ->where('evaluacion', $id)
            ->first();

        if ($registro) {
            // Si el registro existe, actualiza el campo cont_didactico
            DB::connection('mysql')
                ->table('etno_ped.eval_pregdidactica')
                ->where('evaluacion', $id)
                ->update(['cont_didactico' => $datos['archivo']]);
            $idInsertado = $registro->id; // Obtén el ID del registro existente
        } else {
            // Si no existe, crea un nuevo registro y obtén el ID insertado
            $idInsertado = DB::connection('mysql')
                ->table('etno_ped.eval_pregdidactica')
                ->insertGetId(['evaluacion' => $id, 'cont_didactico' => $datos['archivo']]);
        }

        return $idInsertado;
    }

    public static function PregDida($id)
    {
        $DesEval = DB::connection('mysql')->table('etno_ped.eval_pregdidactica')
            ->where('evaluacion', $id)
            ->first();
        return $DesEval;
    }

    public static function EliminarVideo($id) {
        $Archi = DB::connection('mysql')->table('etno_ped.eval_pregdidactica')
        ->where('evaluacion', $id);
        $Archi->delete();
        return $Archi;
    }
}
