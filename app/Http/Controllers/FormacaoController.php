<?php

namespace App\Http\Controllers;

use App\Models\Formacao;
use Illuminate\Http\Request;

class FormacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formacoes = Formacao::all();
        return $formacoes;
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
        $formacao = Formacao::create($request->all());
        return $formacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function show(Formacao $formacao)
    {
        return $formacao;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Formacao $formacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formacao $formacao)
    {
        $formacao->update($request->all());
        return $formacao;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formacao $formacao)
    {
        //
    }
}
