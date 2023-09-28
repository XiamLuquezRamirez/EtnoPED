<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Practicas extends Model
{
    public static function Guardar($datos)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.practicas_tematica')->insertGetId([
            'tematica' => $datos['tema_id'],
            'titulo' => $datos['titulo'],
            'objetivo' => $datos['objetivo'],
            'estado' => 'INACTIVO'
        ]);
        return $respuesta;
    }

    public static function ModifEval($datos, $id)
    {

        $respuesta = DB::connection('mysql')->table('etno_ped.practicas_tematica')->where('id', $id)->update([
            'tematica' => $datos['tema_id'],
            'titulo' => $datos['titulo'],
            'objetivo' => $datos['objetivo'],
        ]);

        return $respuesta;
    }

    public static function editarestado($id, $estado)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.practicas_tematica')->where('id', $id)->update([
            'estado' => $estado,
        ]);
        return $respuesta;
    }

    public static function ModifPractFin($datos, $id)
    {

        $respuesta = DB::connection('mysql')->table('etno_ped.practicas_tematica')->where('id', $id)->update([
            'tematica' => $datos['tema_id'],
            'titulo' => $datos['titulo'],
            'objetivo' => $datos['objetivo'],
            'estado' => 'ACTIVO',
        ]);

        return $respuesta;
    }

    public static function VerfDel($id)
    {

        $VerfDel = DB::connection('mysql')->table('etno_ped.practicas_tematica')
            ->where('id', $id)
            ->where('id', '>=', 1)
            ->where('id', '<=', 3)
            ->get();

        return $VerfDel;
    }

    public static function allPracticas($idTema){
        return DB::connection('mysql')->table('etno_ped.practicas_tematica')
        ->where('tematica', $idTema)
        ->get();
    }
}
