<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Number;

class NumbersController extends Controller
{

    public function index()
    {
        $stroka = null;
        $n = [];
        $d = [];
        $d_minus = [];

        $tablica = Number::orderBy('D_max')->get(['id', 'D_plus', 'D_minus', 'D_max']);

        if (isset($tablica->first()->id)){
            $stroka = Number::find($tablica->first()->id);
        }

        if(isset($stroka)){
            $n = json_decode($stroka->n_100, true);
            $d = json_decode($stroka->d_100, true);
            $d_minus = json_decode($stroka->d_minus_100, true);
        }

        return view('pages.numbers', ['numbers'=>$stroka, 'n'=>$n, 'd'=>$d, 'd_minus'=>$d_minus, 'D_max'=>$tablica]);
    }

    public function id($id)
    {
        $n = [];
        $d = [];
        $d_minus = [];

        $tablica = Number::orderBy('D_max')->get(['id', 'D_plus', 'D_minus', 'D_max']);
        $stroka = Number::find($id);
        if(isset($stroka)){
            $n = json_decode($stroka->n_100, true);
            $d = json_decode($stroka->d_100, true);
            $d_minus = json_decode($stroka->d_minus_100, true);
        }
        return view('pages.numbers', ['numbers'=>$stroka, 'n'=>$n, 'd'=>$d, 'd_minus'=>$d_minus, 'D_max'=>$tablica]);
    }

    public function calculate(Request $request)
    {
        Number::truncate();
        for ($j=0; $j < $request->n2; $j++) { 
            $n = [];
            for ($i=0; $i < $request->n1; $i++) { 
                $n[$i] = rand(0, 100000) / 100000.0;
            }
            sort($n);
            $json_n = json_encode($n, JSON_FORCE_OBJECT);

            $d_plus = Number::calc_D_N_Plus($n);
            $d_minus = Number::calc_D_N_Minus($n);

            $json_d = json_encode($d_plus);
            $json_d_minus = json_encode($d_minus);

            $new = Number::new(
                ['n_100'=>$json_n],
                ['random_n'=>$request->n1, 'D_N'=>$request->n2, 'd_100'=>$json_d, 'd_minus_100'=>$json_d_minus, 'D_plus'=>max($d_plus), 'D_minus'=>max($d_minus), 'D_max'=>max([max($d_plus), max($d_minus)])]
            );
            $new->save();
        }

        return redirect()->action([NumbersController::class,'index']);
        
    }
}
