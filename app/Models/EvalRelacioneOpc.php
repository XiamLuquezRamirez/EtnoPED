<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EvalRelacioneOpc extends Model
{
    public static function Guardar($data, $idPreg, $idEval)
    {

        foreach ($data["txtopcResp"] as $key => $val) {

            $grupPre = DB::connection('mysql')->table('etno_ped.eval_relacione_opc')->insert([
                'evaluacion' => $idEval,
                'respuesta' => $data["txtopcResp"][$key],
                'correcta' => $data["respuestas"][$key],
                'pregunta' => $idPreg,
            ]);
        }

        return $grupPre;
    }

    public static function Modificar($data, $idPreg, $idEval)
    {

        $Opc = DB::connection('mysql')->table('etno_ped.eval_relacione_opc')
            ->where('pregunta', $idPreg);
        $Opc->delete();

        foreach ($data["txtopcResp"] as $key => $val) {

            $grupPre = DB::connection('mysql')->table('etno_ped.eval_relacione_opc')->insert([
                'evaluacion' => $idEval,
                'respuesta' => $data["txtopcResp"][$key],
                'correcta' => $data["respuestas"][$key],
                'pregunta' => $idPreg,
            ]);
        }

        return $grupPre;
    }

    public static function PregRelOpc($id)
    {
        $EvalRelOpc = DB::connection('mysql')->table('etno_ped.eval_relacione_opc')
            ->where('pregunta', $id)
            ->get();
        return $EvalRelOpc;
    }

    public static function PregRelOpcadd($id)
    {
        $EvalRelOpc = DB::connection('mysql')->table('etno_ped.eval_relacione_opc')
            ->where('pregunta', $id)
            ->where('correcta', '-')
            ->get();
        return $EvalRelOpc;
    }

    public static function PregRelOpcAll($id)
    {
        $EvalRelOpc = DB::connection('mysql')->table('etno_ped.eval_relacione_opc')
            ->where('evaluacion', $id)
            ->get();
        return $EvalRelOpc;
    }

    public static function PregRelOpcaddAll($id)
    {
        $EvalRelOpc = DB::connection('mysql')->table('etno_ped.eval_relacione_opc')
            ->where('evaluacion', $id)
            ->where('correcta', '-')
            ->get();
        return $EvalRelOpc;
    }

    public static function DelPreg($id)
    {
        $Opc = DB::connection('mysql')->table('etno_ped.eval_relacione_opc')
            ->where('pregunta', $id);
        $Opc->delete();
    }
}
