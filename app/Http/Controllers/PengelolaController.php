<?php

namespace App\Http\Controllers;

use App\Models\Pencatatan;
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
        $validasi = Pencatatan::where('id', $id)->count();
        if($validasi > 0){
            $notification = array(
                'message' => 'Data tidak bisa dihapus, sudah masuk dalam transaksi pencatatan.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        } else {
            User::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Data pengelola berhasil dihapus',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
    }
}