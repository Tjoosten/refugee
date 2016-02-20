<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    public function user()
    {
        return $this->belongsToMany('App\Roles', 'user_roles', 'user_id', 'role_id');
    }
}
