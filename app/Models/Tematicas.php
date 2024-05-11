<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tematicas extends Model
{
    use HasFactory;

    public static function guardar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.tematicas')->insertGetId([
            'titulo' => $request['titulo'],
            'unidad' => $request['unidad'],
            'objetivo' => $request['objetivo'],
            'contenido' => $request['contenidoEdit'],
            'estado' => 'ACTIVO'
        ]);

        return  $respuesta;
    }

    public static function guardarMultimediaTema($data)
    {

        foreach ($data["img"] as $key => $val) {
            $respuesta = DB::connection('mysql')->table('etno_ped.multimedia_tematica')->insert([
                'tematica' => $data["id"],
                'nombre' => $data["nomb"][$key],
                'url_contenido' => $data["img"][$key],
                'tipo_multimedia' => $data["tipo"][$key]
            ]);
        }
        return $respuesta;
    }

    public static function guardarEjemplosTema($data)
    {

        foreach ($data["contEjemplo"] as $key => $val) {
            $respuesta = DB::connection('mysql')->table('etno_ped.ejemplos_tematicas')->insert([
                'tematica' => $data["id"],
                'nombre' => $data["tituloEjemplo"][$key],
                'contenido' => $data["contEjemplo"][$key],
                'url_audio' => isset($data["Audio"][$key]) ? $data["Audio"][$key] : ""
            ]);
        }
        return $respuesta;
    }

    public static function AllTemas($idUnidad){
        return DB::connection('mysql')->table('etno_ped.tematicas')
        ->where('unidad', $idUnidad)
        ->where('estado', 'ACTIVO')
        ->get();
    }

    public static function BuscarTema($id)
    {
        return DB::connection('mysql')->table('etno_ped.tematicas')
            ->where('id', $id)
            ->first();
    }

    public static function BuscarDetTema($id)
    {
        return DB::connection('mysql')->table('etno_ped.tematicas')
            ->leftJoin("etno_ped.unidades_tematicas", "etno_ped.unidades_tematicas.id","etno_ped.tematicas.unidad")
            ->where('etno_ped.tematicas.id', $id)
            ->select("etno_ped.tematicas.titulo", "etno_ped.unidades_tematicas.nombre")
            ->first();
    }

    public static function BuscarMultimedia($id)
    {
        return DB::connection('mysql')->table('etno_ped.multimedia_tematica')
            ->where('tematica', $id)
            ->get();
    }
    public static function BuscarEjemplos($id)
    {
        return DB::connection('mysql')->table('etno_ped.ejemplos_tematicas')
            ->where('tematica', $id)
            ->get();
    }
    public static function BuscarEjemplosEdit($id)
    {
        return DB::connection('mysql')->table('etno_ped.ejemplos_tematicas')
            ->where('id', $id)
            ->first();
    }

    public static function EliminarRegistomultimedia($id)
    {
        return DB::connection('mysql')->table('etno_ped.multimedia_tematica')
            ->where('id', $id)
            ->delete();
    }
    public static function EliminarEjemplo($id)
    {
        return DB::connection('mysql')->table('etno_ped.ejemplos_tematicas')
            ->where('id', $id)
            ->delete();
    }

    public static function EliminarTematica($id)
    {
        return DB::connection('mysql')->table('etno_ped.tematicas')->where('id', $id)->update([
            'estado' => 'ELIMINADO',
        ]);
    }

    public static function editar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.tematicas')->where('id', $request['id'])->update([
            'titulo' => $request['titulo'],
            'unidad' => $request['unidad'],
            'objetivo' => $request['objetivo'],
            'contenido' => $request['contenidoEdit'],
        ]);
        return  "ok";
    }
    public static function EditarjemplosTema($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.ejemplos_tematicas')->where('id', $request['ejemploSel'])->update([
            'nombre' => $request['tituloEjemploEdit'],
            'contenido' => $request['contEjemploEdit'],
            'url_audio' => $request["Audio"]
        ]);

        return  "ok";
    }



}
