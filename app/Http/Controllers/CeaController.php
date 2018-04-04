<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Meeting;
use App\Schedule;
use App\Effort;
use App\Audience;
use App\Release;

class CeaController extends Controller
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

        $audience = DB::table('audiences')->leftJoin('schedules',  'audiences.schedule_id', '=', 'schedules.id')->get();

        $meeting = DB::table('meetings')->leftJoin('schedules',  'meetings.schedule_id', '=', 'schedules.id')->get();

        return view('cea', [
            'audiences' => $audience,
            'meetings' => $meeting,
            'type' => $type,
        ]);
    }
}