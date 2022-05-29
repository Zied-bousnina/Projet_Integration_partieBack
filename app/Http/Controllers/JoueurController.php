<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoueurController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllJoueur()
    {
        return Joueur::all();

    }

    public function countJoueur(){
        return DB::select('SELECT id_equipe, COUNT(*)  nb from joueurs GROUP by id_equipe');

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
        $match = new Joueur;
        $match->nom = $request->input('nom');
        $match->prenom = $request->input('prenom');
        $match->depJoueur = $request->input('depJoueur');
        $match->faculteJoueur = $request->input('faculteJoueur');
        $match->class = $request->input('class');
        $match->dateNais = $request->input('dateNais');
        $match->id_equipe = $request->input('id_equipe');

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
        return Joueur::find($id);
    }

    public function showIdEquipe($id)
    {
        return  DB::select('select * from joueurs where id_equipe=:id_equipe', ['id_equipe'=>$id]);
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
        $joueur = Joueur::find($id);
        $joueur->name = $request->input('nom');
        $joueur->prenom = $request->input('prenom');
        $joueur->depJoueur = $request->input('depJoueur');
        $joueur->faculteJoueur = $request->input('faculteJoueur');
        $joueur->class = $request->input('class');
        $joueur->dateNais = $request->input('dateNais');
        $joueur->id_equipe = $request->input('id_equipe');
        return $joueur->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::delete("delete from joueurs where id_joueur=?",[$id]);
    }
}
