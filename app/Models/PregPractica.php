<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PregPractica extends Model
{
    public static function Guardar($preg, $evalu)
    {

        $respuesta = DB::connection('mysql')->table('etno_ped.preguntas_practica')->insertGetId([
            'practica' => $evalu,
            'pregunta' => $preg
        ]);
        return $respuesta;
    }

    public static function ModiPreMul($preg, $idpreg, $eva)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.preguntas_practica')->where('id', $idpreg)->update([
            'practica' => $eva,
            'pregunta' => $preg
        ]);
        return $respuesta;
    }

    public static function ConsulPreg($id)
    {
        return DB::connection('mysql')->table('etno_ped.preguntas_practica')
            ->where('id', $id)
            ->first();
    }

    public static function ConsulPregAll($id)
    {
        $GrupPreg = DB::connection('mysql')->table('etno_ped.preguntas_practica')
        ->where('practica', $id)
            ->get();
        return $GrupPreg;
    }

    public static function DelPregunta($IdPreg)
    {
        $Opc = DB::connection('mysql')->table('etno_ped.preguntas_practica')
        ->where('id', $IdPreg)
        ->delete();
    }


}
