<?php

namespace App\Http\Controllers;

use App\Models\Interesse;
use Illuminate\Http\Request;
use App\Repositories\InteresseRepository;

class InteresseController extends Controller
{
    public function __construct(Interesse $interesse)
    {
        $this->interesse = $interesse;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $interesses = Interesse::all();
        // $interesses = $this->interesse->with('pessoaInteresses')->get();
        // return response()->json($interesses,200);
        $interesseRepository = new InteresseRepository($this->interesse);

        if($request->has('atributos_pessoaInteresses')) {
            $atributos_pessoaInteresses = 'pessoaInteresses:id,'.$request->atributos_pessoaInteresses;
            $interesseRepository->selectAtributosRegistrosRelacionados($atributos_pessoaInteresses);
        } else {
            $interesseRepository->selectAtributosRegistrosRelacionados('pessoaInteresses');
        }

        if($request->has('filtro')) {
            $interesseRepository->filtro($request->filtro);
        }

        if($request->has('atributos')) {
            $interesseRepository->selectAtributos($request->atributos);
        } 

        return response()->json($interesseRepository->getResultadoPaginado(3), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $interesse = Interesse::create($request->all());
        $request->validate($this->interesse->rules(), $this->interesse->feedback());
        $interesse = $this->interesse->create($request->all());
        return response()->json($interesse,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interesse = $this->interesse->with('pessoaInteresses')->find($id);

        if($interesse === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return $interesse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $interesse->update($request->all());
        $interesse = $this->interesse->find($id);

        if($interesse === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($interesse->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            // $request->validate($regrasDinamicas, $interesse->feedback());

        } else {
            // $request->validate($interesse->rules(), $interesse->feedback());
        }

        $interesse->fill($request->all());
        $interesse->save();
        // $interesse->update($request->all());
        return response()->json($interesse,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $interesse->delete();
        $interesse = $this->interesse->find($id);

        if($interesse === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $interesse->delete();
        return response()->json(['msg' => 'O interesse foi removido com sucesso!'],200);
    }
}
