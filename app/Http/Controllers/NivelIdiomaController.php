<?php

namespace App\Http\Controllers;

use App\Models\NivelIdioma;
use Illuminate\Http\Request;

class NivelIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivelIdiomas = NivelIdioma::all();
        return $nivelIdiomas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nivelIdioma = NivelIdioma::create($request->all());
        return $nivelIdioma;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function show(NivelIdioma $nivelIdioma)
    {
        return $nivelIdioma;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function edit(NivelIdioma $nivelIdioma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NivelIdioma $nivelIdioma)
    {
        $nivelIdioma->update($request->all());
        return $nivelIdioma;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function destroy(NivelIdioma $nivelIdioma)
    {
        //
    }
}
