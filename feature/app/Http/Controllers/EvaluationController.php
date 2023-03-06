<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function store(Request $request)
    {
        $evaluation = Evaluation::where('poster_id', $request->poster_id)->first();
        if($evaluation){
            $evaluation->status = $request->status;
            $evaluation->save();
        }
        else{
            Evaluation::create([
                'status' => $request->status,
                'poster_id' => $request->poster_id,
                'president_id' => Auth::user()->presidents->id
            ]);
        }

        $posters = Poster::with([
            'personne',
        ])->paginate();

        return view('president.index', compact('posters'));
    }

}
