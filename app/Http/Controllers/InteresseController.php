<?php

namespace App\Http\Controllers;

use App\Models\Interesse;
use Illuminate\Http\Request;

class InteresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interesses = Interesse::all();
        return $interesses;
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
        $interesse = Interesse::create($request->all());
        return $interesse;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function show(Interesse $interesse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function edit(Interesse $interesse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interesse $interesse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interesse $interesse)
    {
        //
    }
}
