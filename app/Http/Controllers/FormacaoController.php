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
        $formacoes = $this->formacao->with('pessoaFormacao')->get();
        return response()->json($formacoes,200);
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
        $request->validate($this->formacao->rules(), $this->formacao->feedback());
        $formacao = $this->formacao->create($request->all());
        return response()->json($formacao,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formacao  $formacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formacao = $this->formacao->with('pessoaFormacao')->find($id);
        if($formacao === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }
        return response()->json($formacao,200);
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

        if($formacao === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($formacao->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            // $request->validate($regrasDinamicas, $formacao->feedback());

        } else {
            // $request->validate($formacao->rules(), $formacao->feedback());
        }
        
        $formacao->fill($request->all());
        $formacao->save();
        // $formacao->update($request->all());
        return response()->json($formacao,200);
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

        if($formacao === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $formacao->delete();
        return response()->json(['msg' => 'A formação foi removida com sucesso!'],200);
    }
}
