<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuarios;

class LoginController extends Controller
{
    public function index(){
    	return view('login');
    }

    public function logar(Request $request, Usuarios $usuarios){
    	$this->validate($request, [
        	'nickname' => ['required', 'min:3'],
        	'password' => ['required', 'min:6']
    	]);

    	$user = Usuarios::where('nickname', $request->nickname)->first();

    	if(!empty($user) && decrypt($user->password) === $request->password){
    		$request->session()->put('login', $user->id);
    		return redirect('/');
    	}

    	return view('login', ['message' => 'Nickname e senha inválidos!']);
    }
}
