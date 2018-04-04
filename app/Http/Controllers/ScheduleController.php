<?php

namespace App\Http\Controllers;

use App\Game;
use App\Report;
use App\Effort;
use App\Meeting;
use App\Schedule;
use App\Audience;
use App\Presentation;
use App\Instructional;
use App\PresentationGame;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UploadRequest;

class ScheduleController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($type = null){

    	$meeting = DB::table('meetings')->leftJoin('schedules', 'meetings.schedule_id', '=', 'schedules.id')->get();

        $audience = DB::table('audiences')->leftJoin('schedules', 'audiences.schedule_id', '=', 'schedules.id')->get();

        $effort = DB::table('efforts')->leftJoin('schedules',  'efforts.schedule_id', '=', 'schedules.id')->get();

        $presentation = DB::table('presentations')->leftJoin('schedules',  'presentations.schedule_id', '=', 'schedules.id')->get();

        $presentationgame = DB::table('presentation_games')->leftJoin('schedules',  'presentation_games.schedule_id', '=', 'schedules.id')->get();

        $instructional = DB::table('instructionals')->leftJoin('schedules',  'instructionals.schedule_id', '=', 'schedules.id')->get();

        //ibama = Ibama::all();

        $game = Game::all();

        return view('schedule', [
            'presentationgames' => $presentationgame,
            'instructionals' => $instructional,
            'presentations' => $presentation,
            'audiences' => $audience,
            'meetings' => $meeting,
            'efforts' => $effort,
            'games' => $game,
            'type' => $type,
        ]);
    }

    private function createSchedule($data){
        $schedule = Schedule::create([
            'place' => $data['place'],
            'date' => $data['date'],
            'hour' => $data['hour'],
        ]);
        return $schedule;

    }

    public function createAudience(UploadRequest $data){

    	$schedule = $this->createSchedule($data);

        $audiences = Audience::create([
        	'schedule_id' => $schedule->id,
            'name' => $data['name']
        ]);

        return redirect()->back()->with('success', 'Reunião Pública adicionado');
    }

    public function createMeeting(UploadRequest $data){

        $schedule = $this->createSchedule($data);

        $meeting = Meeting::create([
        	'schedule_id' => $schedule->id,
        ]);

        return redirect()->back()->with('success', 'Reunião de Avaliação adicionado');
    }

     public function createEffort(UploadRequest $data){

        $schedule = $this->createSchedule($data);

        $meeting = Effort::create([
            'schedule_id' => $schedule->id,
        ]);

        return redirect()->back()->with('success', 'Evento de multirão adicionado');
    }

    public function createPresentation(UploadRequest $data){

        $schedule = $this->createSchedule($data);
        
        $presentation = Presentation::create([
            'schedule_id' => $schedule->id,
            'name' => $data['name'],
        ]);

        return redirect()->back()->with('success', 'Evento de apresentação de conteúdos específicos adicionado');
    }

        public function createInstructional(UploadRequest $data){

        $schedule = $this->createSchedule($data);
        
        $instrucional = Instructional::create([
            'schedule_id' => $schedule->id,
            'name' => $data['name'],
        ]);

        return redirect()->back()->with('success', 'Evento de entrega de material instrucional adicionado');
    }

    public function createPresentationGame(UploadRequest $data){

        $schedule = $this->createSchedule($data);

        $presentation = PresentationGame::create([
            'schedule_id' => $schedule->id,
            'name' => $data['name'],
        ]);

        return redirect()->back()->with('success', 'Evento de apresentação do jogo adicionado');
    }

    public function createGame(Request $request){

        $input = $request->all();
        $file = $request->file('guide');
        $folder = 'game';

        if($request->hasFile('guide')){
            $nameID = uniqid(date('HisYmd'));
            $extension = $file->extension();
            $nameFile = "{$nameID}.{$extension}";
     
            $upload = $file->storeAs($folder, $nameFile);
        }

         $presentation = Game::create([
                'guide' => $upload,
                'link' => $request['link'],
            ]);
 

        return redirect()->back()->with('success', 'Relatório de jogo criado');
    }

    public function deleteSchedule($id){
        
        $game = Game::where('id', $id)->first();
        $schedule = Schedule::where('schedule_id', $id);
        $meeting = Meeting::where('schedule_id', $id)->first();
        $audience = Audience::where('schedule_id', $id)->first();
        $effort = Effort::where('schedule_id', $id)->first();
        $presentation = Presentation::where('schedule_id', $id)->first();
        $instructional = Instructional::where('schedule_id', $id)->first(); 
        $presentationgame = PresentationGame::where('schedule_id', $id)->first(); 

        if(!is_null($meeting)){
            Storage::delete([$meeting->ata, $meeting->report]);
            $meeting->delete();
        }

        if(!is_null($audience)){
            Storage::delete([$audience->attendence, $audience->evidence, $audience->video]);   
            $audience->delete();
        }

        if(!is_null($effort)){
            Storage::delete([$effort->attendance, $effort->evidence, $effort->report]);
            $effort->delete();
        }

        if(!is_null($presentation)){
            Storage::delete([$presentation->attendance, $presentation->evidence, $presentation->report]);
            $presentation->delete();
        }

        if(!is_null($instructional)){
            Storage::delete([$instructional->evidence]);
            $instructional->delete();
        } 

        if(!is_null($presentationgame)){
            Storage::delete([$presentationgame->attendance, $presentationgame->evidence, $presentationgame->report]);
            $presentationgame->delete();
        }   

        if(!is_null($game)){
            Storage::delete([$game->guide]);
            $game->delete();
            return redirect()->back()->with('alert', 'Relatorio de jogo excluído');
        }

        $schedule = Schedule::where('id', $id)->delete();
         

        return redirect()->back()->with('alert', 'Evento excluído');
    }

}
