<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $skills = SKILL::all();
        $skills = $this->skills->all();
        return $skills;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $skill = Skill::create($request->all());
        $skill = $this->skill->create($request->all());
        return $skill;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = $this->skill->find($id);
        return $skill;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $skill->update($request->all());
        $skill = $this->skill->find($id);
        $skill->update($request->all());
        return $skill;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $skill->delete();
        $skill = $this->skill->find($id);
        $skill->delete();
        return ['msg' => 'O skill foi removido com sucesso!'];
    }
}
