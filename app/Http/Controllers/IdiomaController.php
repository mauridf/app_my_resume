<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public function __construct(Idioma $idioma)
    {
        $this->idioma = $idioma;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $idiomas = Idioma::all();
        $idiomas = $this->idioma->with('pessoaIdiomas')->get();
        return response()->json($idiomas,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $idioma = Idioma::create($request->all());
        $request->validate($this->idioma->rules(), $this->idioma->feedback());
        $idioma = $this->idioma->create($request->all());
        return response()->json($idioma,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idioma = $this->idioma->with('pessoaIdiomas')->find($id);
        if($idioma === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }
        return response()->json($idioma,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $idioma->update($request->all());
        $idioma = $this->idioma->find($id);

        if($idioma === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($idioma->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            // $request->validate($regrasDinamicas, $idioma->feedback());

        } else {
            // $request->validate($idioma->rules(), $idioma->feedback());
        }

        $idioma->fill($request->all());
        $idioma->save();
        // $idioma->update($request->all());
        return response()->json($idioma,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $idioma->delete();
        $idioma = $this->idioma->find($id);

        if($idioma === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $idioma->delete();
        return response()->json(['msg' => 'O idioma foi removido com sucesso!'],200);
    }
}
