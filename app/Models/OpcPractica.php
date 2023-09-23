<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OpcPractica extends Model
{
    public static function Guardar($data, $id, $ideval)
    {

        foreach ($data["txtopcpreg"] as $key => $val) {
            $respuesta = DB::connection('mysql')->table('etno_ped.respuestas_practicas')->insert([
                'preg_practica' => $id,
                'respuesta' => $data["txtopcpreg"][$key],
                'correcta' => $data["OpcCorecta"][$key],
                'practica' => $ideval,
            ]);
        }

        return $respuesta;
    }

    public static function ConsulGrupOpc($id, $eval)
    {
        $DesOpcPreg = DB::connection('mysql')->table('etno_ped.respuestas_practicas')
            ->where('preg_practica', $id)
            ->where('practica', $eval)
            ->get();
        return $DesOpcPreg;
    }

    public static function ConsulGrupOpcPregAll($id)
    {
        $DesOpcPreg = DB::connection('mysql')->table('etno_ped.respuestas_practicas')
            ->where('practica', $id)
            ->get();
        return $DesOpcPreg;
    }

    public static function ModOpcPreg($data, $ideval)

    {
        $Opc =  DB::connection('mysql')->table('etno_ped.respuestas_practicas')
            ->where('preg_practica', $data['IdpreguntaMul']);
        $Opc->delete();

        foreach ($data["txtopcpreg"] as $key => $val) {
            $respuesta = DB::connection('mysql')->table('etno_ped.respuestas_practicas')->insert([
                'preg_practica' => $data['IdpreguntaMul'],
                'respuesta' => $data["txtopcpreg"][$key],
                'correcta' => $data["OpcCorecta"][$key],
                'practica' => $ideval,
            ]);
        }
        return $respuesta;
    }

    public static function ConsulGrupOpcPreg($id)
    {
        $DesOpcPreg = DB::connection('mysql')->table('etno_ped.respuestas_practicas')
            ->where('preg_practica', $id)
            ->get();
        return $DesOpcPreg;
    }

    
    public static function DelOpciones($IdPreg)
    {
        $Opc = DB::connection('mysql')->table('etno_ped.respuestas_practicas')
        ->where('preg_practica', $IdPreg);
        $Opc->delete();
        return "1";
    }

}
