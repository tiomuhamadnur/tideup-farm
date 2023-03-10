<?php

namespace App\Http\Controllers;

use App\Models\Pencatatan;
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
                'message' => 'Data investor berhasil dihapus',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
    }
}