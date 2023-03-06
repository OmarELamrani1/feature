<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Poster;
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
                $posters = Poster::with([
                    'personne',
                ])->paginate();

                return view('president.index', compact('posters'));
            }

            else if (Auth::user()->role == "Personne") {
                $personnes = auth()->user()->personnes;

                $evaluation = null;
                foreach ($personnes as $personne) {
                    $poster = $personne->poster;
                    if ($poster !== null) {
                        $evaluation = Evaluation::where('poster_id', $poster->id)->first();
                        if ($evaluation !== null) {
                            break;
                        }
                    }
                }

                return view('dashboard', compact('evaluation'));
            }
            
        }
        else {
            return view('accueil');
        }

    }
}
