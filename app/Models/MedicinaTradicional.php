<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MedicinaTradicional extends Model
{
   
    public static function guardar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.medicina_tradicional')->insertGetId([
            'nombre' => $request['titulo'],
            'contenido' => $request['contenidoEdit'],
            'cotenido_prepa' => $request['contPreparacion'],
            'nomb_video_prepa' => $request['VideoOr'],
            'video_prepa' => $request['Video'],
            'estado' => 'ACTIVO'
        ]);

        return  $respuesta;
    }

    public static function AllMedicina()
    {
        return DB::connection('mysql')->table('etno_ped.medicina_tradicional')
            ->where('estado', 'ACTIVO')
            ->get();
    }

    public static function modificar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.medicina_tradicional')->where('id', $request['id'])->update([
            'nombre' => $request['titulo'],
            'contenido' => $request['contenidoEdit'],
            'cotenido_prepa' => $request['contPreparacion'],
            'nomb_video_prepa' => $request['VideoOr'],
            'video_prepa' => $request['Video']
        ]);
        return  "ok";
    }

    public static function Eliminar($id)
    {
        $VerfDel = DB::connection('mysql')->table('etno_ped.medicina_tradicional')->where('id', $id)
        ->where('id', '<=', 20)
        ->get();
        if($VerfDel->count() == 0){
            return DB::connection('mysql')->table('etno_ped.medicina_tradicional')->where('id', $id)->update([
                'estado' => 'ELIMINADO',
            ]);
        }else{
            return "no";
        }
      
    }

    public static function BuscarMedi($id){
        return DB::connection('mysql')->table('etno_ped.medicina_tradicional')
        ->where('id', $id)
        ->first();
    }
}
