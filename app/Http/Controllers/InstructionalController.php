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
use App\Instructional;


class InstructionalController extends Controller
{
    /**
     * Update the ata for the meeting.
     *
     * @param  Request  $request
     * @return Response
     */    
    public function update(Request $request, $id = null)
    {
        $input = $request->all();
        $folder = 'instructionals';

        if (!empty($input))
        {
            $evidence = null;
            $validator = Validator::make($request->all(), [
                    'leadership' => 'required',
                ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            DB::table($folder)->where('schedule_id', $id)->update([
                    'leadership' => $input['leadership'],
                ]);

            if($request->hasFile('evidence'))
            {
                $upload = Report::upload($request, $folder, $id, 'evidence');
                if($upload->status === true){
                    $evidence = $upload->upload;
                    DB::table($folder)->where('schedule_id', $id)->update([
                        'evidence' => $evidence
                    ]);
                }
            }
           
            return redirect()
                    ->back()
                    ->with('success', 'Relatório de entrega de material instrucional atualizado');
        }else{
            return redirect()
            	->back()
                ->withErrors($input)
                ->withInput();
    	   }    
   }

   public function showEvidence($id)
    {   
        $pathToFile = Instructional::where('schedule_id', $id)->value('evidence');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }
}
