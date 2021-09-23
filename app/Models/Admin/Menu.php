<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name', 'url', 'icon',
    ];
    protected $guarded = ['id'];
}
