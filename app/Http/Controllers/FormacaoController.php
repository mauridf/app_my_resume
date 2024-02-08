<?php

namespace App\Http\Controllers;

use App\Models\Formacao;
use Illuminate\Http\Request;

class FormacaoController extends Controller
{
    public function __construct(Formacao $formacao)
    {
        $this->formacao = $formacao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $formacoes = Formacao::all();
        $formacoes = $this->formacao->all();
        return $formacoes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $formacao = Formacao::create($request->all());
        $formacao = $this->formacao->create($request->all());
        return $formacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formacao = $this->formacao->find($id);
        return $formacao;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $formacao->update($request->all());
        $formacao = $this->formacao->find($id);
        $formacao->update($request->all());
        return $formacao;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $formacao->delete();
        $formacao = $this->formacao->find($id);
        $formacao->delete();
        return ['msg' => 'A formação foi removida com sucesso!'];
    }
}
