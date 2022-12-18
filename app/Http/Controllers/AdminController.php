<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tittle = 'Dashboard';
        return view('admin.index', compact(['tittle']));
    }

    public function list_admin()
    {
        $tittle = 'Data Admin';
        $admin = User::where('role', 'admin')->get();
        return view('admin.list_admin.index', compact(['tittle', 'admin']));
    }

    public function catat_admin()
    {
        // 
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