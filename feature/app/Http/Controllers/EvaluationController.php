<?php

namespace App\Http\Controllers;

use App\Models\Abstractsubmission;
use App\Models\Evaluation;
use App\Models\President;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{

    public function store(Request $request)
    {
        $evaluation = Evaluation::where('abstractsubmission_id', $request->abstractsubmission_id)->first();

        if ($evaluation && $evaluation->status == "Modify") {
            $evaluation->status = $request->status;
            $evaluation->comment = $request->comment;
            $evaluation->save();

            // check if this is the second evaluation with status "Modify"
            $previous_evaluations = Evaluation::where('abstractsubmission_id', $request->abstractsubmission_id)->where('status', 'Modify')->count();
            if ($previous_evaluations == 1) {
            // set the modified column to 0 in the abstractsubmissions table
                Abstractsubmission::where('id', $request->abstractsubmission_id)->update(['modified' => 0]);
            }
        }
        elseif ($evaluation){
            $evaluation->status = $request->status;
            $evaluation->comment = null;
            $evaluation->save();
        }
        else {
            Evaluation::create([
                'status' => $request->status,
                'comment' => $request->comment,
                'abstractsubmission_id' => $request->abstractsubmission_id,
                'president_id' => Auth::user()->presidents->id
            ]);
        }

        $abstractsubmissions = Abstractsubmission::with([
            'topic',
        ])->paginate();

        $presidents = President::with('user')->get();

        return view('president.index', compact(['abstractsubmissions','presidents']));
    }
    
}
