<?php

namespace App\Http\Controllers;

use App\Models\PessoaExperiencia;
use Illuminate\Http\Request;

class PessoaExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoaExperiencias = PessoaExperiencia::all();
        return $pessoaExperiencias;
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
        $pessoaExperiencia = PessoaExperiencia::create($request->all());
        return $pessoaExperiencia;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaExperiencia  $pessoaExperiencia
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaExperiencia $pessoaExperiencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PessoaExperiencia  $pessoaExperiencia
     * @return \Illuminate\Http\Response
     */
    public function edit(PessoaExperiencia $pessoaExperiencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaExperiencia  $pessoaExperiencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaExperiencia $pessoaExperiencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaExperiencia  $pessoaExperiencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaExperiencia $pessoaExperiencia)
    {
        //
    }
}
