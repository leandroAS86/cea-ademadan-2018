<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\Documentary;

use View;

class DocumentaryController extends Controller
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
        $video = Documentary::all();
       
	    return View::make('documentary')
	       ->with('videos', $video);
    }

   
    public function create(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
    			->back()
                ->withErrors($validator)
                ->withInput();
        }

        $release = Documentary::create([
            'title' => $request['title'],
            'link' => $request['link'],
            'description' => $request['description'],
        ]);

        return redirect()
            ->back()
            ->with('success', 'Documentário adicionado');
    }

	public function deleteDocumentary(Request $data){
		//dd($data);
        
        $documentary = Documentary::where('title', $data->title)->first();

        if(!is_null($documentary)){
            $documentary->delete();
            return redirect()->back()->with('success', 'Documentário excluído');
        }else
        	return redirect()->back()->with('alert', 'Selecione um documentário para excluir');

        
    }
}
