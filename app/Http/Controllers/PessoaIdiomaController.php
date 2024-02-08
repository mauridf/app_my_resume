<?php

namespace App\Http\Controllers;

use App\Models\PessoaIdioma;
use Illuminate\Http\Request;

class PessoaIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoaIdiomas = PessoaIdioma::all();
        return $pessoaIdiomas;
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
        $pessoaIdioma = PessoaIdioma::create($request->all());
        return $pessoaIdioma;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaIdioma  $pessoaIdioma
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaIdioma $pessoaIdioma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PessoaIdioma  $pessoaIdioma
     * @return \Illuminate\Http\Response
     */
    public function edit(PessoaIdioma $pessoaIdioma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaIdioma  $pessoaIdioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaIdioma $pessoaIdioma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaIdioma  $pessoaIdioma
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaIdioma $pessoaIdioma)
    {
        //
    }
}
