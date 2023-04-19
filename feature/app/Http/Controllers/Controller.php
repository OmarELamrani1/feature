<?php

namespace App\Http\Controllers;

use App\Models\Abstractsubmission;
use App\Models\Evaluation;
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

    public function generatePDF($id)
    {
        $abstractsubmission = Abstractsubmission::findOrFail($id);

        $pdf = PDF::loadView('print.submissionprint', compact('abstractsubmission'));

        return $pdf->stream('abstractsubmission.pdf');
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
                $presidents = President::with('user')->get();

                return view('president.index', compact(['abstractsubmissions','presidents']));

            } else if (Auth::user()->role == "Personne") {

                $personnes = auth()->user()->personnes;

                $abstractsubmissions = Abstractsubmission::where('personne_id', $personnes->id)->get();

                $hasSubmittedAbstract = false;
                if (auth()->user()->personnes != null) {
                    $hasSubmittedAbstract = auth()->user()->personnes->abstractsubmission !== null;
                }

                if (auth()->user()->personnes != null) {
                    $hasSubmittedAbstract = auth()->user()->personnes->abstractsubmission;
                }

                $researchPaperCount = 0;
                $clinicalCaseCount = 0;

                if (auth()->user()->personnes->abstractsubmission) {
                    foreach (auth()->user()->personnes->abstractsubmission as $abstract) {
                        if ($abstract->type == 'Research Paper') {
                            $researchPaperCount++;
                        } elseif ($abstract->type == 'Clinical Case') {
                            $clinicalCaseCount++;
                        }
                    }
                }

                return view('dashboard', compact(['abstractsubmissions','researchPaperCount','clinicalCaseCount']));
            } else {
                abort(404);
            }
        }
    }
}
