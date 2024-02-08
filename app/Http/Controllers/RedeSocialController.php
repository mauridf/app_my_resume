<?php

namespace App\Http\Controllers;

use App\Models\RedeSocial;
use Illuminate\Http\Request;

class RedeSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $redesSociais = RedeSocial::all();
        return $redesSociais;
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
        $redeSocial = RedeSocial::create($request->all());
        return $redeSocial;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function show(RedeSocial $redeSocial)
    {
        return $redeSocial;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(RedeSocial $redeSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RedeSocial $redeSocial)
    {
        $redeSocial->update($request->all());
        return $redeSocial;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(RedeSocial $redeSocial)
    {
        //
    }
}
