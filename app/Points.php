<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string Opening_dinsdag
 * @property string Opening_maandag
 * @property string Opening_woensdag
 * @property string Opening_donderdag
 * @property string contact
 * @property string address
 * @property string naam_inzamelpunt
 * @property string Opening_vrijdag
 * @property string Opening_zaterdag
 * @property mixed|string Opening_zondag
 */
class Points extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inzamelpunten';
}
