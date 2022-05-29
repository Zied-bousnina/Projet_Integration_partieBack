<?php

namespace App\Http\Controllers;

use App\Models\AllMatch;
use Illuminate\Http\Request;

class matchs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllMatch()
    {
        return AllMatch::all();

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
        $match = new AllMatch;
        $match->localisation = $request->input('localisation');
        $match->id_equipe1 = $request->input('id_equipe1');
        $match->id_equipe2 = $request->input('id_equipe2');
        $match->date = $request->input('date');
         $match->type = $request->input('type');
        //  $match->winner = $request->input('id_equipe1');

        // return $match->save();
        return $match;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AllMatch::find($id);
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
        $match = AllMatch::find($id);
        $match->localisation= $request->input('localisation');
        $match->id_equipe1 = $request->input('id_equipe1');
        $match->id_equipe2 = $request->input('id_equipe2');
        $match->date = $request->input('date');
        $match->type = $request->input('type');
        $match->id_tournoi = $request->input('id_tournoi');
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
        return AllMatch::find($id)->delete();
    }
}
