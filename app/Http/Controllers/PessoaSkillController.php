<?php

namespace App\Http\Controllers;

use App\Models\PessoaSkill;
use Illuminate\Http\Request;

class PessoaSkillController extends Controller
{
    public function __construct(PessoaSkill $pessoaSkill)
    {
        $this->pessoaSkill = $pessoaSkill;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pessoaSkills = PESSOASKILL::all();
        $pessoaSkills = $this->pessoaSkill->all();
        return $pessoaSkills;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pessoaSkill = PessoaSkill::create($request->all());
        $pessoaSkill = $this->pessoaSkill->create($request->all());
        return $pessoaSkill;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaSkill  $pessoaSkill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoaSkill = $this->pessoaSkill->find($id);
        return $pessoaSkill;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaSkill  $pessoaSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $pessoaSkill->update($request->all());
        $pessoaSkill = $this->pessoaSkill->find($id);
        $pessoaSkill->update($request->all());
        return $pessoaSkill;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaSkill  $pessoaSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pessoaSkill->delete();
        $pessoaSkill = $this->pessoaSkill->find($id);
        $pessoaSkill->delete();
        return ['msg' => 'A relação de pessoa e skill foi removida com sucesso!'];
    }
}
