<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Trips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'region', 'destination', 'date', 'name',
        'email', 'telephone', 'places', 'user_id'
    ];
}
