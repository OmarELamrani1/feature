<?php

namespace App\Http\Controllers;

use App\Models\Abstractsubmission;
use App\Models\President;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresidentController extends Controller
{

    public function index()
    {
        $abstractsubmissions = Abstractsubmission::paginate();
        $presidents = President::with('user')->get();

        return view('president.index', compact(['abstractsubmissions','presidents']));
    }

    public function getAbstract(Request $request, $id){
        $abstractsubmission = Abstractsubmission::where('president_id', Auth::user()->presidents->id)->findOrFail($id)->first();
        return view('evaluation.abstractsubmissionevaluation', compact(['abstractsubmission','request']));
    }

    public function deleteAbstract($id){
        Abstractsubmission::findOrFail($id)->delete();
        return redirect()->back()->with('deletedAbstract', 'Abstract deleted.');
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
