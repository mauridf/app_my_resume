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
        $pessoaCertificacoes = PessoaCertificacao::all();
        return $pessoaCertificacoes;
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
        return $pessoaCertificacao;
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
        $pessoaCertificacao->update($request->all());
        return $pessoaCertificacao;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaCertificacao  $pessoaCertificacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaCertificacao $pessoaCertificacao)
    {
        $pessoaCertificacao->delete();
        return ['msg' => 'A relação de pessoa e certificado foi removido com sucesso!'];
    }
}
