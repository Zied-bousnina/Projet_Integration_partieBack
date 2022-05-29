<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\equipeController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\JoueurTournoiController;
use App\Http\Controllers\MatchAmicalController;
use App\Http\Controllers\matchs;
use App\Http\Controllers\MatchTournoiController;
use App\Http\Controllers\tournoiController;
use App\Models\Equipe;
use App\Models\matchTournoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Admin
Route::get('/admin/{email}/{password}',[adminController::class,'getAdminByEmailPAss']);
Route::patch('updateAdmin/{id}', [adminController::class, 'update']);
Route::delete('deleteAdmin/{id}', [adminController::class, 'destroy']);
Route::post('/createAdmin',[adminController::class,'store']);


//Match
Route::get('/match/match',[matchs::class,'AllMatch']);
Route::get('/match/matchbyID/{id}',[matchs::class,'show']);
Route::put('/match/updateMatch/{id}',[matchs::class,'update']);
Route::post('/match/createMatch',[matchs::class,'store']);
Route::delete('/match/match',[matchs::class,'destroy']);

//MatchAmical
Route::get('/matchAmical/match',[MatchAmicalController::class,'AllMatch']);
Route::get('/matchAmical/AllMatchByType/{type}',[MatchAmicalController::class,'AllMatchByType']);
Route::get('/matchAmical/matchbyID/{id}',[MatchAmicalController::class,'show']);
Route::post('/matchAmical/createMatch',[MatchAmicalController::class,'store']);
Route::put('/matchAmical/updateMatch/{id}',[MatchAmicalController::class,'update']);
Route::delete('/matchAmical/destroy/{id}',[MatchAmicalController::class,'destroy']);

//equipe
Route::get('/equipe/getAllequipe',[equipeController::class,'AllEquipe']);
Route::get('/equipe/getEquipeByID/{id}',[equipeController::class,'show']);
Route::put('/equipe/updateEquipe/{id}',[equipeController::class,'update']);
Route::post('/equipe/createEquipe',[equipeController::class,'store']);
Route::delete('/equipe/deleteEquipe',[equipeController::class,'destroy']);


//equipeTournoi
Route::get('/equipeTournoi/getAllequipe',[MatchTournoiController::class,'AllEquipe']);
Route::get('/equipeTournoi/getEquipeByID/{id}',[MatchTournoiController::class,'show']);
Route::get('/equipeTournoi/showByIdTournoi/{id}',[MatchTournoiController::class,'showByIdTournoi']);
Route::put('/equipeTournoi/updateEquipe/{id}',[MatchTournoiController::class,'update']);
Route::post('/equipeTournoi/createEquipe',[MatchTournoiController::class,'store']);
Route::delete('/equipeTournoi/deleteEquipe',[MatchTournoiController::class,'destroy']);

//joueur
Route::get('/joueur/getAllJoueur',[JoueurController::class,'getAllJoueur']);
Route::get('/joueur/countJoueur',[JoueurController::class,'countJoueur']);
Route::get('/joueur/getJoueurByID/{id}',[JoueurController::class,'show']);
Route::get('/joueur/getJoueurByIDEquipe/{id}',[JoueurController::class,'showIdEquipe']);
Route::put('/joueur/updateJoueur/{id}',[JoueurController::class,'update']);
Route::post('/joueur/createJoueur',[JoueurController::class,'store']);
Route::delete('/joueur/deleteJoueur',[JoueurController::class,'destroy']);

//joueurTournoi
Route::get('/joueurTournoi/getAllJoueur',[JoueurTournoiController::class,'getAllJoueur']);
Route::get('/joueurTournoi/count',[JoueurTournoiController::class,'count']);
Route::get('/joueurTournoi/getJoueurByID/{id}',[JoueurTournoiController::class,'show']);
Route::get('/joueurTournoi/getJoueurByIDEquipe/{id}',[JoueurTournoiController::class,'showIdEquipe']);
Route::put('/joueurTournoi/updateJoueur/{id}',[JoueurTournoiController::class,'update']);
Route::post('/joueurTournoi/createJoueur',[JoueurTournoiController::class,'store']);
Route::delete('/joueurTournoi/deleteJoueur',[JoueurTournoiController::class,'destroy']);

//tournoi
Route::get('/tournoi/getAllTournoi',[tournoiController::class,'AllTournoi']);
Route::get('/tournoi/getTournoiByID/{id}',[tournoiController::class,'show']);
Route::get('/tournoi/getTournoiByType/{id}',[tournoiController::class,'showByType']);
Route::get('/tournoi/getLastTournoi',[tournoiController::class,'showLast']);
Route::put('/tournoi/updateTournoi/{id}',[tournoiController::class,'update']);
Route::post('/tournoi/createTournoi',[tournoiController::class,'store']);
Route::delete('/tournoi/deleteTournoi',[tournoiController::class,'destroy']);
// showLast
// showByType
