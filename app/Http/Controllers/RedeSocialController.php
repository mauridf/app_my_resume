<?php

namespace App\Http\Controllers;

use App\Models\RedeSocial;
use Illuminate\Http\Request;

class RedeSocialController extends Controller
{
    public function __construct(RedeSocial $redeSocial)
    {
        $this->redeSocial = $redeSocial;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $redesSociais = RedeSocial::all();
        $redesSociais = $this->redeSocial->with('pessoaRedesSociais')->get();
        return response()->json($redesSociais,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $redeSocial = RedeSocial::create($request->all());
        $request->validate($this->redeSocial->rules(), $this->redeSocial->feedback());
        $redeSocial = $this->redeSocial->create($request->all());
        return response()->json($redeSocial,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $redeSocial = $this->redeSocial->with('pessoaRedesSociais')->find($id);

        if($redeSocial === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($redeSocial,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $redeSocial->update($request->all());
        $redeSocial = $this->redeSocial->find($id);

        if($redeSocial === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($redeSocial->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            // $request->validate($regrasDinamicas, $redeSocial->feedback());

        } else {
            // $request->validate($redeSocial->rules(), $redeSocial->feedback());
        }

        $redeSocial->fill($request->all());
        $redeSocial->save();
        // $redeSocial->update($request->all());
        return response()->json($redeSocial,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $redeSocial->delete();
        $redeSocial = $this->redeSocial->find($id);

        if($redeSocial === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $redeSocial->delete();
        return response()->json(['msg' => 'A rede social foi removida com sucesso!'],200);
    }
}
