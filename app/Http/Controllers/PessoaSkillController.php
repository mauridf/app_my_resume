<?php

namespace App\Http\Controllers;

use App\Models\PessoaSkill;
use Illuminate\Http\Request;

class PessoaSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoaSkills = PESSOASKILL::all();
        return $pessoaSkills;
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
        $pessoaSkill = PessoaSkill::create($request->all());
        return $pessoaSkill;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaSkill  $pessoaSkill
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaSkill $pessoaSkill)
    {
        return $pessoaSkill;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PessoaSkill  $pessoaSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(PessoaSkill $pessoaSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaSkill  $pessoaSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaSkill $pessoaSkill)
    {
        $pessoaSkill->update($request->all());
        return $pessoaSkill;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaSkill  $pessoaSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaSkill $pessoaSkill)
    {
        $pessoaSkill->delete();
        return ['msg' => 'A relação de pessoa e skill foi removida com sucesso!'];
    }
}
