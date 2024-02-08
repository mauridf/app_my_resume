<?php

namespace App\Http\Controllers;

use App\Models\NivelIdioma;
use Illuminate\Http\Request;

class NivelIdiomaController extends Controller
{
    public function __construct(NivelIdioma $nivelIdioma)
    {
        $this->nivelIdioma = $nivelIdioma;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $nivelIdiomas = NivelIdioma::all();
        $nivelIdiomas = $this->nivelIdiomas->all();
        return $nivelIdiomas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $nivelIdioma = NivelIdioma::create($request->all());
        $nivelIdioma = $this->nivelIdioma->create($request->all());
        return $nivelIdioma;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivelIdioma = $this->nivelIdioma->find($id);
        return $nivelIdioma;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $nivelIdioma->update($request->all());
        $nivelIdioma = $this->nivelIdioma->find($id);
        $nivelIdioma->update($request->all());
        return $nivelIdioma;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NivelIdioma  $nivelIdioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $nivelIdioma->delete();
        $nivelIdioma = $this->nivelIdioma->find($id);
        $nivelIdioma->delete();
        return ['msg' => 'O nível do idioma foi removido com sucesso!'];
    }
}
