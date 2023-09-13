<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LibroCalificaciones extends Model
{
    public static function BusEvalDel($id)
    {
        return DB::connection('mysql')->table('etno_ped.libro_calificaciones')
            ->where('evaluacion', $id)
            ->first();
    }
}
