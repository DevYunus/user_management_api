<?php

namespace App\Models;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Cachable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [

    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function syncPermissions()
    {
        if(request()->has('permissions')) {
            $this->permissions()->sync(request()->get('permissions'));
        }
    }

}
