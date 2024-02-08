<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pessoas = Pessoa::all();
        $pessoas = $this->pessoa->all();
        return response()->json($pessoas,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pessoa = Pessoa::create($request->all());
        $request->validate($this->pessoa->rules(), $this->pessoa->feedback());
        $pessoa = $this->pessoa->create($request->all());
        return response()->json($pessoa,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = $this->pessoa->find($id);

        if($pessoa === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($pessoa,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $pessoa->update($request->all());
        $pessoa = $this->pessoa->find($id);

        if($pessoa === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($pessoa->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            $request->validate($regrasDinamicas, $pessoa->feedback());

        } else {
            $request->validate($pessoa->rules(), $pessoa->feedback());
        }

        $pessoa->update($request->all());
        return response()->json($pessoa,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pessoa->delete();
        $pessoa = $this->pessoa->find($id);

        if($pessoa === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $pessoa->delete();
        return response()->json(['msg' => 'A pessoa foi removida com sucesso!'],200);
    }
}
