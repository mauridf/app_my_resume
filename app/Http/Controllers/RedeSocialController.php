<?php

namespace App\Http\Controllers;

use App\Models\RedeSocial;
use Illuminate\Http\Request;

class RedeSocialController extends Controller
{
    public function __construct(RedeSocial $redeSocial)
    {
        $this->redeSocial = $redeSocial;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $redesSociais = RedeSocial::all();
        $redesSociais = $this->redesSociais->all();
        return $redesSociais;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $redeSocial = RedeSocial::create($request->all());
        $redeSocial = $this->redeSocial->create($request->all());
        return $redeSocial;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $redeSocial = $this->redeSocial->find($id);
        return $redeSocial;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $redeSocial->update($request->all());
        $redeSocial = $this->redeSocial->find($id);
        $redeSocial->update($request->all());
        return $redeSocial;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RedeSocial  $redeSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $redeSocial->delete();
        $redeSocial = $this->redeSocial->find($id);
        $redeSocial->delete();
        return ['msg' => 'A rede social foi removida com sucesso!'];
    }
}
