<?php

namespace App\Console\Commands;

use App\Imports\CuotasImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportarExcelCuotas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visorcuotas:importar_excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importador del archivo Excel con la última información del visor de cuotas';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Llevar todo el contenido de cuotas al archivo histórico.
        // Leer el archivo Excel en el que se importan las cuotas.
        // Hacer las búsquedas necesarias.

        DB::statement("
            INSERT INTO
                historicos_cuotas
                    (
                        id,
                        unidad,
                        recurso,
                        zona,
                        tipo_asignacion,
                        organizacion_titular,
                        anno,
                        inicio_periodo,
                        fin_periodo,
                        cuota,
                        cesiones_descuentos,
                        cuota_efectiva,
                        captura,
                        saldo,
                        porcentaje_consumo,
                        cierre,
                        preliminar,
                        created_at
                    )
            SELECT
                c.id AS id,
                u.nombre AS unidad,
                r.nombre AS recurso,
                z.nombre AS zona,
                t.nombre AS tipo_asignacion,
                c.organizacion_titular,
                c.anno,
                c.inicio_periodo,
                c.fin_periodo,
                c.cuota,
                c.cesiones_descuentos,
                c.cuota_efectiva,
                c.captura,
                c.saldo,
                c.porcentaje_consumo,
                c.cierre,
                c.preliminar,
                NOW()
            FROM
                cuotas c
                INNER JOIN unidades u ON c.unidad_id = u.id
                INNER JOIN recursos r ON c.recurso_id = r.id
                INNER JOIN zonas z ON c.zona_id = z.id
                INNER JOIN tipos_asignacion t ON c.tipo_asignacion_id = t.id
        ");
        DB::table('cuotas')->truncate();
        Excel::import(new CuotasImport, storage_path('data.xlsx'));
        return Command::SUCCESS;
    }
}
