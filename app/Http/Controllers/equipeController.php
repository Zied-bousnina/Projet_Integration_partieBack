<?php

namespace App\Http\Controllers;

use App\Models\Equipe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class equipeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllEquipe()
    {
        return DB::select('SELECT * FROM ( SELECT * FROM `equipes` ) as t1, (SELECT COUNT(*) as nb from joueurs )as t2');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $match = new Equipe;
        $match->name = $request->input('name');
        $match->type = $request->input('type');

        return $match->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::select("SELECT * FROM equipes where id_equipe =? ",[$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $match = Equipe::find($id);
        $match->name= $request->input('name');
        $match->point = $request->input('point');
        $match->lost = $request->input('lost');
        $match->won = $request->input('won');
        $match->played = $request->input('played');
        $match->type = $request->input('type');
        return $match->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Equipe::find($id)->delete();
    }
}
