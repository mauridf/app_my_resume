<?php

namespace App\Http\Controllers;

use App\Models\PessoaCertificacao;
use Illuminate\Http\Request;

class PessoaCertificacaoController extends Controller
{
    public function __construct(PessoaCertificacao $pessoaCertificacao)
    {
        $this->pessoaCertificacao = $pessoaCertificacao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pessoaCertificacoes = PessoaCertificacao::all();
        $pessoaCertificacoes = $this->pessoaCertificacoes->all();
        return $pessoaCertificacoes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pessoaCertificacao = PessoaCertificacao::create($request->all());
        $pessoaCertificacao = $this->pessoaCertificacao->create($request->all());
        return $pessoaCertificacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaCertificacao  $pessoaCertificacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoaCertificacao = $this->pessoaCertificacao->find($id);
        return $pessoaCertificacao;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaCertificacao  $pessoaCertificacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $pessoaCertificacao->update($request->all());
        $pessoaCertificacao = $this->pessoaCertificacao->find($id);
        $pessoaCertificacao->update($request->all());
        return $pessoaCertificacao;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaCertificacao  $pessoaCertificacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pessoaCertificacao->delete();
        $pessoaCertificacao = $this->pessoaCertificacao->find($id);
        $pessoaCertificacao->delete();
        return ['msg' => 'A relação de pessoa e certificado foi removido com sucesso!'];
    }
}
