<?php

namespace App\Http\Controllers;

use App\Models\matchAmical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchAmicalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllMatch()
    {
        return DB::select("SELECT * from(select * from match_amicals) as t1, (SELECT * FROM equipes ) as t2");

    }
    public function AllMatchByType($type)
    {
        // return DB::select("SELECT * from(select * from match_amicals  WHERE upper(type) =?) as t1, (SELECT * FROM equipes ) as t2",[$type]);
        return DB::select("select * from match_amicals  WHERE upper(type) =?",[$type]);

    }
    // public function AllMatch()
    // {
    //     return matchAmical::all();

    // }

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
        $match = new matchAmical;
        $match->localisation = $request->input('localisation');
        $match->id_equipe1 = $request->input('id_equipe1');
        $match->id_equipe2 = $request->input('id_equipe2');
        $match->date = $request->input('date');
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
        return matchAmical::find($id);
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
        $match = matchAmical::find($id);
        $match->localisation= $request->input('localisation');
        $match->id_equipe1 = $request->input('id_equipe1');
        $match->id_equipe2 = $request->input('id_equipe2');
        $match->date = $request->input('date');
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
        // return matchAmical::where("id_match",$id)->delete();
        return DB::delete("delete from all_matches where id_match=?  ",[$id]);
    }
}
