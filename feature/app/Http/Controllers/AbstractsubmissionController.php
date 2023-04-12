<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbstractsubmissionRequest;
use App\Mail\PosterStored;
use App\Mail\PosterSuccess;
use App\Models\Abstractsubmission;
use App\Models\Author;
use App\Models\AuthorAbstractsubmission;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AbstractsubmissionController extends Controller
{
    public function researchPaper()
    {
        $researchPaperCount = 0;

        if (auth()->user()->personnes->abstractsubmission) {
            foreach (auth()->user()->personnes->abstractsubmission as $abstract) {
                if ($abstract->type == 'Research Paper') {
                    $researchPaperCount++;
                }
            }
        }

        if ($researchPaperCount >= 3) {
            abort(404);
        }

        $topics = Topic::all();
        return view('researchpaper', compact('topics'));

    }

    public function clinicalCase()
    {
        $clinicalCaseCount = 0;

        if (auth()->user()->personnes->abstractsubmission) {
            foreach (auth()->user()->personnes->abstractsubmission as $abstract) {
                if ($abstract->type == 'Clinical Case') {
                    $clinicalCaseCount++;
                }
            }
        }

        if ($clinicalCaseCount >= 3) {
            abort(404);
        }

        $topics = Topic::all();
        return view('clinicalcase', compact('topics'));
    }

    public function index()
    {
        return view('submmision.preview');
    }

    public function create()
    {
        //
    }

    public function store(AbstractsubmissionRequest $request)
    {
        $personne = auth()->user()->personnes()->first();
        $affirmation = $request->has('affirmation') ? 1 : 0;

        $data = $request->validated();
        $data['affirmation'] = $affirmation;
        $data['tracking_code'] = random_int(100000, 999999);
        $data['personne_id'] = $personne->id;

        $abstractsubmission = Abstractsubmission::create($data);
        $abstractsubmission_id = $abstractsubmission->id;

        $author = Author::where('personne_id', $personne->id)->first();

        // Create AuthorAbstractSubmission with added author from scratch
        if ($author) {
            $author_abstractsubmission = new AuthorAbstractsubmission;
            $author_abstractsubmission->author_id = $author->id;
            $author_abstractsubmission->abstractsubmission_id = $abstractsubmission_id;
            $author_abstractsubmission->save();
        } elseif (empty($author)) {
        }

        // Create AuthorAbstractSubmission with choosen author in search
        if ($request->has('author_id')) {
            $author = Author::find($request->input('author_id'));
            if ($author) {
                $author_abstractsubmission = new AuthorAbstractsubmission;
                $author_abstractsubmission->author_id = $author->id;
                $author_abstractsubmission->abstractsubmission_id = $abstractsubmission_id;
                $author_abstractsubmission->save();
            } elseif (empty($author)) {
            }
        }

        // Send email to user for successfully submit
        Mail::to(Auth::user()->email)->send(new PosterSuccess($abstractsubmission));

        // Send email to president for evaluation
        $presidents = User::where('role', 'President')->get();
        foreach ($presidents as $president) {
            Mail::to($president->email)->send(new PosterStored($abstractsubmission));
        }

        return view('submmision.preview', compact('abstractsubmission'));
    }

    public function show(Abstractsubmission $abstractsubmission)
    {
        $abstractsubmission = Abstractsubmission::findOrFail($abstractsubmission->id);
        return view('submmision.preview', compact('abstractsubmission'));
    }

    public function edit(Abstractsubmission $abstractsubmission)
    {
        //
    }

    public function update(AbstractsubmissionRequest $request, Abstractsubmission $abstractsubmission)
    {

        $affirmation = $request->has('affirmation') ? 1 : 0;
        $abstractsubmission->update(array_merge($request->validated(), ['affirmation' => $affirmation]));

        $affirmation = $request->has('affirmation') ? 1 : 0;

        // Send email to user for successfully submit
        Mail::to(Auth::user()->email)->send(new PosterSuccess($abstractsubmission));

        // Send email to president for evaluation
        $presidents = User::where('role', 'President')->get();
        foreach ($presidents as $president) {
            Mail::to($president->email)->send(new PosterStored($abstractsubmission));
        }


        // $personnes = auth()->user()->personnes;
        // $abstractsubmissions = Abstractsubmission::where('personne_id', $personnes->id)->first();

        $abstractsubmission = Abstractsubmission::findOrFail($abstractsubmission->id);
        return view('submmision.preview', compact('abstractsubmission'));

    }

    public function destroy(Abstractsubmission $abstractsubmission)
    {
        Abstractsubmission::findOrFail($abstractsubmission->id)->delete();
        return redirect()->back()->with('deletedAbstract', 'Abstract deleted.');
    }

    // Get only deleted abstracts
    public function abstractsOnlyTrashed()
    {
        $abstractsubmissions = Abstractsubmission::onlyTrashed()->paginate();
        return view('submmision.abstracttrashed', compact('abstractsubmissions'));
    }

    // Restore abstract deleted
    public function abstractRestore($id)
    {
        $abstractsubmission = Abstractsubmission::onlyTrashed()->where('id', $id)->first();
        $abstractsubmission->restore();
        return redirect()->back();
    }

    // Delete abstract definitely
    public function abstractForceDelete($id)
    {
        $abstractsubmission = Abstractsubmission::onlyTrashed()->where('id', $id)->first();
        $abstractsubmission->forceDelete();
        return redirect()->back();
    }
}
