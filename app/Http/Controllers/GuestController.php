<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $tittle = "Data Guest";
        $guest = User::where('role', 'guest')->get();
        return view('admin.guest.index', compact(['tittle', 'guest']));
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

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => ['required'],
            'role' => ['required'],
        ]);
        $user = User::findOrFail($request->id);
        $user->update([
            'role' => $request->role,
        ]);
        return redirect('/'. $request->role)->with([
            'alert-type' => 'success',
            'message' => 'Role user berhasil diubah'
        ]);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Data guest berhasil dihapus',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}