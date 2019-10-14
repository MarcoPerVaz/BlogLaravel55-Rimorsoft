<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Importado
use App\Post;
use App\category;

class PageController extends Controller
{
    
    /**
     * Listado de posts ordenados de forma descendente por el id y solo los posts con el status published y paginados de 3 en 3
     */
    public function blog()
    {

        $posts = Post::orderBy( 'id', 'DESC' )->where( 'status', 'PUBLISHED' )->paginate( 3 );

        return view( 'web.posts', compact( 'posts' ) );
    }

    /**
     * Detalle de un post
     */
    public function post( $slug )
    {

        $post = Post::where( 'slug', $slug )->first();

        return view( 'web.post', compact( 'post' ) );

    }

    /**
     * Filtrar por categoría
     */
    public function category( $slug )
    {

        $category = Category::where( 'slug', $slug )->pluck( 'id' )->first(); 

        $posts = Post::where( 'category_id', $category )->orderBy( 'id', 'DESC' )->where( 'status', 'PUBLISHED' )->paginate( 3 );

        return view( 'web.posts', compact( 'posts' ) );

    }

    /**
     * Filtrar por etiquetas
     */
    public function tag( $slug )
    {

        $posts = Post::whereHas( 'tags', function( $query ) use( $slug ) {

            $query->where( 'slug', $slug );

        } )->orderBy( 'id', 'DESC' )->where( 'status', 'PUBLISHED' )->paginate( 3 );

        return view( 'web.posts', compact( 'posts' ) );

    }

}
