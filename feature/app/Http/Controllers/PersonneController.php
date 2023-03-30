<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Personne;
use App\Models\Topic;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function checkStatus(){
        $user = auth()->user();
        $abstractsubmission = $user->personnes->abstractsubmission;

        $checkStatus = null;
        if ($abstractsubmission !== null) {
            $checkStatus = Evaluation::where('abstractsubmission_id', $abstractsubmission->id)->first();
        }

        $topics = Topic::get();
        return view('checkStatus', compact(['checkStatus','topics']));
    }


    // public function checkStatus(){
    //     $personnes = auth()->user()->personnes;

    //     $checkStatus = null;
    //     foreach ($personnes as $personne) {
    //         $abstractsubmission = $personne->abstractsubmission;
    //         if ($abstractsubmission !== null) {
    //             $checkStatus = Evaluation::where('abstractsubmission_id', $abstractsubmission->id)->first();
    //             if ($checkStatus !== null) {
    //                 break;
    //             }
    //         }
    //     }

    //     return view('checkStatus', compact('checkStatus'));
    // }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        //
    }
}
