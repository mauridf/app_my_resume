<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Repositories\PessoaRepository;

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
    public function index(Request $request)
    {
        // $pessoas = Pessoa::all();
        // $pessoas = $this->pessoa->all();

        $pessoaRepository = new PessoaRepository($this->pessoa);

        if($request->has('atributos_pessoaInteresses')) {
            $atributos_pessoaInteresses = 'pessoaInteresses:id,'.$request->atributos_pessoaInteresses;
            $pessoaRepository->selectAtributosRegistrosRelacionados($atributos_pessoaInteresses);
        } 
        if($request->has('atributos_pessoaCertificacao')) {
            $atributos_pessoaCertificacao = 'pessoaCertificacao:id,'.$request->atributos_pessoaCertificacao;
            $pessoaRepository->selectAtributosRegistrosRelacionados($atributos_pessoaCertificacao);
        } 
        if($request->has('atributos_pessoaFormacao')) {
            $atributos_pessoaFormacao = 'pessoaFormacao:id,'.$request->atributos_pessoaFormacao;
            $pessoaRepository->selectAtributosRegistrosRelacionados($atributos_pessoaFormacao);
        } 
        if($request->has('atributos_pessoaRedesSociais')) {
            $atributos_pessoaRedesSociais = 'pessoaRedesSociais:id,'.$request->atributos_pessoaRedesSociais;
            $pessoaRepository->selectAtributosRegistrosRelacionados($atributos_pessoaRedesSociais);
        } 
        if($request->has('atributos_pessoaIdiomas')) {
            $atributos_pessoaIdiomas = 'pessoaIdiomas:id,'.$request->atributos_pessoaIdiomas;
            $pessoaRepository->selectAtributosRegistrosRelacionados($atributos_pessoaIdiomas);
        } 
        if($request->has('atributos_pessoaSkill')) {
            $atributos_pessoaSkill = 'pessoaSkill:id,'.$request->atributos_pessoaSkill;
            $pessoaRepository->selectAtributosRegistrosRelacionados($atributos_pessoaSkill);
        } 
        if($request->has('atributos_pessoaExperiencia')) {
            $atributos_pessoaExperiencia = 'pessoaExperiencia:id,'.$request->atributos_pessoaExperiencia;
            $pessoaRepository->selectAtributosRegistrosRelacionados($atributos_pessoaExperiencia);
        } else {
            $pessoaRepository->selectVariosAtributosRegistrosRelacionados('pessoaInteresses','pessoaCertificacao','pessoaFormacao','pessoaRedesSociais','pessoaIdiomas','pessoaSkill','pessoaExperiencia');
        }

        if($request->has('filtro')) {
            $pessoaRepository->filtro($request->filtro);
        }

        if($request->has('atributos')) {
            $pessoaRepository->selectAtributos($request->atributos);
        } 

        // $pessoas = $this->pessoa->with('pessoaInteresses','pessoaCertificacao','pessoaFormacao','pessoaRedesSociais','pessoaIdiomas','pessoaSkill','pessoaExperiencia')->get();
        // return response()->json($pessoas,200);
        return response()->json($pessoaRepository->getResultadoPaginado(3), 200);
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

        $imagem = $request->file('imagem');
        $imagem_urn = $imagem->store('imagens', 'public');

        $pessoa = $this->pessoa->create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'sexo' => $request->sexo,
            'imagem' => $imagem_urn,
            'sumario' => $request->sumario
        ]);

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
        $pessoa = $this->pessoa->with('pessoaInteresses','pessoaCertificacao','pessoaFormacao','pessoaRedesSociais','pessoaIdiomas','pessoaSkill','pessoaExperiencia')->find($id);

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
            
            // $request->validate($regrasDinamicas);

        } else {
            // $request->validate($pessoa->rules());
        }
        //preenchendo o objeto $pessoa com todos os dados do request
        $pessoa->fill($request->all());
        
        //se a imagem foi encaminhada na requisição
        if($request->file('imagem')) {
            //remove o arquivo antigo
            Storage::disk('public')->delete($pessoa->imagem);

            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens', 'public');
            $pessoa->imagem = $imagem_urn;
        }
        // dd($pessoa);
        // $pessoa->update($request->all());
        $pessoa->save();
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

        //remove o arquivo antigo
        Storage::disk('public')->delete($pessoa->imagem); 

        $pessoa->delete();
        return response()->json(['msg' => 'A pessoa foi removida com sucesso!'],200);
    }
}
