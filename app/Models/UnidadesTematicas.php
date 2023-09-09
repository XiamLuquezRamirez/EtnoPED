<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnidadesTematicas extends Model
{
    use HasFactory;

    public static function guardar($request)
    {
       $respuesta = DB::connection('mysql')->table('etno_ped.unidades_tematicas')->insert([
            'nombre' => $request['nombre'],
            'descripcion' => isset($request['descripcion']) ? $request['descripcion'] : '',
            'estado' => 'ACTIVO',
        ]);

        return  $respuesta;
    }
    public static function editar($request)
    {
        return DB::connection('mysql')->table('etno_ped.unidades_tematicas')->where('id', $request['id'])->update([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion']
        ]);
    }

    public static function CargarTodos()
    {
        $perPage = 10;
        return DB::connection('mysql')->table('etno_ped.unidades_tematicas')
        ->where('estado', 'ACTIVO')
        ->paginate($perPage)
        ->get();
    }

    public static function BuscarUnidad($id)
    {
        return DB::connection('mysql')->table('etno_ped.unidades_tematicas')
            ->where('id', $id)
            ->first();
    }
    public static function AllUnidades()
    {
        return DB::connection('mysql')->table('etno_ped.unidades_tematicas')
            ->get();
    }

    public static function EliminarUnidad($id){
        return DB::connection('mysql')->table('etno_ped.unidades_tematicas')->where('id', $id)->update([
            'estado' => 'ELIMINADO',
        ]);
    }
}
