<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PregOpcMul extends Model
{
    public static function Guardar($preg, $punt, $evalu)
    {

        $respuesta = DB::connection('mysql')->table('etno_ped.preg_mult_eval')->insertGetId([
            'evaluacion' => $evalu,
            'pregunta' => $preg,
            'puntuacion' => $punt,
        ]);
        return $respuesta;
    }

    public static function ConsulPreg($id)
    {
        return DB::connection('mysql')->table('etno_ped.preg_mult_eval')
            ->where('id', $id)
            ->first();
    }

    public static function ModiPreMul($preg, $punt, $idpreg, $eva)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.preg_mult_eval')->where('id', $idpreg)->update([
            'evaluacion' => $eva,
            'pregunta' => $preg,
            'puntuacion' => $punt,
        ]);
        return $respuesta;
    }

    public static function ConsulPregAll($id)
    {
        $GrupPreg = DB::connection('mysql')->table('etno_ped.preg_mult_eval')
        ->where('evaluacion', $id)
            ->get();
        return $GrupPreg;
    }

    public static function DelPregunta($IdPreg)
    {
        $Opc = DB::connection('mysql')->table('etno_ped.preg_mult_eval')
        ->where('id', $IdPreg)
        ->delete();
    }

}
