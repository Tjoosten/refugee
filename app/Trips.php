<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int   user_id     The id off the user.
 * @property mixed region      The region he depart form
 * @property mixed destination The refugee camp he wants to visit
 * @property int   date        The date he want to drive
 * @property mixed name
 * @property mixed telephone
 * @property mixed email
 * @property mixed places
 */
class Trips extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'region', 'destination', 'date', 'name',
        'email', 'telephone', 'places', 'user_id',
    ];
}
