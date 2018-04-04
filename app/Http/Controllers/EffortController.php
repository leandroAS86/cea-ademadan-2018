<?php

namespace App\Http\Controllers;

use App\Effort;
use App\Report;
use App\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;

class EffortController extends Controller
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
            //dd($request);
            $input = $request->all();
            $folder = 'efforts';
            $authoritie = null;
            $attendance = null;
            $report = null;
            $evidence = null;

            //$effort_id = DB::table('schedules')->where([
            //    ['id','=', $id],
            //])->first();
       
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

            if($request->hasFile('report')){
                $upload = Report::upload($request, $folder, $id, 'report');
                if($upload->status === true){
                    $report = $upload->upload;
                    DB::table($folder)->where('schedule_id', $id)->update(['report' => $report]);
                }
            }
            return redirect()
                    ->back()
                    ->with('success', 'Relatório de mutirão atualizado');
        }else 
            return redirect()
                ->back()
                ->with('alert', 'Selecione um arquivo para enviar');
   }

    public function showAttendance($id)
    {   
        $pathToFile = Effort::where('schedule_id', $id)->value('attendance');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }

    public function showEvidence($id)
    {   
        $pathToFile = Effort::where('schedule_id', $id)->value('evidence');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }

    public function showReport($id)
    {   
        $pathToFile = Effort::where('schedule_id', $id)->value('report');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }
}
