<?php

namespace App\Http\Controllers;

use App\Models\ExperienciaSkill;
use Illuminate\Http\Request;

class ExperienciaSkillController extends Controller
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
        $experienciaSkill = ExperienciaSkill::create($request->all());
        return $experienciaSkill;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExperienciaSkill  $experienciaSkill
     * @return \Illuminate\Http\Response
     */
    public function show(ExperienciaSkill $experienciaSkill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExperienciaSkill  $experienciaSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(ExperienciaSkill $experienciaSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExperienciaSkill  $experienciaSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExperienciaSkill $experienciaSkill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExperienciaSkill  $experienciaSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExperienciaSkill $experienciaSkill)
    {
        //
    }
}
