<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Alumnos extends Model
{

    public static function guardar($request)
    {
      
        $respuesta = DB::connection('mysql')->table('pedigital.alumnos')->where('usuario_alumno', Auth::user()->id)->update([
            'ident_alumno' => $request['identificacion'],
            'nombre_alumno' => $request['nombre'],
            'apellido_alumno' => $request['apellido'],
            'direccion_alumno' => $request['direccion'],
            'telefono_alumno' => $request['telefono'],
            'email_alumno' => $request['email'],
            'foto_alumno' => $request['img']
        ]);
        return  "ok";
    }


    public static function Buscar($id)
    {
        return DB::connection('mysql')->table('pedigital.alumnos')
            ->join('pedigital.users', 'pedigital.users.id', 'pedigital.alumnos.usuario_alumno')
            ->select(
                'pedigital.alumnos.ident_alumno AS identificacion',
                'pedigital.alumnos.nombre_alumno AS nombre',
                'pedigital.alumnos.apellido_alumno AS apellido',
                'pedigital.alumnos.direccion_alumno AS direccion',
                'pedigital.alumnos.email_alumno AS email',
                'pedigital.alumnos.telefono_alumno AS telefono',
                'pedigital.alumnos.foto_alumno AS foto',
                'pedigital.users.login_usuario',
                'pedigital.users.tipo_usuario'
            )
            ->where('usuario_alumno', $id)->first();
    }

    public static function ListarxGradoTotal($grado, $grupo,$jorn, $eval)
    {
        $listAlumnos = DB::connection("mysql")->select("SELECT lc.id, alum.ident_alumno, lc.alumno, 
        CONCAT(apellido_alumno,' ',nombre_alumno) nalumno, lc.evaluacion, lc.puntuacion, lc.estado_eval, 
        eval.punt_max, eval.calif_usando
        FROM pedigital.alumnos alum
        LEFT JOIN etno_ped.libro_calificaciones lc ON alum.usuario_alumno=lc.alumno AND lc.evaluacion=" . $eval . "
        LEFT JOIN etno_ped.evaluaciones eval ON eval.id=lc.evaluacion
        WHERE grado_alumno=" . $grado . " AND grupo=" . $grupo . " AND jornada = '".$jorn."' AND alum.estado_alumno='ACTIVO'");
        
     
        return $listAlumnos;
    }
}
