<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function addAuthor(Request $request){

        $personne = auth()->user()->personnes()->first();

        $data = $request->validate([
            'firstname' => 'nullable|max:25',
            'lastname' => 'nullable|max:25',
            'email' => 'nullable|email',
            'adress' => 'nullable',
            'phone' => 'nullable',
            'departement' => 'nullable',
            'institution' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable'
        ]);

        $data['personne_id'] = $personne->id;

        $todo = Author::create($data);


        return response()->json([
            "message" => $todo
        ]);
    }

    public function searchAuthors(Request $request)
    {
        $lastname = $request->input('lastname');
        $authors = Author::where('lastname', 'like', "$lastname%")->get();

        return response()->json([
            'authors' => $authors,
        ]);
    }

    public function store(){

    }

    public function show($id){
        $author = Author::findOrFail($id);
        return response()->json([
            'author' => $author,
        ]);
    }

    public function edit(Author $author)
    {
        //
    }

    public function update(Request $request, Author $author)
    {
        //
    }

    public function destroy(Author $author)
    {
        //
    }
}
