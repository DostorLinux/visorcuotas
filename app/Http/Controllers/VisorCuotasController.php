<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Recurso;
use App\Models\TipoAsignacion;
use App\Models\Unidad;
use App\Models\Zona;

class VisorCuotasController extends Controller
{

    public function index()
    {
        return "OK";
    }

    public function recursos()
    {
        $data = Recurso::orderBy('nombre')->get();
        return $data;
    }

    public function tipos_asignacion()
    {
        $data = TipoAsignacion::orderBy('nombre')->get();
        return $data;
    }

    public function unidades()
    {
        $data = Unidad::orderBy('nombre')->get();
        return $data;
    }

    public function zonas()
    {
        $data = Zona::orderBy('nombre')->get();
        return $data;
    }

    public function cuotas($recurso, $tipo_asignacion, $unidad, $zona)
    {
        $variable_recurso = $recurso === '-' ? null : $recurso;
        $variable_tipo_asignacion = $tipo_asignacion === '-' ? null : $tipo_asignacion;
        $variable_unidad = $unidad === '-' ? null : $unidad;
        $variable_zona = $zona === '-' ? null : $zona;

        $data = [];

        if (!is_null($variable_recurso)) {
        }

        if (!is_null($variable_tipo_asignacion)) {
        }

        if (!is_null($variable_unidad)) {
        }

        if (!is_null($variable_zona)) {
        }

        return $data;
    }
}
