<?php

namespace App\Http\Controllers;

use App\Models\PessoaIdioma;
use App\Models\PessoaInteresse;
use Illuminate\Http\Request;

class PessoaInteresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoa_interesses = PessoaIdioma::all();
        return $pessoa_interesses;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pessoaInteresse = PessoaInteresse::create($request->all());
        return $pessoaInteresse;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaInteresse  $pessoaInteresse
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaInteresse $pessoaInteresse)
    {
        return $pessoaInteresse;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PessoaInteresse  $pessoaInteresse
     * @return \Illuminate\Http\Response
     */
    public function edit(PessoaInteresse $pessoaInteresse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaInteresse  $pessoaInteresse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaInteresse $pessoaInteresse)
    {
        $pessoaInteresse->update($request->all());
        return $pessoaInteresse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaInteresse  $pessoaInteresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaInteresse $pessoaInteresse)
    {
        $pessoaInteresse->delete();
        return ['msg' => 'A relação de pessoa e interesse foi removida com sucesso!'];
    }
}
