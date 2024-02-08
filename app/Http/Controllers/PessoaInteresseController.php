<?php

namespace App\Http\Controllers;

use App\Models\PessoaIdioma;
use App\Models\PessoaInteresse;
use Illuminate\Http\Request;

class PessoaInteresseController extends Controller
{
    public function __construct(PessoaInteresse $pessoaInteresse)
    {
        $this->pessoaInteresse = $pessoaInteresse;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pessoaInteresses = PessoaInteresse::all();
        $pessoaInteresse = $this->pessoaInteresse->all();
        return $pessoaInteresse;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pessoaInteresse = PessoaInteresse::create($request->all());
        $pessoaInteresse = $this->pessoaInteresse->create($request->all());
        return $pessoaInteresse;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaInteresse  $pessoaInteresse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoaInteresse = $this->pessoaInteresse->find($id);
        return $pessoaInteresse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaInteresse  $pessoaInteresse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $pessoaInteresse->update($request->all());
        $pessoaInteresse = $this->pessoaInteresse->find($id);
        $pessoaInteresse->update($request->all());
        return $pessoaInteresse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaInteresse  $pessoaInteresse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pessoaInteresse->delete();
        $pessoaInteresse = $this->pessoaInteresse->find($id);
        $pessoaInteresse->delete();
        return ['msg' => 'A relação de pessoa e interesse foi removida com sucesso!'];
    }
}
