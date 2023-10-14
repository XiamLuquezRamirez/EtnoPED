<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EvalRelacione extends Model
{
    public static function Guardar($data, $Preg, $eval)
    {

        foreach ($data["txtopcpreg"] as $key => $val) {
            $grupPre = DB::connection('mysql')->table('etno_ped.eval_relacione_def')->insert([
                'evaluacion' => $eval,
                'opcion' => $data["Mesnsaje"][$key],
                'definicion' => $data["txtopcpreg"][$key],
                'pregunta' => $Preg,
            ]);
        }

        return $grupPre;
    }

    public static function Modificar($datos, $Preg, $eval)
    {

        $Opc =  DB::connection('mysql')->table('etno_ped.eval_relacione_def')
            ->where('pregunta', $Preg);
        $Opc->delete();

        foreach ($datos["txtopcpreg"] as $key => $val) {
            $grupPre = DB::connection('mysql')->table('etno_ped.eval_relacione_def')->insert([
                'evaluacion' => $eval,
                'opcion' => $datos["Mesnsaje"][$key],
                'definicion' => $datos["txtopcpreg"][$key],
                'pregunta' => $Preg,
            ]);
        }

        return $grupPre;
    }


    public static function PregRelDef($id)
    {
        $EvalRel =  DB::connection('mysql')->table('etno_ped.eval_relacione_def')
            ->where('pregunta', $id)
            ->get();
        return $EvalRel;
    }

    public static function PregRelDefAll($id)
    {
        $EvalRel =  DB::connection('mysql')->table('etno_ped.eval_relacione_def')
            ->where('evaluacion', $id)
            ->get();
        return $EvalRel;
    }

    public static function DelPreg($id)
    {
        $Opc = DB::connection('mysql')->table('etno_ped.eval_relacione_def')
            ->where('pregunta', $id);
        $Opc->delete();
    }
}
