<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{

    public function store(Request $request)
    {
        Evaluation::updateOrCreate([
            'status' => $request->status,
            'poster_id' => $request->poster_id,
            'president_id' => Auth::user()->presidents->id
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Evaluation $evaluation)
    {
        Evaluation::findOrFail($evaluation->id)->update([
            'status' => $request->status,
            'poster_id' => $request->poster_id,
            'president_id' => Auth::user()->presidents->id
        ]);

        return redirect()->back();
    }

}
