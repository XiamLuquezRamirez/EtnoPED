<?php

namespace App\Http\Controllers;

use App\Models\UnidadesTematicas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdministracionController extends Controller
{

    public function GestionarGramatica($ori)
    {
        if (Auth::check()) {
            $bandera = "";
            if ($ori == "unidades") {
                return view('Administracion.GestionUnidades', compact('bandera'));
            } else if ($ori == "temas") {
                return view('Administracion.GestionarTematica', compact('bandera'));

            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function GuardarUnidad()
    {
        $data = request()->all();
        if ($data['accion'] == "agregar") {
            $respuesta = UnidadesTematicas::guardar($data);
        } else if ($data['accion'] == "editar") {
            $respuesta = UnidadesTematicas::editar($data);
        }
        if ($respuesta) {
            $estado = "ok";
        } else {
            $estado = "fail";
        }

        if (request()->ajax()) {
            return response()->json([
                'estado' => $estado,
            ]);
        }
    }

    public function EliminarUnidad()
    {
        $idUndad = request()->get('idUnidad');
        $unidades = UnidadesTematicas::EliminarUnidad($idUndad);
    }

    public function CargarUnidades()
    {
        $perPage = 5; // Número de posts por página
        $page = request()->get('page', 1);
        $searchTerm = request()->get('search');
        if (!is_numeric($page)) {
            $page = 1; // Establecer un valor predeterminado si no es numérico
        }

        $unidades = DB::connection('mysql')
            ->table('etno_ped.unidades_tematicas')
            ->where('estado', 'ACTIVO');
            if ($searchTerm) {
                $unidades->where('nombre', 'LIKE', '%' . $searchTerm . '%');
            }
            $Listunidades = $unidades->paginate($perPage, ['*'], 'page', $page);

        $tdTable = '';
        $x = ($page - 1) * $perPage + 1;

        foreach ($Listunidades as $i => $item) {
            if (!is_null($item)) {
                $descripcionCortada = $item->descripcion ?
                (strlen($item->descripcion) > 100 ? substr($item->descripcion, 0, 100) . '...' : $item->descripcion) :
                "Sin descripción";

                $tdTable .= '<tr>' .
                '<td><div class="btn-group" role="group" aria-label="First Group">' .
                '    <button type="button" onclick="$.editar(' . $item->id . ');" class="btn btn-icon btn-outline-primary"><i class="fa fa-edit"></i></button>' .
                '    <button type="button" onclick="$.eliminar(' . $item->id . ');" class="btn btn-icon btn-outline-warning"><i class="fa fa-trash-o"></i></button>' .
                '    </div>' .
                '</td>' .
                '<th scope="row">' . $x . '</th>' .
                '<td>' . $item->nombre . '</td>' .
                    '<td>' . $descripcionCortada . '</td>' .
                    '</tr>';

                $x++;
            }
        }

        $pagination = $Listunidades->links('Administracion.PaginacionUnidades')->render();

        return response()->json([
            'unidades' => $tdTable,
            'links' => $pagination,
        ]);
    }

    public function BuscarUnidad()
    {
        $idUndad = request()->get('idUnidad');
        $unidades = UnidadesTematicas::BuscarUnidad($idUndad);

        if (request()->ajax()) {
            return response()->json([
                'unidades' => $unidades,
            ]);
        }
    }
}
