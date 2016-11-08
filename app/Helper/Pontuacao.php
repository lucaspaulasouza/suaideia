<?php

namespace App\Helper;

use Illuminate\Support\Facades\DB;

class Pontuacao
{
    public static function calcular($enquetes){
    	foreach($enquetes as $enquete){
            $respostas = DB::table('respostas')
            ->select('resposta', DB::raw('COUNT(resposta) AS votos'))
            ->where('id_enquete', '=', $enquete->id)
            ->groupBy('resposta')
            ->get();

            $votos = DB::table('respostas')
            ->select(DB::raw('COUNT(id_enquete) AS total'))
            ->where('id_enquete', '=', $enquete->id)
            ->first();

            $enquete->total = $votos->total;

            foreach($respostas as $resposta){
                switch($resposta->resposta){
                    case 1:
                        $enquete->votosResposta1 = $resposta->votos;
                        $enquete->porcentagemResposta1 = (100 * $resposta->votos) / $enquete->total;
                        break;
                    case 2:
                        $enquete->votosResposta2 = $resposta->votos;
                        $enquete->porcentagemResposta2 = (100 * $resposta->votos) / $enquete->total;
                        break; 
                    case 3:
                        $enquete->votosResposta3 = $resposta->votos;
                        $enquete->porcentagemResposta3 = (100 * $resposta->votos) / $enquete->total;
                        break; 
                    case 4:
                        $enquete->votosResposta4 = $resposta->votos;
                        $enquete->porcentagemResposta4 = (100 * $resposta->votos) / $enquete->total;
                        break; 
                    case 5:
                        $enquete->votosResposta5 = $resposta->votos;
                        $enquete->porcentagemResposta5 = (100 * $resposta->votos) / $enquete->total;
                        break; 
                    case 6:
                        $enquete->votosResposta6 = $resposta->votos;
                        $enquete->porcentagemResposta6 = (100 * $resposta->votos) / $enquete->total;
                        break;                                                                                                    
                }
            }
        }

        return $enquetes;
    }
}
