<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAsignacion extends Model
{
    /**
     * El nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'tipos_asignacion';

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
        'nombre',
        'provincia_id'
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
