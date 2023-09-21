<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class OpcPregMul extends Model
{
    public static function Guardar($data, $id, $ideval)
    {

        foreach ($data["txtopcpreg"] as $key => $val) {
            $respuesta = DB::connection('mysql')->table('etno_ped.opc_mult_eval')->insert([
                'pregunta' => $id,
                'opciones' => $data["txtopcpreg"][$key],
                'correcta' => $data["OpcCorecta"][$key],
                'evaluacion' => $ideval,
            ]);
        }
        return $respuesta;
    }

    public static function ConsulGrupOpc($id, $eval)
    {
        $DesOpcPreg = DB::connection('mysql')->table('etno_ped.opc_mult_eval')
            ->where('pregunta', $id)
            ->where('evaluacion', $eval)
            ->get();
        return $DesOpcPreg;
    }

    public static function ModOpcPreg($data, $ideval)

    {
        $Opc =  DB::connection('mysql')->table('etno_ped.opc_mult_eval')
            ->where('pregunta', $data['IdpreguntaMul']);
        $Opc->delete();

        foreach ($data["txtopcpreg"] as $key => $val) {
            $respuesta = DB::connection('mysql')->table('etno_ped.opc_mult_eval')->insert([
                'pregunta' => $data['IdpreguntaMul'],
                'opciones' => $data["txtopcpreg"][$key],
                'correcta' => $data["OpcCorecta"][$key],
                'evaluacion' => $ideval,
            ]);
        }
        return $respuesta;
    }

    public static function ConsulGrupOpcPreg($id)
    {
        $DesOpcPreg = DB::connection('mysql')->table('etno_ped.opc_mult_eval')
            ->where('pregunta', $id)
            ->get();
        return $DesOpcPreg;
    }

    public static function ConsulGrupOpcPregAll($id)
    {
        $DesOpcPreg = DB::connection('mysql')->table('etno_ped.opc_mult_eval')
            ->where('evaluacion', $id)
            ->get();
        return $DesOpcPreg;
    }

    public static function DelOpciones($IdPreg)
    {
        $Opc = DB::connection('mysql')->table('etno_ped.opc_mult_eval')
        ->where('pregunta', $IdPreg);
        $Opc->delete();
        return "1";
    }
}
