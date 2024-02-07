<?php

namespace App\Http\Controllers;

use App\Models\TipoSkill;
use Illuminate\Http\Request;

class TipoSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $tipoSkill = TipoSkill::create($request->all());
        return $tipoSkill;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function show(TipoSkill $tipoSkill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoSkill $tipoSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoSkill $tipoSkill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoSkill $tipoSkill)
    {
        //
    }
}
