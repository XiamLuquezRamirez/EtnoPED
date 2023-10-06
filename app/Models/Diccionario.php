<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Diccionario extends Model
{
    use HasFactory;
    public static function guardar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.diccionario')->insertGetId([
            'palabra_espanol' => $request['espanol'],
            'palabra_wuayuunaiki' => $request['wayuu'],
            'palabra_lectura' => $request['lectura'],
            'definicion' => $request['definicion'],
            'imagen' => $request['Img'],
            'audio' => $request['Audio'],
            'ejemplo' => $request['ejemploEdit'],
            'estado' => 'ACTIVO'
        ]);

        return  $respuesta;
    }

    public static function BuscarDicc($id)
    {
        return DB::connection('mysql')->table('etno_ped.diccionario')
            ->where('id', $id)
            ->first();
    }

    public static function modificar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.diccionario')->where('id', $request['id'])->update([
            'palabra_espanol' => $request['espanol'],
            'palabra_wuayuunaiki' => $request['wayuu'],
            'palabra_lectura' => $request['lectura'],
            'definicion' => $request['definicion'],
            'imagen' => $request['Img'],
            'audio' => $request['Audio'],
            'ejemplo' => $request['ejemploEdit']
        ]);
        return  "ok";
    }
 
    public static function Eliminar($id)
    {
        return DB::connection('mysql')->table('etno_ped.diccionario')->where('id', $id)->update([
            'estado' => 'ELIMINADO',
        ]);
    }
}
