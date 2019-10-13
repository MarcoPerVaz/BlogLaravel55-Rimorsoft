<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [

        'name',
        'slug',
        'body',

    ];

    /**
     * Relación Tiene Muchos - Una categoría tiene muchos posts
     */
    public function posts()
    {

        return $this->hasMany( Post::class );

    }

}
