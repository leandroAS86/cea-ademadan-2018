<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\UploadRequest;

use App\Release;
use App\Report;

class ReleaseController extends Controller
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
    public function index()
    {
        $release = Release::all();
        return view('release', ['releases' => $release]);
    }

    public function create(UploadRequest $request)
    {
        $input = $request->all();
        $file = $request->file('evidence');
        $folder = 'releases';
        $name = 'evidence';
        $evidence = null;
        $upload = null;

        if($request->hasFile('evidence')){
            $nameID = uniqid(date('HisYmd'));
            $extension = $file->extension();
            $nameFile = "{$nameID}.{$extension}";
     
            $upload = $file->storeAs($folder, $nameFile);

            //$upload = Report::upload($request, $folder, $name);
        }

        //if($upload->status === true){
         //   $evidence = $upload->upload;
        //}

        $release = Release::create([
            'theme' => $request['theme'],
            'media' => $request['media'],
            'link' => $request['link'],
            'date' => $request['date'], 
            'evidence' => $upload,
        ]);

        return redirect()
                        ->back()
                        ->with('alert', 'Release criado');
    }

     public function showRelease($id)
    {   
        //$basePath = '/var/www/CEA/storage/app/';
        $basePath = '/home/ademadan/www/ceaaprofundamento/storage/app/';
        $pathToFile = Release::where('id', $id)->value('evidence');
        return response()->file($basePath.$pathToFile);
    }
}
