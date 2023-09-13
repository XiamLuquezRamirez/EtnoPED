<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CosEval extends Model
{
    public static function Guardar($datos, $eval, $preg)
    {

        $respuesta = DB::connection('mysql')->table('etno_ped.evalpreg')->insertGetId([
            'ideval' => $eval,
            'idpreg' => $preg,
            'conse' => $datos['PregConse'],
            'tipo' => $datos['Tipreguntas']
        ]);

        return $respuesta;
    }

    public static function GrupPreg($id)
    {
        return DB::connection('mysql')->table('etno_ped.evalpreg')
            ->where('ideval', $id)
            ->get();
    }

    public static function DelPreg($id)
    {
        return DB::connection('mysql')->table('etno_ped.evalpreg')
        ->where('idpreg', $id)
        ->delete();
    }
}
