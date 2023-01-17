<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    /**
     * El nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'cuotas';

    /**
     * El campo primario del modelo.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Declaración de no uso de timestamps en este modelo.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Este modelo no usará un identificador autoincremental.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Los atributos que pueden asignarse masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'unidad_id',
        'recurso_id',
        'zona_id',
        'tipo_asignacion_id',
        'organizacion_titular',
        'anno',
        'inicio_periodo',
        'fin_periodo',
        'cuota',
        'cesiones_descuentos',
        'cuota_efectiva',
        'captura',
        'saldo',
        'porcentaje_consumo',
        'cierre',
        'preliminar'
    ];

    /**
     * Los atributos que deberían estar ocultos en la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Los atributos que deberían convertirse.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
