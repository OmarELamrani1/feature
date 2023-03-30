<?php

namespace App\Http\Controllers;

use App\Models\Abstractsubmission;
use App\Models\Poster;
use App\Models\President;
use Illuminate\Http\Request;

class PresidentController extends Controller
{

    public function index()
    {
        return view('president.index');
    }

    public function getPoster(Request $request, $id){
        $poster = Poster::findOrFail($id);
        return view('evaluation.index', compact(['poster','request']));
    }

    public function deletePoster($id){
        $poster = Poster::findOrFail($id);
        $poster->delete();

        return redirect()->back();
    }

    public function getAbstract(Request $request, $id){
        $abstractsubmission = Abstractsubmission::findOrFail($id);
        return view('evaluation.abstractsubmissionevaluation', compact(['abstractsubmission','request']));
    }

    public function deleteAbstract($id){

        Abstractsubmission::findOrFail($id)->delete();
        return redirect()->back()->with('deletedAbstract', 'Abstract deleted.');

        // $poster = Abstractsubmission::findOrFail($id);
        // $poster->delete();

        // return redirect()->back();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(President $president)
    {
        //
    }

    public function edit(President $president)
    {
        //
    }

    public function update(Request $request, President $president)
    {
        //
    }

    public function destroy(President $president)
    {
        //
    }
}
