<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CulturaTradiciones extends Model
{
    protected $table = 'etno_ped.cultura_tradiciones';
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];

    public static function consultaPrueba()
    {
        $usuario = DB::connection("mysql")->select("select * from etno_ped.cultura_tradiciones");
        return  $usuario;
       
    }

}
