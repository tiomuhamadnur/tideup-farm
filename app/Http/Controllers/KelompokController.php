<?php

namespace App\Http\Controllers;

use App\Models\Investasi;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
    public function index()
    {
        $tittle = 'Data Kelompok Investasi';
        $kelompok = Kelompok::all();
        return view('admin.investasi_admin.kelompok.index', compact(['tittle', 'kelompok']));
    }

    public function create()
    {
        $tittle = 'Buat Data Kelompok Investasi';
        return view('admin.investasi_admin.kelompok.create', compact(['tittle']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:kelompok,name,except,id'],
        ]);

        Kelompok::create([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Data kelompok berhasil ditambahkan',
            'alert-type' => 'success'
        );
        return redirect('/admin-investasi')->with($notification);
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
        Kelompok::findOrFail($request->id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Data kelompok berhasil diperbaharui',
            'alert-type' => 'success'
        );
        return redirect('/admin-kelompok')->with($notification);
    }

    public function destroy($id)
    {
        $validate = Investasi::where('kelompok_id', $id)->get()->count();
        if($validate > 0){
            $notification = array(
                'message' => 'Data kelompok tidak bisa dihapus karena masuk ke data investasi',
                'alert-type' => 'error'
            );
            return redirect('/admin-kelompok')->with($notification);
        } else {
            Kelompok::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Data kelompok berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect('/admin-kelompok')->with($notification);
        }
    }
}