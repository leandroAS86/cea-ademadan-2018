<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Schedule;
use App\Meeting;
use App\Presentation;
use App\PresentationGame;
use App\Game;
use App\Ibama;
use App\Effort;
use App\Instructional;

class ReportController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null)
    {
        $meeting = DB::table('meetings')->leftJoin('schedules', 'meetings.schedule_id', '=', 'schedules.id')->get();

        $audience = DB::table('audiences')->leftJoin('schedules', 'audiences.schedule_id', '=', 'schedules.id')->get();

        $presentation = DB::table('presentations')->leftJoin('schedules',  'presentations.schedule_id', '=', 'schedules.id')->get();

        $instructional = DB::table('instructionals')->leftJoin('schedules',  'instructionals.schedule_id', '=', 'schedules.id')->get();

        $presentationgame = DB::table('presentation_games')->leftJoin('schedules',  'presentation_games.schedule_id', '=', 'schedules.id')->get();

        $effort = DB::table('efforts')->leftJoin('schedules',  'efforts.schedule_id', '=', 'schedules.id')->get();

        $game = Game::all();

        $ibama = Ibama::all();

        return view('report', [
            'audiences' => $audience,
            'meetings' => $meeting,
            'presentations' => $presentation,
            'instructionals' => $instructional,
            'presentationgames' => $presentationgame,
            'efforts' => $effort,
            'games' => $game,
            'ibamas' => $ibama,
            'type' => $type,
        ]);
    }
}