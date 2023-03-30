<?php

namespace App\Http\Controllers;

use App\Models\President;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Get only deleted presidents
    public function onlyTrashed(){
        $presidents = User::onlyTrashed()->with('presidents')->paginate(5);
        return view('president.presidentOnlyTrashed', compact('presidents'));
    }

    // Restore presidents deleted
    public function restore($id){
        $presidents = User::onlyTrashed()->where('id', $id)->first();
        $presidents->restore();
        return redirect()->back();
    }

    // Delete presidents definitely
    public function forceDelete($id){
        $presidents = User::onlyTrashed()->where('id', $id)->first();
        $presidents->forceDelete();
        return redirect()->back();
    }

    // Add new president
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required', 'string', 'max:40',
            'prenom' => 'required', 'string', 'max:40',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:'.User::class,
            'password' => 'required', 'confirmed', Rules\Password::defaults(),
            'role' => 'string', 'max:9'
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "President",
        ]);

        if($user->isPresident())
        {
            President::create([
            'user_id' => $user->id,
            ]);
        }

        return redirect()->back();
    }

    // Delete president (SoftDelete)
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete($user->id);
        return redirect()->back();
    }
}
