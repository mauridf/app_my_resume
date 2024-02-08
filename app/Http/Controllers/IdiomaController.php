<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public function __construct(Idioma $idioma)
    {
        $this->idioma = $idioma;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $idiomas = Idioma::all();
        $idiomas = $this->idiomas->all();
        return $idiomas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $idioma = Idioma::create($request->all());
        $idioma = $this->idioma->create($request->all());
        return $idioma;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idioma = $this->idioma->find($id);
        return $idioma;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $idioma->update($request->all());
        $idioma = $this->idioma->find($id);
        $idioma->update($request->all());
        return $idioma;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $idioma->delete();
        $idioma = $this->idioma->find($id);
        $idioma->delete();
        return ['msg' => 'O idioma foi removido com sucesso!'];
    }
}
