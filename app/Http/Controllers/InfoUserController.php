<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        return view('laravel-examples/user-profile');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
        ]);

        User::where('id', Auth::user()->id)
            ->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'location'  => $request->location,
                'about_me'  => $request->about_me,
                'departement'  => $request->departement,
                'nik'       => $request->nik,
                'section'   => $request->section,
            ]);


        return redirect('/user-profile')->with('success', 'Profile updated successfully');
    }
}