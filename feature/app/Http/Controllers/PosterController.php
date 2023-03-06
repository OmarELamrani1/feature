<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosterRequest;
use App\Mail\PosterStored;
use App\Mail\PosterSuccess;
use App\Models\Evaluation;
use App\Models\Poster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PosterController extends Controller
{

    public function store(PosterRequest $request)
    {
        //check if input type file name path exist
        $path = $request->hasFile('path') ? $request->file('path')->store('public/posters') : null;


        // Retrieve the Personne connected
        $personne = auth()->user()->personnes()->first();

        // Create new Poster
        $poster = new Poster($request->validated());
        $poster->path = $path;
        $poster->tracking_code = random_int(100000, 999999);

        // Set the personne_id to the ID of the current Personne connected
        $poster->personne_id = $personne->id;
        $poster->save();

        // Generate a URL for the image
        $url = Storage::url($path);
        $image_url = config('app.url') . $url;

        // Send email to president for evaluation
        $president = User::where('role', 'President')->first();
        Mail::to($president->email)->send(new PosterStored($poster, $image_url));

        // Send email to user for successfully submit
        Mail::to(Auth::user()->email)->send(new PosterSuccess($poster));

        return redirect()->route('posters.show', $poster->id);
    }

    public function show(Poster $poster)
    {
        $poster = Poster::findOrFail($poster->id);
        return view('posters.index', compact('poster'));
    }

    public function update(PosterRequest $request, Poster $poster)
    {
        //check if input type file name path exist
        $path = $request->hasFile('path') ? $request->file('path')->store('public/posters') : null;

        // if user has a image
        if ($poster->path) {

        //delete old image
        Storage::delete($poster->path);

        //update the current image with the new image
        $poster->path = $path;
    }

        Poster::find($poster->id)->update($request->validated());
        $poster->save();

        // Evaluation::where('poster_id', $poster->id)->delete();

        // Generate a URL for the image
        $url = Storage::url($path);
        $image_url = config('app.url') . $url;

        // Send email to president for evaluation
        $president = User::where('role', 'President')->first();
        Mail::to($president->email)->send(new PosterStored($poster, $image_url));

        // Send email to user for successfully submit
        Mail::to(Auth::user()->email)->send(new PosterSuccess($poster));

        return view('dashboard');
    }

    public function destroy(Poster $poster)
    {
        dd($poster->id);
    }
}
