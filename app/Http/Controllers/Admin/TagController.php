<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Importado
use App\Tag;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

class TagController extends Controller
{

    /**
     * Constructor para autorizar que solo los usuarios logueados podrán acceder a los 7 métodos REST 
     * Nota:Usar only o except si se requiere filtrar que métodos tendrás acceso (only = solo, except = excepto)
     */
    public function __construct()
    {

        $this->middleware( 'auth' );

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tags = Tag::orderBy('id', 'DESC')->paginate(); /* Retorna 15 registros */

        return view( 'admin.tags.index', compact( 'tags' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view( 'admin.tags.create' );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {

        $tag = Tag::create( $request->all() );

        return redirect()->route( 'tags.edit', $tag->id )->with( 'info', 'Etiqueta creada con éxito' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $tag = Tag::find( $id );

        return view( 'admin.tags.show', compact( 'tag' ) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $tag = Tag::find( $id );

        return view( 'admin.tags.edit', compact( 'tag' ) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {

        $tag = Tag::find( $id );

        $tag->fill( $request->all() )->save();

        return redirect()->route( 'tags.edit', $tag->id )->with( 'info', 'Etiqueta actualizada con éxito' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $tag = Tag::find( $id )->delete();

        return back()->with( 'info', 'Eliminado correctamente' );
        
    }
}
