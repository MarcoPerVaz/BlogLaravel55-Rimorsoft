<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    protected $fillable = [

        'name',
        'slug',

    ];

    /**
     * Relación Pertenece a Muchos - Una categoría tiene muchos posts
     */
    public function posts()
    {

        return $this->belongsToMany( Post::class );

    }

}
