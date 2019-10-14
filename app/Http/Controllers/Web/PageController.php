<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Importado
use App\Post;

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

}
