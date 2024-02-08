<?php

namespace App\Http\Controllers;

use App\Models\PessoaRedeSocial;
use Illuminate\Http\Request;

class PessoaRedeSocialController extends Controller
{
    public function __construct(PessoaRedeSocial $pessoaRedeSocial)
    {
        $this->pessoaRedeSocial = $pessoaRedeSocial;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pessoaRedesSociais = PessoaRedeSocial::all();
        $pessoaRedesSociais = $this->pessoaRedesSociais->all();
        return $pessoaRedesSociais;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pessoaRedeSocial = PessoaRedeSocial::create($request->all());
        $pessoaRedeSocial = $this->pessoaRedeSocial->create($request->all());
        return $pessoaRedeSocial;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaRedeSocial  $pessoaRedeSocial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoaRedeSocial = $this->pessoaRedeSocial->find($id);
        return $pessoaRedeSocial;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaRedeSocial  $pessoaRedeSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $pessoaRedeSocial->update($request->all());
        $pessoaRedeSocial = $this->pessoaRedeSocial->find($id);
        $pessoaRedeSocial->update($request->all());
        return $pessoaRedeSocial;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaRedeSocial  $pessoaRedeSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pessoaRedeSocial->delete();
        $pessoaRedeSocial = $this->pessoaRedeSocial->find($id);
        $pessoaRedeSocial->delete();
        return ['msg' => 'A relação de pessoa e rede social foi removida com sucesso!'];
    }
}
