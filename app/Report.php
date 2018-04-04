<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class Report extends Model
{
    public static function upload(Request $request, $folder, $id, $name)
    {
    	//dd($request->name);
        $file = $request->file($name);
        $input = $request->all();
        //dd($input);

        $callbackObj = new \stdClass;
		$callbackObj->status=false;
		$callbackObj->upload=null;
        $callbackObj->message=array();
		$callbackObj->errors=array();
    	$nameFile = null;


        //if ($request->hasFile($files[0]) && $request->file('ata')->isValid()) {
        if(!empty($file))
        {
            //foreach ($files as $file) {
            $nameID = uniqid(date('HisYmd'));
            $extension = $file->extension();
            $nameFile = "{$nameID}.{$extension}";
     
            $upload = $file->storeAs($folder, $nameFile);
            
            if ( !$upload )
            {
            	array_push($callbackObj->errors, ['error', 'Falha ao enviar arquivo!']);
            	return $callbackObj;
			}
			$callbackObj->upload = $upload;
            //}

            $file_delete = DB::table($folder)->where('schedule_id', $id)->value($name);
            //dd($file_delete);
            
            Storage::delete($file_delete); // true ou false

			$callbackObj->status = true;
			return $callbackObj;
		}
        else{
            array_push($callbackObj->errors, ['error', 'Selecione um arquivo!']);
            return $callbackObj;
        }
	}
}
