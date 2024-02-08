<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

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
    public function index()
    {
        // $pessoas = Pessoa::all();
        $pessoas = $this->pessoa->all();
        return $pessoas;
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
        $pessoa = $this->pessoa->create($request->all());
        return $pessoa;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = $this->pessoa->find($id);
        return $pessoa;
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
        $pessoa->update($request->all());
        return $pessoa;
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
        $pessoa->delete();
        return ['msg' => 'A pessoa foi removida com sucesso!'];
    }
}
