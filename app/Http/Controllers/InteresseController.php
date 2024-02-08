<?php

namespace App\Http\Controllers;

use App\Models\Interesse;
use Illuminate\Http\Request;

class InteresseController extends Controller
{
    public function __construct(Interesse $interesse)
    {
        $this->interesse = $interesse;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $interesses = Interesse::all();
        $interesses = $this->interesse->all();
        return $interesses;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $interesse = Interesse::create($request->all());
        $interesse = $this->interesse->create($request->all());
        return $interesse;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interesse = $this->interesse->find($id);
        return $interesse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $interesse->update($request->all());
        $interesse = $this->interesse->find($id);
        $interesse->update($request->all());
        return $interesse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $interesse->delete();
        $interesse = $this->interesse->find($id);
        $interesse->delete();
        return ['msg' => 'O interesse foi removido com sucesso!'];
    }
}
