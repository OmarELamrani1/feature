<?php

namespace App\Http\Controllers;

use App\Models\Abstractsubmission;
use App\Models\Evaluation;
use App\Models\Personne;
use App\Models\Topic;
use Illuminate\Http\Request;

class PersonneController extends Controller
{

    public function index()
    {
        //
    }

    public function checkStatus($id){
        if(!Abstractsubmission::where('personne_id', auth()->user()->personnes->id)->first()){
            abort(404);
        }
        $checkStatus = Evaluation::where('abstractsubmission_id', $id)->first();

        $topics = Topic::get();
        return view('checkStatus', compact(['checkStatus','topics']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Personne $personne)
    {
        //
    }

    public function edit(Personne $personne)
    {
        //
    }

    public function update(Request $request, Personne $personne)
    {
        //
    }

    public function destroy(Personne $personne)
    {
        //
    }
}
