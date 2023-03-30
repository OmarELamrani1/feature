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
        $todo = Author::create($data);
        return response()->json([
            "message" => $todo
        ]);
    }

    public function store(){

    }

    public function show(Author $author)
    {
        //
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
