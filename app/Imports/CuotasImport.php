<?php

namespace App\Imports;

use App\Models\Cuota;
use App\Models\Recurso;
use App\Models\TipoAsignacion;
use App\Models\Unidad;
use App\Models\Zona;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CuotasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        setlocale(1, 'es_CL.UTF8');
        $months = [
            'ENERO' => 1,
            'FEBRERO' => 2,
            'MARZO' => 3,
            'ABRIL' => 4,
            'MAYO' => 5,
            'JUNIO' => 6,
            'JULIO' => 7,
            'AGOSTO' => 8,
            'SEPTIEMBRE' => 9,
            'OCTUBRE' => 10,
            'NOVIEMBRE' => 11,
            'DICIEMBRE' => 12
        ];

        $unidad = Unidad::firstOrCreate(['nombre' => mb_strtoupper($row['unidad'])]);
        $recurso = Recurso::firstOrCreate(['nombre' => mb_strtoupper($row['recurso'])]);
        $zona = Zona::firstOrCreate(['nombre' => mb_strtoupper($row['zona'])]);
        $tipo_asignacion = TipoAsignacion::firstOrCreate(['nombre' => mb_strtoupper($row['tipo_asignatario'])]);
        $periodo_inicio = trim(strtoupper($row['periodo_inicio']));
        $periodo_final = trim(strtoupper($row['periodo_final']));

        // Convertir mes a fecha si corresponde.
        if (array_key_exists($periodo_inicio, $months)) {
            $inicio_periodo = date('Y-m-d', mktime(0, 0, 0, $months[$periodo_inicio], 1, intval($row['ano'])));
        } else {
            $inicio_periodo = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($periodo_inicio));
        }

        // Convertir mes a fecha si corresponde
        if (array_key_exists($periodo_final, $months)) {
            $month = $months[$periodo_final] + 1;

            if ($month == 13) {
                $month = 1;
                $anno = intval($row['ano']) + 1;
            }

            $fin_periodo = date('Y-m-d', mktime(0, 0, 0, $month, 0, intval($row['ano'])));
        } else {
            $fin_periodo = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($periodo_final));
        }

        return new Cuota([
            'unidad_id' => $unidad->id,
            'recurso_id' => $recurso->id,
            'zona_id' => $zona->id,
            'tipo_asignacion_id' => $tipo_asignacion->id,
            'organizacion_titular' => $row['organizacion_titular_area'],
            'anno' => intval($row['ano']),
            'inicio_periodo' => $inicio_periodo,
            'fin_periodo' => $fin_periodo,
            'cuota' => intval($row['cuota']),
            'cesiones_descuentos' => intval($row['cesiones_descuentos']),
            'cuota_efectiva' => intval($row['cuota_efectiva']),
            'captura' => intval($row['captura']),
            'saldo' => intval($row['saldo']),
            'porcentaje_consumo' => floatval($row['consumo_porcentaje']),
            'cierre' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row['cierre'])),
            'preliminar' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row['preliminar']))
        ]);
    }
}
