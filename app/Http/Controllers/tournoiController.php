<?php

namespace App\Http\Controllers;

use App\Models\tournoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tournoiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllTournoi()
    {
        return tournoi::all();

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
        // ['nomTournoi', 'date', 'lieu', 'winner', 'organisateur']
        $tournoi = new tournoi;
        $tournoi->nomTournoi = $request->input('nomTournoi');
        $tournoi->date = $request->input('date');
        $tournoi->lieu = $request->input('lieu');
        $tournoi->type = $request->input('type');

        return $tournoi->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return tournoi::find($id);
    }
    public function showByType($type)
    {
        return DB::select('select * from tournois where type =:type ', ['type'=>$type]);

    }
//get the last Tournoi are  created
    public function showLast()
    {
        // return DB::select('select * from tournois where id_tournoi=( select max(id_tournoi) from tournois )');
        return DB::select(' select max(id_tournoi) id_tournoi from tournois ');

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
        $match = tournoi::find($id);
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
        return tournoi::find($id)->delete();
    }
}
