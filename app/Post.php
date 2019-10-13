<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [

        'user_id',
        'category_id',
        'name',
        'slug',
        'excerpt',
        'body',
        'status',
        'file',

    ];


    /**
     * Relación Pertenece a - Un post pertenece a un usuario
     */
    public function user()
    {

        return $this->belongsTo( User::class );

    }

    /**
     * Relación Pertenece a - Un post pertenece a una categoría
     */
    public function category()
    {

        return $this->belongsTo( Category::class );

    }

    /**
     * Relación Pertenece a Muchos - Un post tiene muchos tags
     */
    public function tags()
    {

        return $this->belongsToMany( Tag::class );

    }
}
