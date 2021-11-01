<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'slug'];

    public function roles(){
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
