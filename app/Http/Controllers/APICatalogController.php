<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Movie;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Movie::all() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Movie = new Movie;
        $Movie->title = $request->input('title');
        $Movie->year = $request->input('year');
        $Movie->director = $request->input('director');
        $Movie->poster = $request->input('poster');
        $Movie->synopsis = $request->input('synopsis');
        $Movie->save();

        return response()->json( ['error' => false,
        'msg' => 'Insertada' ] );
        //return response()->json( $Movie );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        return response()->json( Movie::findOrFail($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Movie = Movie::findOrFail($id);
        $Movie->title = $request->input('title');
        $Movie->year = $request->input('year');
        $Movie->director = $request->input('director');
        $Movie->poster = $request->input('poster');
        $Movie->synopsis = $request->input('synopsis');
        $Movie->save();

        return response()->json( ['error' => false,
        'msg' => 'Update' ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Movie = Movie::findOrFail($id);
        $Movie->delete();
        return response()->json( Movie::all() );
    }

    public function putRent($id) {
        $m = Movie::findOrFail( $id );
        $m->rented = 1;
        $m->save();
        return response()->json( ['error' => false,
                              'msg' => 'La película se ha marcado como alquilada' ] );
    }
    public function putReturn($id) {
        $m = Movie::findOrFail( $id );
        $m->rented = 0;
        $m->save();
        return response()->json( ['error' => false,
                              'msg' => 'La película se ha marcado como no alquilada' ] );
    }
}
