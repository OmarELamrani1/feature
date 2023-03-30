<?php

namespace App\Http\Controllers;

use App\Models\Abstractsubmission;
use App\Models\Evaluation;
use App\Models\Poster;
use App\Models\President;
use App\Models\Topic;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


use Dompdf\Dompdf;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        return view('accueil');
    }

    // public function submissionprint($id){
    //     $abstractsubmission = Abstractsubmission::findOrFail($id);
    //     return view('print.submissionprint', compact('abstractsubmission'));
    // }

    public function generatePDF($id)
    {
        $abstractsubmission = Abstractsubmission::findOrFail($id);

        $pdf = Pdf::loadView('print.submissionprint', compact('abstractsubmission'));

        return $pdf->download('abstractsubmission.pdf');
    }

    public function check()
    {

        if (Auth::check()) {

            if (Auth::user()->role == "Admin") {
                $topics = Topic::paginate(5);
                $presidents = President::paginate(5);

                return view('admin.index', compact(['presidents', 'topics']));
            } else if (Auth::user()->role == "President") {

                $abstractsubmissions = Abstractsubmission::paginate();

                // $posters = Poster::with([
                //     'personne',
                // ])->paginate();

                return view('president.index', compact('abstractsubmissions'));
            } else if (Auth::user()->role == "Personne") {

                $personnes = auth()->user()->personnes;
                // dd($personnes->id);

                // $evaluation = null;
                // foreach ($personnes as $personne) {
                //     $poster = $personne->poster;
                //     if ($poster !== null) {
                //         $evaluation = Evaluation::where('poster_id', $poster->id)->first();
                //         if ($evaluation !== null) {
                //             break;
                //         }
                //     }
                // }

                $abstractsubmissions = Abstractsubmission::where('personne_id', $personnes->id)->first();

                return view('dashboard', compact('abstractsubmissions'));
            } else {
                abort(404);
            }
        }
    }
}
