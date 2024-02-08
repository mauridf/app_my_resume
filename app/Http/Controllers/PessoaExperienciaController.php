<?php

namespace App\Http\Controllers;

use App\Models\PessoaExperiencia;
use Illuminate\Http\Request;

class PessoaExperienciaController extends Controller
{
    public function __construct(PessoaExperiencia $pessoaExperiencia)
    {
        $this->pessoaExperiencia = $pessoaExperiencia;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pessoaExperiencias = PessoaExperiencia::all();
        $pessoaExperiencias = $this->pessoaExperiencias->all();
        return $pessoaExperiencias;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pessoaExperiencia = PessoaExperiencia::create($request->all());
        $pessoaExperiencia = $this->pessoaExperiencia->create($request->all());
        return $pessoaExperiencia;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaExperiencia  $pessoaExperiencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoaExperiencia = $this->pessoaExperiencia->find($id);
        return $pessoaExperiencia;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaExperiencia  $pessoaExperiencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $pessoaExperiencia->update($request->all());
        $pessoaExperiencia = $this->pessoaExperiencia->find($id);
        $pessoaExperiencia->update($request->all());
        return $pessoaExperiencia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaExperiencia  $pessoaExperiencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pessoaExperiencia->delete();
        $pessoaExperiencia = $this->pessoaExperiencia->find($id);
        $pessoaExperiencia->delete();
        return ['msg' => 'A relação de pessoa e experiência foi removida com sucesso!'];
    }
}
