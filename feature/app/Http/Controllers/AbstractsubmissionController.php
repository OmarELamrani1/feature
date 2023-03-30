<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbstractsubmissionRequest;
use App\Mail\PosterStored;
use App\Mail\PosterSuccess;
use App\Models\Abstractsubmission;
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
        $topics = Topic::all();

        return view('researchpaper', compact('topics'));
    }

    public function clinicalCase()
    {
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

        $abstractsubmissions = Abstractsubmission::create($data);
        $topics = Topic::all();


        // Send email to president for evaluation
        $president = User::where('role', 'President')->first();
        Mail::to($president->email)->send(new PosterStored($abstractsubmissions));

        // Send email to user for successfully submit
        Mail::to(Auth::user()->email)->send(new PosterSuccess($abstractsubmissions));

        return redirect()->back()->with('successAbstract', 'Abstract submitted successfully.');
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

        // $abstractsubmission = $request->validated();
        // $abstractsubmission['affirmation'] = $affirmation;
        // $abstractsubmission = Abstractsubmission::find($abstractsubmission->id)->update($request->validated());



        // $abstractsubmission = Abstractsubmission::find($abstractsubmission->id)->update($request->validated());
        // $abstractsubmission['affirmation'] = $affirmation;
        // $abstractsubmission->save();

        // Send email to president for evaluation
        $president = User::where('role', 'President')->first();
        Mail::to($president->email)->send(new PosterStored($abstractsubmission));

        // Send email to user for successfully submit
        Mail::to(Auth::user()->email)->send(new PosterSuccess($abstractsubmission));


        $personnes = auth()->user()->personnes;
        $abstractsubmissions = Abstractsubmission::where('personne_id', $personnes->id)->first();

        return view('dashboard', compact('abstractsubmissions'));

        // return view('dashboard');
    }

    public function destroy(Abstractsubmission $abstractsubmission)
    {
        Abstractsubmission::findOrFail($abstractsubmission->id)->delete();
        return redirect()->back()->with('deletedAbstract', 'Abstract deleted.');
    }

}
