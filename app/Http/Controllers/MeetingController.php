<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Report;
use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadRequest;

class MeetingController extends Controller
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
        if (!empty($input))
        {
            $input = $request->all();
            $folder = 'meetings';
            $ata = null;
            $report = null;

            if($request->hasFile('ata')){
                $upload = Report::upload($request, $folder, $id, 'ata');
                if($upload->status === true){
                    $ata = $upload->upload;
                    DB::table($folder)->where('schedule_id', $id)->update(['ata' => $ata]);
                }
            }

            if($request->hasFile('report')){
                $upload = Report::upload($request, $folder, $id, 'report');
                if($upload->status === true){
                    $report = $upload->upload;
                    DB::table($folder)->where('schedule_id', $id)->update(['report' => $report]);
                }
            }

            return redirect()
                        ->back()
                        ->with('success', 'Relatório de reunião de avaliação atualizado');
            }
            else 
                return redirect()
                        ->back()
                        ->with('alert', 'Selecione um arquivo para enviar');
    }

    public function showAta($id)
    {   
        $pathToFile = Meeting::where('schedule_id', $id)->value('ata');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }

    public function showReport($id)
    {   
        $pathToFile = Meeting::where('schedule_id', $id)->value('report');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }
}
