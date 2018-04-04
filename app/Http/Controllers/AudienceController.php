<?php

namespace App\Http\Controllers;

use App\Report;
use App\Schedule;
use App\Audience;
use App\VideoStream;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UploadRequest;


class AudienceController extends Controller
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
     * Update the ata for the meeting.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $id = null)
    {
        $input = $request->file();
        $folder = 'audiences';

        if (!empty($input))
        {  
            $attendance = null;
            $video = null;
            $evidence = null;

            if($request->hasFile('attendance')){
            $upload = Report::upload($request, $folder, $id, 'attendance');
                if($upload->status === true){
                    $attendance = $upload->upload;
                    DB::table($folder)->where('schedule_id', $id)->update(['attendance' => $attendance]);
                }
            }

            if($request->hasFile('evidence')){
                $upload = Report::upload($request, $folder, $id, 'evidence');
                if($upload->status === true){
                    $evidence = $upload->upload;
                    DB::table($folder)->where('schedule_id', $id)->update(['evidence' => $evidence]);
                }
            }

            if($request->hasFile('video')){
                $upload = Report::upload($request, $folder, $id, 'video');
                if($upload->status === true){
                    $video = $upload->upload;
                    DB::table($folder)->where('schedule_id', $id)->update(['video' => $video]);
                }
            }

            DB::table($folder)->where('schedule_id', $id)->update(['justification' => $request['justification']]);

            return redirect()
                    ->back()
                    ->with('success', 'Relatório de reuniaão pública atualizado');
        }else{
            $input = $request->all();
            if (!empty($input['justification']))
            {
                DB::table($folder)->where('schedule_id', $id)->update(['justification' => $input['justification']]);
                return redirect()
                    ->back()
                    ->with('success', 'Justificativa de reunião publica atualizada');  
            }
            return redirect()
                ->back()
                ->with('alert', 'Selecione um arquivo para enviar');
        } 
            
   }

   public function showAttendance($id)
    {   
        $pathToFile = Audience::where('schedule_id', $id)->value('attendance');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }

    public function showEvidence($id)
    {   
        //$basePath = '/var/www/CEA/storage/app/';
        //$basePath = '/home/ademadan/www/ceaaprofundamento/storage/app/';
        $pathToFile = Audience::where('schedule_id', $id)->value('evidence');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }

    public function showVideo($id)
    {  
        $pathToFile = Audience::where('schedule_id', $id)->value('video');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }

        /*
        //dd($video);

        return View::make('video.video')
        ->with('title', 'Videos')
        ->with('videos', $pathToFile);

       
        //return response()->file(storage_path().'/app/'.$pathToFile);
    }
        
        /*if (file_exists($basePath.$pathToFile)) {
            $stream = new VideoStream($basePath.$pathToFile);
        
            return response()->stream(function() use ($stream) {
                $stream->start();
            });
        }*/
        //return response("File doesn't exists", 404);
}
