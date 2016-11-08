<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Enquetes;
use App\Helper\Pontuacao;

class EnqueteController extends Controller
{
	private $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

    public function index(){
    	if($this->request->session()->get('login')){
    		return view('enquete', ['logado' => 1]);
    	}

    	return redirect('/login');
    }

    public function criar(Enquetes $enquetes){

    	$this->validate($this->request, [
        	'pergunta' => ['required'],
        	'quantidade_respostas' => ['required'],
        	'resposta' => ['required']
    	]);

    	$enquetes->id_usuario = $this->request->session()->get('login');
    	$enquetes->pergunta = $this->request->pergunta;
    	$enquetes->quantidade_respostas = $this->request->quantidade_respostas;
    	$enquetes->resposta1 = !empty($this->request->resposta[0]) ? $this->request->resposta[0] : null;
    	$enquetes->resposta2 = !empty($this->request->resposta[1]) ? $this->request->resposta[1] : null;
    	$enquetes->resposta3 = !empty($this->request->resposta[2]) ? $this->request->resposta[2] : null;
    	$enquetes->resposta4 = !empty($this->request->resposta[3]) ? $this->request->resposta[3] : null;
    	$enquetes->resposta5 = !empty($this->request->resposta[4]) ? $this->request->resposta[4] : null;
    	$enquetes->resposta6 = !empty($this->request->resposta[5]) ? $this->request->resposta[5] : null;

    	$enquetes->save();

    	return redirect('/');
    }

    public function visualizar(){
        if(empty($this->request->session()->get('login'))){
            return redirect('/login');
        }

        $enquetes = Enquetes::where('id_usuario', '=', $this->request->session()->get('login'))
        ->where('status', '=', 1)
        ->limit(10)
        ->get();

        $enquetes = Pontuacao::calcular($enquetes);

        if($enquetes->isEmpty()){
            return view('visualizar-enquetes', ['logado' => 1]);   
        }

        return view('visualizar-enquetes', ['enquetes' => $enquetes, 'logado' => 1]);
    }

    public function encerrar(){
        $this->validate($this->request,[
            'id_enquete' => ['required']
        ]);

        Enquetes::where('id', '=', $this->request->id_enquete)->update(['status' => 0]);

        return redirect('/visualizar-enquetes');
    }
}
