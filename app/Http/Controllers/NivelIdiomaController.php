<?php

namespace App\Http\Controllers;

use App\Models\NivelIdioma;
use Illuminate\Http\Request;

class NivelIdiomaController extends Controller
{
    public function __construct(NivelIdioma $nivelIdioma)
    {
        $this->nivelIdioma = $nivelIdioma;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $nivelIdiomas = NivelIdioma::all();
        $nivelIdiomas = $this->nivelIdiomas->all();
        return response()->json($nivelIdiomas,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $nivelIdioma = NivelIdioma::create($request->all());
        $request->validate($this->nivelIdioma->rules(), $this->nivelIdioma->feedback());
        $nivelIdioma = $this->nivelIdioma->create($request->all());
        return response()->json($nivelIdioma,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivelIdioma = $this->nivelIdioma->find($id);

        if($nivelIdioma === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($nivelIdioma,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $nivelIdioma->update($request->all());
        $nivelIdioma = $this->nivelIdioma->find($id);

        if($nivelIdioma === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($nivelIdioma->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            $request->validate($regrasDinamicas, $nivelIdioma->feedback());

        } else {
            $request->validate($nivelIdioma->rules(), $nivelIdioma->feedback());
        }

        $nivelIdioma->update($request->all());
        return response()->json($nivelIdioma,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $nivelIdioma->delete();
        $nivelIdioma = $this->nivelIdioma->find($id);

        if($nivelIdioma === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $nivelIdioma->delete();
        return response()->json(['msg' => 'O nível do idioma foi removido com sucesso!'],200);
    }
}
