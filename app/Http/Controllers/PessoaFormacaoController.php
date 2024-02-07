<?php

namespace App\Http\Controllers;

use App\Models\PessoaFormacao;
use Illuminate\Http\Request;

class PessoaFormacaoController extends Controller
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
        $pessoaFormacao = PessoaFormacao::create($request->all());
        return $pessoaFormacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaFormacao  $pessoaFormacao
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaFormacao $pessoaFormacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PessoaFormacao  $pessoaFormacao
     * @return \Illuminate\Http\Response
     */
    public function edit(PessoaFormacao $pessoaFormacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaFormacao  $pessoaFormacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaFormacao $pessoaFormacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaFormacao  $pessoaFormacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaFormacao $pessoaFormacao)
    {
        //
    }
}
