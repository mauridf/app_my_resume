<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $skills = SKILL::all();
        $skills = $this->skills->all();
        return response()->json($skills,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $skill = Skill::create($request->all());
        $request->validate($this->skill->rules(), $this->skill->feedback());
        $skill = $this->skill->create($request->all());
        return response()->json($skill,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = $this->skill->find($id);

        if($skill === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($skill,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $skill->update($request->all());
        $skill = $this->skill->find($id);

        if($skill === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($skill->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            $request->validate($regrasDinamicas, $skill->feedback());

        } else {
            $request->validate($skill->rules(), $skill->feedback());
        }

        $skill->update($request->all());
        return response()->json($skill,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $skill->delete();
        $skill = $this->skill->find($id);

        if($skill === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $skill->delete();
        return response()->json(['msg' => 'O skill foi removido com sucesso!'],200);
    }
}
