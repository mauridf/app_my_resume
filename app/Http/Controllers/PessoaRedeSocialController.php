<?php

namespace App\Http\Controllers;

use App\Models\PessoaRedeSocial;
use Illuminate\Http\Request;

class PessoaRedeSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoaRedesSociais = PessoaRedeSocial::all();
        return $pessoaRedesSociais;
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
        $pessoaRedeSocial = PessoaRedeSocial::create($request->all());
        return $pessoaRedeSocial;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaRedeSocial  $pessoaRedeSocial
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaRedeSocial $pessoaRedeSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PessoaRedeSocial  $pessoaRedeSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(PessoaRedeSocial $pessoaRedeSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaRedeSocial  $pessoaRedeSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaRedeSocial $pessoaRedeSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaRedeSocial  $pessoaRedeSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaRedeSocial $pessoaRedeSocial)
    {
        //
    }
}
