<?php

namespace App\Http\Controllers;

use App\Models\PessoaCertificacao;
use Illuminate\Http\Request;

class PessoaCertificacaoController extends Controller
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
        $pessoaCertificacao = PessoaCertificacao::create($request->all());
        return $pessoaCertificacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaCertificacao  $pessoaCertificacao
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaCertificacao $pessoaCertificacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PessoaCertificacao  $pessoaCertificacao
     * @return \Illuminate\Http\Response
     */
    public function edit(PessoaCertificacao $pessoaCertificacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaCertificacao  $pessoaCertificacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaCertificacao $pessoaCertificacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaCertificacao  $pessoaCertificacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaCertificacao $pessoaCertificacao)
    {
        //
    }
}
