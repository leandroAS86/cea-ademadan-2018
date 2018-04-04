<?php

namespace App\Http\Controllers;

use View;

use App\Report;
use App\Schedule;
use App\Audience;
use App\VideoStream;
use App\Documentary;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UploadRequest;

class VideosController extends Controller
{
	public $restful = true;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function get_video($id)
	{
	    $pathToFile = Documentary::where('id', $id)->value('link');
        $video = storage_path().'/app/'.$pathToFile;

       //dd($video);

	    return View::make('documentary')
	       ->with('title', 'Documentário')
	       ->with('videos', $video);
	}
}