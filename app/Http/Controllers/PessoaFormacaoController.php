<?php

namespace App\Http\Controllers;

use App\Models\PessoaFormacao;
use Illuminate\Http\Request;

class PessoaFormacaoController extends Controller
{
    public function __construct(PessoaFormacao $pessoaFormacao)
    {
        $this->pessoaFormacao = $pessoaFormacao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pessoaFormacoes = PessoaFormacao::all();
        $pessoaFormacoes = $this->pessoaFormacao->all();
        return $pessoaFormacoes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pessoaFormacao = PessoaFormacao::create($request->all());
        $pessoaFormacao = $this->pessoaFormacao->create($request->all());
        return $pessoaFormacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaFormacao  $pessoaFormacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoaFormacao = $this->pessoaFormacao->find($id);
        return $pessoaFormacao;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaFormacao  $pessoaFormacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $pessoaFormacao->update($request->all());
        $pessoaFormacao = $this->pessoaFormacao->find($id);
        $pessoaFormacao->update($request->all());
        return $pessoaFormacao;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaFormacao  $pessoaFormacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pessoaFormacao->delete();
        $pessoaFormacao = $this->pessoaFormacao->find($id);
        $pessoaFormacao->delete();
        return ['msg' => 'A relação de pessoa e formação foi removida com sucesso!'];
    }
}
