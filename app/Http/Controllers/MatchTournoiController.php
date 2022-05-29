<?php

namespace App\Http\Controllers;

use App\Models\matchTournoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchTournoiController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllEquipe()
    {
        return matchTournoi::all();

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
        $match = new matchTournoi();
        $match->name = $request->input('name');
        $match->id_tournoi = $request->input('id_tournoi');

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
        return matchTournoi::find($id);
    }

    // showByIdTournoi
    public function showByIdTournoi($id)
    {
        return DB::select("select * from match_tournois where id_tournoi=:id", ['id'=>$id]);
        // return DB::select('SELECT * FROM (
        //     SELECT * FROM `match_tournois` WHERE id_tournoi=?) as t1,
        //      (SELECT COUNT(*) as nb from joueur_tournois
        //      WHERE id_equipe = (SELECT id_equipe FROM match_tournois WHERE
        //       id_tournoi=?))as t2',[$id,$id]);
        // SELECT * FROM (SELECT * FROM `match_tournois` WHERE id_tournoi=12) as t1, (SELECT COUNT(*) from joueurs WHERE id_equipe = (SELECT id_equipe FROM match_tournois WHERE id_tournoi=12))as t2;
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
        $match = matchTournoi::find($id);
        $match->name= $request->input('name');
        $match->point = $request->input('point');
        $match->lost = $request->input('lost');
        $match->won = $request->input('won');
        $match->played = $request->input('played');
        $match->type = $request->input('id_tournoi');
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
        return matchTournoi::find($id)->delete();
    }
}
