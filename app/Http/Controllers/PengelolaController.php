<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PengelolaController extends Controller
{
    public function index()
    {
        $tittle = "Data Pengelola";
        $pengelola = User::where('role', 'pengelola')->get();
        return view('admin.pengelola.index', compact(['tittle', 'pengelola']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}