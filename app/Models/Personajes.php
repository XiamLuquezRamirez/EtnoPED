<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Personajes extends Model
{
    public static function allPersonajes()
    {
        return DB::connection('mysql')->table('etno_ped.personajes')
            ->get();
    }
    public static function BusPersonaje($id)
    {
        return DB::connection('mysql')->table('etno_ped.personajes')
            ->where('id',$id)
            ->first();
    }


}
