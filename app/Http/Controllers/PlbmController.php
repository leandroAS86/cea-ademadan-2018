<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Schedule;
use App\Presentation;
use App\PresentationGame;
use App\Game;
use App\Effort;
use App\Instructional;


class PlbmController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *  type 1 = genda
     *  type 0 = relatorio de reunioes
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null)
    {
       // $schedule = schedule::all();

        $presentation = DB::table('presentations')->leftJoin('schedules',  'presentations.schedule_id', '=', 'schedules.id')->get();

        $instructional = DB::table('instructionals')->leftJoin('schedules',  'instructionals.schedule_id', '=', 'schedules.id')->get();

        $presentationgame = DB::table('presentation_games')->leftJoin('schedules',  'presentation_games.schedule_id', '=', 'schedules.id')->get();

		$effort = DB::table('efforts')->leftJoin('schedules',  'efforts.schedule_id', '=', 'schedules.id')->get();

		$game = Game::all();

        return view('plbm', [
            'presentations' => $presentation,
            'instructionals' => $instructional,
            'presentationgames' => $presentationgame,
            'efforts' => $effort,
            'games' => $game,
            'type' => $type,
        ]);
    }
}
