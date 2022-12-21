<?php

namespace App\Http\Controllers;

use App\Models\Pencatatan;
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
        if (auth()->user()->id != $id){
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
                    'message' => 'Data admin berhasil dihapus',
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Anda tidak bisa menghapus data anda sendiri.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
}