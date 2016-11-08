<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuarios;

class RegistrarController extends Controller
{
    public function index(){
    	return view('registrar');
    }

    public function salvar(Request $request, Usuarios $usuarios){
    	 
    	$this->validate($request, [
        	'nickname' => ['required', 'min:3'],
        	'password' => ['required', 'confirmed', 'min:6']
    	]);

        $user = Usuarios::where('nickname', $request->nickname)->first();

        if(empty($user)){
            $usuarios->nickname = $request->nickname;
            $usuarios->password = encrypt($request->password);

            $usuarios->save();

            return redirect('login');
        }
            
        return view('registrar', ['message' => 'Nickname já está sendo utilizado!']);
    }
}
