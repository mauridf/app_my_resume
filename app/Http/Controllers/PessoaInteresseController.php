<?php

namespace App\Http\Controllers;

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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaInteresse  $pessoaInteresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaInteresse $pessoaInteresse)
    {
        //
    }
}
