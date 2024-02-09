<?php

namespace App\Http\Controllers;

use App\Models\TipoSkill;
use Illuminate\Http\Request;

class TipoSkillController extends Controller
{
    public function __construct(TipoSkill $tipoSkill)
    {
        $this->tipoSkill = $tipoSkill;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tipoSkill = TipoSkill::all();
        $tipoSkill = $this->tipoSkill->with('skill')->get();
        return response()->json($tipoSkill,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $tipoSkill = TipoSkill::create($request->all());
        $request->validate($this->tipoSkill->rules(), $this->tipoSkill->feedback());
        $tipoSkill = $this->tipoSkill->create($request->all());
        return response()->json($tipoSkill,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoSkill = $this->tipoSkill->with('skill')->find($id);

        if($tipoSkill === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($tipoSkill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $tipoSkill->update($request->all());
        $tipoSkill = $this->tipoSkill->find($id);

        if($tipoSkill === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($tipoSkill->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            $request->validate($regrasDinamicas, $tipoSkill->feedback());

        } else {
            $request->validate($tipoSkill->rules(), $tipoSkill->feedback());
        }

        $tipoSkill->update($request->all());
        return response()->json($tipoSkill,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoSkill  $tipoSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $tipoSkill->delete();
        $tipoSkill = $this->tipoSkill->find($id);

        if($tipoSkill === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $tipoSkill->delete();
        return ['msg' => 'O tipo skill foi removido com sucesso!'];
    }
}
