<?php

namespace App\Http\Controllers;

use App\Models\ExperienciaSkill;
use Illuminate\Http\Request;

class ExperienciaSkillController extends Controller
{
    public function __construct(ExperienciaSkill $experienciaSkill)
    {
        $this->experienciaSkill = $experienciaSkill;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $experienciaSkills = ExperienciaSkill::all();
        $experienciaSkills = $this->experienciaSkill->all();
        return $experienciaSkills;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $experienciaSkill = ExperienciaSkill::create($request->all());
        $experienciaSkill = $this->experienciaSkill->create($request->all());
        return $experienciaSkill;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExperienciaSkill  $experienciaSkill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experienciaSkill = $this->experienciaSkill->find($id);
        return $experienciaSkill;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExperienciaSkill  $experienciaSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $experienciaSkill->update($request->all());
        $experienciaSkill = $this->experienciaSkill->find($id);
        $experienciaSkill->update($request->all());
        return $experienciaSkill;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExperienciaSkill  $experienciaSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $experienciaSkill->delete();
        $experienciaSkill = $this->experienciaSkill->find($id);
        $experienciaSkill->delete();
        return ['msg' => 'A relação experiência e skill foi removida com sucesso!'];
    }
}
