<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'isbn', 'author','quantity','editorial','photo'
    ];
    
    protected $guarded = ['id'];
}
