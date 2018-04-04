<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ibama;
use App\Game;

class IbamaGamesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $ibama = Ibama::all();

        $game = Game::all();

        return view('ibama_game', [
        	'ibamas' => $ibama,
            'games' => $game,
        ]);
    }
}
