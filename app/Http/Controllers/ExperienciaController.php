<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Http\Request;
use App\Repositories\ExperienciaRepository;

class ExperienciaController extends Controller
{
    public function __construct(Experiencia $experiencia) {
        $this->experiencia = $experiencia;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $experiencias = Experiencia::all();
        // $experiencias = $this->experiencia->with('pessoaExperiencia','experienciaSkill')->get();
        // return response()->json($experiencias,200);
        $experienciaRepository = new ExperienciaRepository($this->experiencia);

        if($request->has('atributos_pessoaExperiencia')) {
            $atributos_pessoaExperiencia = 'pessoaExperiencia:id,'.$request->atributos_pessoaExperiencia;
            $experienciaRepository->selectAtributosRegistrosRelacionados($atributos_pessoaExperiencia);
        } 
        if($request->has('atributos_experienciaSkill')) {
            $atributos_experienciaSkill = 'experienciaSkill:id,'.$request->atributos_experienciaSkill;
            $experienciaRepository->selectAtributosRegistrosRelacionados($atributos_experienciaSkill);
        } else {
            $experienciaRepository->selectDoisAtributosRegistrosRelacionados('pessoaExperiencia','experienciaSkill');
        }

        if($request->has('filtro')) {
            $experienciaRepository->filtro($request->filtro);
        }

        if($request->has('atributos')) {
            $experienciaRepository->selectAtributos($request->atributos);
        } 

        return response()->json($experienciaRepository->getResultadoPaginado(3), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $experiencia = Experiencia::create($request->all());
        $request->validate($this->experiencia->rules(), $this->experiencia->feedback());
        $experiencia = $this->experiencia->create($request->all());
        return response()->json($experiencia,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experiencia = $this->experiencia->with('pessoaExperiencia','experienciaSkill')->find($id);
        if($experiencia === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        } 
        return response()->json($experiencia,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $experiencia->update($request->all());
        $experiencia = $this->experiencia->find($id);

        if($experiencia === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($experiencia->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            // $request->validate($regrasDinamicas, $experiencia->feedback());

        } else {
            // $request->validate($experiencia->rules(), $experiencia->feedback());
        }

        $experiencia->fill($request->all());
        $experiencia->save();
        $experiencia->update($request->all());
        return response()->json($experiencia,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $experiencia->delete();
        $experiencia = $this->experiencia->find($id);

        if($experiencia === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $experiencia->delete();
        return response()->json(['msg' => 'A experiência foi removida com sucesso!'],200);
    }
}
