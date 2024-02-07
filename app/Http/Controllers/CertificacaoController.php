<?php

namespace App\Http\Controllers;

use App\Models\Certificacao;
use Illuminate\Http\Request;

class CertificacaoController extends Controller
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
        $certificacao = Certificacao::create($request->all());
        return $certificacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function show(Certificacao $certificacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificacao $certificacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificacao $certificacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificacao  $certificacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificacao $certificacao)
    {
        //
    }
}
