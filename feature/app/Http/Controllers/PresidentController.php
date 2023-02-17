<?php

namespace App\Http\Controllers;

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
