<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CeaRelease;
use App\User;
use App\Role;

use Mail;

class CategoryController extends Controller
{
   	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$users = User::all();
        return view('category', ['users' => $users]);

    }

    public function atribuir(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if ($request['role_editor']) {
            $user->roles()->attach(Role::where('name', 'Editor')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }

        Mail::to($request['email'])->send(new CeaRelease($user));
        
        $string = 'Função de usuário ? atualizada. Um e-mail foi encaminhado para ? comunicando a atualização!';

        $st = str_replace_array('?', [$user->name, $user->name], $string);

        return redirect()->back()
            ->with('success', $st);
    }

    public function delete($id){
        $user = User::where('id', $id)->first();
        $user->roles()->detach();
        $user->delete();

        $string = 'Usuário ? excluído!';

        $st = str_replace_array('?', [$user->name], $string);

        return redirect()->back()
            ->with('alert', $st);
    }
}
