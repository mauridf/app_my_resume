<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public function __construct(Experiencia $experiencia) {
        $this->experiencia = $experiencia;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $experiencias = Experiencia::all();
        $experiencias = $this->experiencia->all();
        return $experiencias;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $experiencia = Experiencia::create($request->all());
        $experiencia = $this->experiencia->create($request->all());
        return $experiencia;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experiencia = $this->experiencia->find($id);
        return $experiencia;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $experiencia->update($request->all());
        $experiencia = $this->experiencia->find($id);
        $experiencia->update($request->all());
        return $experiencia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $experiencia->delete();
        $experiencia = $this->experiencia->find($id);
        $experiencia->delete();
        return ['msg' => 'A experiência foi removida com sucesso!'];
    }
}
