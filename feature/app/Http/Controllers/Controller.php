<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function check(){

        if (Auth::check()) {

            if (Auth::user()->role == "President") {
                return view('president.index');
            }

            else if (Auth::user()->role == "Personne") {
                $evaluation = Evaluation::first();
                return view('dashboard', compact('evaluation'));
            }
        }
        else {
            return view('accueil');
        }

    }
}
