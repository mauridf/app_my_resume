<?php

namespace App\Http\Controllers;

use App\Models\PessoaIdioma;
use Illuminate\Http\Request;

class PessoaIdiomaController extends Controller
{
    public function __construct(PessoaIdioma $pessoaIdioma)
    {
        $this->pessoaIdioma = $pessoaIdioma;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pessoaIdiomas = PessoaIdioma::all();
        $pessoaIdiomas = $this->pessoaIdiomas->all();
        return $pessoaIdiomas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pessoaIdioma = PessoaIdioma::create($request->all());
        $pessoaIdioma = $this->pessoaIdioma->create($request->all());
        return $pessoaIdioma;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PessoaIdioma  $pessoaIdioma
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoaIdioma = $this->pessoaIdioma->find($id);
        return $pessoaIdioma;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PessoaIdioma  $pessoaIdioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $pessoaIdioma->update($request->all());
        $pessoaIdioma = $this->pessoaIdioma->find($id);
        $pessoaIdioma->update($request->all());
        return $pessoaIdioma;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PessoaIdioma  $pessoaIdioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pessoaIdioma->delete();
        $pessoaIdioma = $this->pessoaIdioma->find($id);
        $pessoaIdioma->delete();
        return ['msg' => 'A relação de pessoa e idioma foi removida com sucesso!'];
    }
}
