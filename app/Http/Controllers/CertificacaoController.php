<?php

namespace App\Http\Controllers;

use App\Models\Certificacao;
use App\Repositories\CertificacaoRepository;
use Illuminate\Http\Request;
use App\Repositories\CertificacaoRepositoryRepository;

class CertificacaoController extends Controller
{
    public function __construct(Certificacao $certificacao) {
        $this->certificacao = $certificacao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $certificacoes = $this->certificacao->all();
        // $certificacoes = $this->certificacao->with('pessoaCertificacao')->get();
        // return response()->json($certificacoes, 200);
        $certificacaoRepository = new CertificacaoRepository($this->certificacao);

        if($request->has('atributos_pessoaCertificacao')) {
            $atributos_pessoaCertificacao = 'pessoaCertificacao:id,'.$request->atributos_pessoaCertificacao;
            $certificacaoRepository->selectAtributosRegistrosRelacionados($atributos_pessoaCertificacao);
        } else {
            $certificacaoRepository->selectAtributosRegistrosRelacionados('pessoaCertificacao');
        }

        if($request->has('filtro')) {
            $certificacaoRepository->filtro($request->filtro);
        }

        if($request->has('atributos')) {
            $certificacaoRepository->selectAtributos($request->atributos);
        } 

        return response()->json($certificacaoRepository->getResultadoPaginado(3), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $certificacao = Certificacao::create($request->all());
        $request->validate($this->certificacao->rules(), $this->certificacao->feedback());
        $certificacao = $this->certificacao->create($request->all());
        return response()->json($certificacao, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificacao = $this->certificacao->with('pessoaCertificacao')->find($id);
        if($certificacao === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        } 
        return response()->json($certificacao, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $certificacao->update($request->all());
        $certificacao = $this->certificacao->find($id);

        if($certificacao === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach($certificacao->rules() as $input => $regra) {
                
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            
            // $request->validate($regrasDinamicas, $certificacao->feedback());

        } else {
            // $request->validate($certificacao->rules(), $certificacao->feedback());
        }
        $certificacao->fill($request->all());
        $certificacao->save();
        // $certificacao->update($request->all());
        return response()->json($certificacao, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $certificacao->delete();
        $certificacao = $this->certificacao->find($id);

        if($certificacao === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $certificacao->delete();
        return response()->json(['msg' => 'O Certificado foi removido com sucesso!'], 200);
    }
}
