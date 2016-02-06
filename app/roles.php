<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Get the roles associated with the given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'roles_user')->withTimestamps();
    }
}
