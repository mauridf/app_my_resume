<?php

namespace App\Http\Controllers;

use App\Models\Certificacao;
use Illuminate\Http\Request;

class CertificacaoController extends Controller
{
    public function __construct(Certificacao $certificacao) {
        $this->certificacao = $certificacao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificacoes = $this->certificacao->all();
        return $certificacoes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $certificacao = Certificacao::create($request->all());
        $certificacao = $this->certificacao->create($request->all());
        return $certificacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificacao = $this->certificacao->find($id);
        return $certificacao;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $certificacao->update($request->all());
        $certificacao = $this->certificacao->find($id);
        $certificacao->update($request->all());
        return $certificacao;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $certificacao->delete();
        $certificacao = $this->certificacao->find($id);
        $certificacao->delete();
        return ['msg' => 'O Certificado foi removido com sucesso!'];
    }
}
