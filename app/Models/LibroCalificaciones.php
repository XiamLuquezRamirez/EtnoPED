<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PuntPreg;

class LibroCalificaciones extends Model
{

    public static function Guardar($datos, $respviejo, $resp, $InfEval, $fecha)
    {
        $Alumno = Auth::user()->id;
        $IdEval = $datos['IdEvaluacion'];
        $puntMaxi = $InfEval->punt_max;
        $TiemEval = "";
        $estado = "EN PROCESO";

        $Libro = self::BusEval($IdEval, $Alumno);


        if ($Libro) {
            $puntaje = $Libro->puntuacion;
        } else {
            $puntaje = 0;
        }

        if ($datos['TipPregunta'] == "PREGENSAY") {
            $Calificacion = "0/" . strval($puntMaxi);
            $CalProf = "";
            $PunPreg = PuntPreg::Guardar($IdEval, $resp->pregunta, "0");
        } else if ($datos['TipPregunta'] == "COMPLETE") {
            $Calificacion = "0/" . strval($puntMaxi);
            $CalProf = "";
            $PunPreg = PuntPreg::Guardar($IdEval, $resp->pregunta, "0");
        } else if ($datos['TipPregunta'] == "OPCMULT") {

            $Preg = PregOpcMul::ConsulPreg($resp->pregunta);
            $DesOpcPreg = OpcPregMul::ConsulGrupOpcPreg($resp->pregunta);
            if ($respviejo) {
                foreach ($DesOpcPreg as $OP) {
                    if ($OP->id == $respviejo->respuesta) {
                        if ($OP->correcta == "si") {
                            $puntaje = (int) $puntaje - (int) $Preg->puntuacion;
                        }
                    }
                }
            }

            foreach ($DesOpcPreg as $OP) {
                if ($OP->id == $resp->respuesta) {
                    if ($OP->correcta == "si") {
                        $puntaje = (int) $puntaje + (int) $Preg->puntuacion;
                        $PunPreg = PuntPreg::Guardar($IdEval, $resp->pregunta, $Preg->puntuacion);
                    } else {
                        $PunPreg = PuntPreg::Guardar($IdEval, $resp->pregunta, '0');
                    }
                }
            }

            $Calificacion = $puntaje . "/" . strval($puntMaxi);
            $CalProf = "";
        } else if ($datos['TipPregunta'] == "VERFAL") {

            $PregVerFal = EvalVerFal::ConVerFal($resp->pregunta);

            if ($respviejo) {
               
                if ($respviejo->respuesta_alumno == $PregVerFal->respuesta) {
                    $puntaje = (int) $puntaje - (int) $PregVerFal->puntaje;
                }
            }

            if ($resp->respuesta_alumno == $PregVerFal->respuesta) {
                $puntaje = (int) $puntaje + (int) $PregVerFal->puntaje;
                $PunPreg = PuntPreg::Guardar($IdEval, $resp->pregunta, $PregVerFal->puntaje);
            } else {
                $PunPreg = PuntPreg::Guardar($IdEval, $resp->pregunta, '0');
            }

            $Calificacion = $puntaje . "/" . strval($puntMaxi);
            $CalProf = "";
        } else if ($datos['TipPregunta'] == "RELACIONE") {
           
            $PregRelacione = PregRelacione::ConRela($resp->eval_preg);
            $control = 1;

            if ($respviejo) {
                foreach ($respviejo as $respV) {
                    if ($respV->opcion != $respV->correcta) {
                        $control++;
                    }
                }

                if ($control == 1) {
                    $puntaje = (int) $puntaje - (int) $PregRelacione->puntaje;
                    $PunPreg = PuntPreg::Guardar($IdEval, $PregRelacione->id, $PregRelacione->puntaje);
                } else {
                    $PunPreg = PuntPreg::Guardar($IdEval, $PregRelacione->id, '0');
                }
            }

            $RespPreRel = DB::connection('mysql')->table('etno_ped.resp_pregrelacione')
                ->leftjoin('eval_relacione_def', 'resp_pregrelacione.pregunta', 'eval_relacione_def.id')
                ->leftjoin('eval_relacione_opc', 'resp_pregrelacione.respuesta_alumno', 'eval_relacione_opc.id')
                ->where('resp_pregrelacione.eval_preg', $resp->eval_preg)
                ->select('eval_relacione_def.opcion', 'eval_relacione_opc.correcta')
                ->get();

            $control = 1;

            foreach ($RespPreRel as $resp) {
                if ($resp->opcion != $resp->correcta) {
                    $control++;
                }
            }

            if ($control == 1) {
                $puntaje = (int) $puntaje + (int) $PregRelacione->puntaje;
            }

            $Calificacion = $puntaje . "/" . strval($puntMaxi);
            $CalProf = "";
        } else if ($datos['TipPregunta'] == "TALLER") {

            $Calificacion = $puntaje . "/" . strval($puntMaxi);
            $CalProf = "";
            $PunPreg = PuntPreg::Guardar($IdEval, $resp->pregunta, "0");
        }

        if ($datos['nPregunta'] == "Ultima") {

            if ($InfEval->calxdoc === "NO") {
                $estado = "CALIFICADA";
                $CalProf = "si";
            } else {
                $estado = "TERMINADA";
            }
            $TiemEval = $datos['Tiempo'];
        }
        $puntaje = 0;

        $PunPreg = PuntPreg::ConsulPuntEval($IdEval, Auth::user()->id);
        foreach ($PunPreg as $PunP) {
            $puntaje = (int) $puntaje + (int) $PunP->puntos;
        }

        $Calificacion = $puntaje . "/" . strval($puntMaxi);

        $idRegistro = null;

        if ($Libro) {

            $libroCalif = DB::connection('mysql')->table('etno_ped.libro_calificaciones')
            ->where('alumno', $Alumno)
            ->where('evaluacion', $IdEval)
            ->update([
                
                    'alumno' => $Alumno,
                    'evaluacion' => $IdEval,
                    'puntuacion' => $puntaje,
                    'calificacion' => $Calificacion,
                    'fecha_pres' => $fecha,
                    'calf_prof' => $CalProf,
                    'tiempo_usado' => $TiemEval,
                    'estado_eval' => $estado
            ]);

            $libroCalif = DB::connection('mysql')->table('etno_ped.libro_calificaciones')->find($Libro->id);
            return $libroCalif;
        } else {

            $libroCalif = DB::connection('mysql')->table('etno_ped.libro_calificaciones')->insertGetId(
                [
                    'alumno' => $Alumno,
                    'evaluacion' => $IdEval,
                    'puntuacion' => $puntaje,
                    'calificacion' => $Calificacion,
                    'fecha_pres' => $fecha,
                    'calf_prof' => $CalProf,
                    'tiempo_usado' => $TiemEval,
                    'estado_eval' => $estado,
                ]
            );

            $libroCalif = DB::connection('mysql')->table('etno_ped.libro_calificaciones')->find($libroCalif);
            return $libroCalif;
        }
    }

    public static function BusEval($id, $alum)
    {
        $DesEval = DB::connection('mysql')->table('etno_ped.libro_calificaciones')
            ->where('evaluacion', $id)
            ->where("alumno", $alum)
            ->first();
        return $DesEval;
    }

    public static function BusEvalDel($id)
    {
        return DB::connection('mysql')->table('etno_ped.libro_calificaciones')
            ->where('evaluacion', $id)
            ->first();
    }

    public static function BusDetLib($id)
    {
        $InfEval = DB::connection('mysql')->table('etno_ped.libro_calificaciones')
            ->join('pedigital.alumnos', 'pedigital.alumnos.usuario_alumno', 'libro_calificaciones.alumno')
            ->join('etno_ped.evaluaciones', 'etno_ped.evaluaciones.id', 'libro_calificaciones.evaluacion')
            ->select('pedigital.alumnos.nombre_alumno', 'pedigital.alumnos.apellido_alumno', 'pedigital.alumnos.grado_alumno', 'evaluaciones.titulo', 'evaluaciones.enunciado', 'evaluaciones.calif_usando', 'evaluaciones.punt_max', 'libro_calificaciones.*')
            ->where('libro_calificaciones.id', $id)
            ->first();
        return $InfEval;
    }

}
