<?php

namespace App\Http\Controllers;

use App\Models\Abstractsubmission;
use App\Models\Evaluation;
use App\Models\President;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Facades\View;

class EvaluationController extends Controller
{

    public function store(Request $request)
{
    // Validate the file
    $request->validate([
        'file' => 'nullable|mimes:doc,docx,pdf|max:2048', // Adjust the max file size as per your requirements
    ]);

    $evaluation = Evaluation::where('abstractsubmission_id', $request->abstractsubmission_id)->first();

    // Check if input type file name path exists
    $file = $request->hasFile('file') ? $request->file('file')->store('public/evaluations') : null;

    if ($evaluation && $evaluation->status == "Modify") {
        $evaluation->status = $request->status;
        $evaluation->comment = $request->comment;
        $evaluation->file = $file;
        $evaluation->save();

        // Check if this is the second evaluation with status "Modify"
        $previous_evaluations = Evaluation::where('abstractsubmission_id', $request->abstractsubmission_id)->where('status', 'Modify')->count();
        if ($previous_evaluations == 1) {
            // Set the modified column to 0 in the abstractsubmissions table
            Abstractsubmission::where('id', $request->abstractsubmission_id)->update(['modified' => 0]);
        }
    } elseif ($evaluation) {
        $evaluation->status = $request->status;
        $evaluation->comment = null;
        $evaluation->file = null;
        $evaluation->save();
    } else {
        Evaluation::create([
            'status' => $request->status,
            'comment' => $request->comment,
            'file' => $file,
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


    // public function store(Request $request)
    // {
    //     $evaluation = Evaluation::where('abstractsubmission_id', $request->abstractsubmission_id)->first();

    //     //check if input type file name path exist
    //     $file = $request->hasFile('file') ? $request->file('file')->store('public/evaluations') : null;
    //     // dd($file);

    //     if ($evaluation && $evaluation->status == "Modify") {
    //         $evaluation->status = $request->status;
    //         $evaluation->comment = $request->comment;
    //         $evaluation->file = $file;
    //         $evaluation->save();

    //         // check if this is the second evaluation with status "Modify"
    //         $previous_evaluations = Evaluation::where('abstractsubmission_id', $request->abstractsubmission_id)->where('status', 'Modify')->count();
    //         if ($previous_evaluations == 1) {
    //         // set the modified column to 0 in the abstractsubmissions table
    //             Abstractsubmission::where('id', $request->abstractsubmission_id)->update(['modified' => 0]);
    //         }
    //     }
    //     elseif ($evaluation){
    //         $evaluation->status = $request->status;
    //         $evaluation->comment = null;
    //         $evaluation->file = null;
    //         $evaluation->save();
    //     }
    //     else {
    //         Evaluation::create([
    //             'status' => $request->status,
    //             'comment' => $request->comment,
    //             'file' => $file,
    //             'abstractsubmission_id' => $request->abstractsubmission_id,
    //             'president_id' => Auth::user()->presidents->id
    //         ]);
    //     }

    //     $abstractsubmissions = Abstractsubmission::with([
    //         'topic',
    //     ])->paginate();

    //     $presidents = President::with('user')->get();

    //     return view('president.index', compact(['abstractsubmissions','presidents']));
    // }




    public function exportToWord(Request $request)
    {
        $abstractsubmission_id = $request->input('abstractsubmission_id');

        // Retrieve the Abstractsubmission model based on the provided abstractsubmission_id
        $abstractsubmission = Abstractsubmission::findOrFail($abstractsubmission_id);

        // Generate the HTML content from the Blade view
        $htmlContent = View::make('evaluation.abstractsubmissionevaluation', compact('abstractsubmission'))->render();

        // Set the base path for the HTML to avoid missing CSS or image files
        Settings::setTempDir(storage_path('app/public'));
        Settings::setOutputEscapingEnabled(true);

        // Create a new PhpWord instance
        $phpWord = new PhpWord();

        // Add a section
        $section = $phpWord->addSection();

        // Convert the HTML content to plain text and add it to the section
        $section->addText(strip_tags($htmlContent));

        // Save the Word document
        $filename = 'abstract.docx';
        $phpWord->save($filename, 'Word2007');

        return response()->download($filename)->deleteFileAfterSend(true);
    }


    // public function exportToWord(Request $request)
    // {
    //     $abstractsubmission_id = $request->input('abstractsubmission_id');

    //     // Retrieve the Abstractsubmission model based on the provided abstractsubmission_id
    //     $abstractsubmission = Abstractsubmission::findOrFail($abstractsubmission_id);

    //     // Generate the HTML content from the Blade view
    //     $htmlContent = View::make('evaluation.abstractsubmissionevaluation', compact('abstractsubmission'))->render();

    //     // Set the base path for the HTML to avoid missing CSS or image files
    //     Settings::setTempDir(storage_path('app/public'));
    //     Settings::setOutputEscapingEnabled(true);

    //     // Create a new PhpWord instance
    //     $phpWord = new PhpWord();

    //     // Add a section
    //     $section = $phpWord->addSection();

    //     // Convert the HTML content to plain text and add it to the section
    //     $section->addText(strip_tags($htmlContent));

    //     // Save the Word document
    //     $filename = 'abstract.docx';
    //     $phpWord->save($filename, 'Word2007');

    //     return response()->download($filename)->deleteFileAfterSend(true);
    // }


    // public function exportToWord(Request $request)
    // {
    //     $abstractsubmission_id = $request->input('abstractsubmission_id');

    //     // Retrieve the Abstractsubmission model based on the provided abstractsubmission_id
    //     $abstractsubmission = Abstractsubmission::findOrFail($abstractsubmission_id);

    //     $wordDocument = new PhpWord();

    //     // Generate your content here
    //     $htmlContent = view('evaluation.abstractsubmissionevaluation', compact('abstractsubmission'))->render();

    //     // Add the HTML content to the Word document
    //     $section = $wordDocument->addSection();
    //     $section->addHtml($htmlContent);

    //     // Save the Word document
    //     $filename = 'abstractFile.docx';
    //     $wordDocument->save($filename);

    //     return response()->download($filename)->deleteFileAfterSend(true);
    // }

}
