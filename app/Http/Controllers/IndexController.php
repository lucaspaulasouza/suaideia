<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Enquetes;
use App\Model\Respostas;
use App\Model\Usuarios;

class IndexController extends Controller
{
	private $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

    public function index(Enquetes $enquetes){
    	if($this->request->session()->get('login')){       
            $dados = DB::table('enquetes')
            ->select('enquetes.*')
            ->leftJoin('respostas', 'enquetes.id', '=', 'respostas.id_enquete')
            ->leftJoin('usuarios', 'enquetes.id_usuario', '=', 'usuarios.id')
            ->whereRaw('(respostas.id_usuario <> ? OR respostas.id_enquete IS NULL) AND enquetes.id_usuario <> ?', 
                array($this->request->session()->get('login'), $this->request->session()->get('login')))
            ->orderBy('usuarios.pontos', 'desc')
            ->paginate(5);

            if($dados->isEmpty()){
                return view('index', ['logado' => 1]);    
            }

    		return view('index', ['logado' => 1, 'enquetes' => $dados]);	
    	}

        $dados = DB::table('enquetes')
            ->select('enquetes.*')
            ->leftJoin('respostas', 'enquetes.id', '=', 'respostas.id_enquete')
            ->leftJoin('usuarios', 'enquetes.id_usuario', '=', 'usuarios.id')
            ->orderBy('usuarios.pontos', 'desc')
            ->paginate(3);
    	
    	return view('index', ['logado' => 0, 'enquetes' => $dados]);   
    }

    public function votar(Respostas $respostas){
         $this->validate($this->request, [
            'id_enquete' => ['required'],
            'resposta' => ['required'],
            'logado' => ['required']
        ]);
         
         $respostas->id_usuario = $this->request->session()->get('login');
         $respostas->id_enquete = $this->request->id_enquete;
         $respostas->resposta = $this->request->resposta;

         $respostas->save();

         $usuario = Usuarios::select('pontos')
         ->where('id', '=', $this->request->session()->get('login'))
         ->first(); 

         Usuarios::where('id', '=', $this->request->session()->get('login'))
         ->update(['pontos' => ++$usuario->pontos]);

         return redirect('/');

    }

    public function sair(){
    	$this->request->session()->forget('login');

    	return redirect('/');
    }
}
