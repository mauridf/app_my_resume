<?php

namespace App\Http\Controllers;

use App\Models\TipoSkill;
use Illuminate\Http\Request;

class TipoSkillController extends Controller
{
    public function __construct(TipoSkill $tipoSkill)
    {
        $this->tipoSkill = $tipoSkill;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tipoSkill = TipoSkill::all();
        $tipoSkill = $this->tipoSkill->all();
        return $tipoSkill;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $tipoSkill = TipoSkill::create($request->all());
        $tipoSkill = $this->tipoSkill->create($request->all());
        return $tipoSkill;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoSkill = $this->tipoSkill->find($id);
        return $tipoSkill;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $tipoSkill->update($request->all());
        $tipoSkill = $this->tipoSkill->find($id);
        $tipoSkill->update($request->all());
        return $tipoSkill;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $tipoSkill->delete();
        $tipoSkill = $this->tipoSkill->find($id);
        $tipoSkill->delete();
        return ['msg' => 'O tipo skill foi removido com sucesso!'];
    }
}
