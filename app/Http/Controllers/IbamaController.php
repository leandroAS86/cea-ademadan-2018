<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Ibama;

class IbamaController extends Controller
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

    public function createIbama(Request $request){

        //$input = $request->all();
        $file = $request->file('report');
        $folder = 'ibamas';
        $upload = null;

        //dd($request);

        $validator = Validator::make($request->all(), [
                    'date' => 'required',
                    'title' => 'required',
                    'report' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt',
                ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

        if($request->hasFile('report')){
            $nameID = uniqid(date('HisYmd'));
            $extension = $file->extension();
            $nameFile = "{$nameID}.{$extension}";
     
            $upload = $file->storeAs($folder, $nameFile);
        }

         $presentation = Ibama::create([
                'date' => $request['date'],
                'title' => $request['title'],
                'report' => $upload,
            ]);
 

        return redirect()->back()->with('success', 'Relatório consolidado IBAMA criado');
    }

    public function showReport($id)
    {   
        $pathToFile = Ibama::where('id', $id)->value('report');
        return response()->file(storage_path().'/app/'.$pathToFile);
    }

    public function delete($id){
        
        $ibama = Ibama::where('id', $id)->first();  

        if(!is_null($ibama)){
            Storage::delete([$ibama->report]);
            $ibama->delete();
            return redirect()->back()->with('alert', 'Relatório consolidado(IBAMA) excluído');
        }

        return redirect()->back()->with('alert', 'Relatório consolidado(IBAMA) não encontrado');
    }
}
