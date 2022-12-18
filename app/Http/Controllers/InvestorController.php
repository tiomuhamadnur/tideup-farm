<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index()
    {
        $tittle = 'Data Investor';
        $investor = User::where('role', 'investor')->get();
        return view('admin.investor.index', compact(['tittle', 'investor']));
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