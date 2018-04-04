<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadRequest;
use App\Report;
use App\Schedule;
use App\Game;


class GameController extends Controller
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

   public function showGame($id)
    {   
        $pathToFile = Game::where('id', $id)->value('guide');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }
}
