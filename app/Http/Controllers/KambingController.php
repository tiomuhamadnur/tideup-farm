<?php

namespace App\Http\Controllers;

use App\Models\Kambing;
use App\Models\Pencatatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KambingController extends Controller
{
    public function index()
    {
        $tittle = 'Data Kambing';
        $kambing = Kambing::all();
        $investor = User::where('role', 'investor')->get();
        return view('admin.kambing.index', compact(['tittle', 'kambing', 'investor']));
    }

    public function qrcode()
    {
        $tittle = "QR Code Kambing";
        $kambing = Kambing::all();
        return view('admin.kambing.qrcode', compact(['tittle', 'kambing']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $qr_code = Str::random(20);
        $tgl_beli = Carbon::parse($request->tgl_beli)->format('Y-m-d');
        $this->validate($request, [
            'name' => ['required', 'unique:kambing,name,except,id'],
            'user_id' => ['required'],
            'tgl_beli' => ['required'],
            'bobot_beli' => ['required', 'numeric'],
            'harga_beli' => ['required', 'numeric'],
            'foto_beli' => ['image', 'nullable'],
            'kwitansi_beli' => ['image', 'nullable'],
        ]);

        if (($request->hasFile('foto_beli') && $request->hasFile('kwitansi_beli')) && ($request->foto_beli != '' && $request->kwitansi_beli != '')) {
            $foto_beli = $request->file('foto_beli')->store('photo-kambing-beli');
            $kwitansi_beli = $request->file('kwitansi_beli')->store('photo-kwitansi-beli');
            Kambing::create([
                'name' => $request->name,
                'user_id' => $request->user_id,
                'qr_code' => $qr_code,
                'tgl_beli' => $tgl_beli,
                'bobot_beli' => $request->bobot_beli,
                'harga_beli' => $request->harga_beli,
                'status' => 'ongoing',
                'foto_beli' => $foto_beli,
                'kwitansi_beli' => $kwitansi_beli,
            ]);
            $notification = array(
                'message' => 'Data kambing berhasil dibuat',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        } else {
            Kambing::create([
                'name' => $request->name,
                'user_id' => $request->user_id,
                'qr_code' => $qr_code,
                'tgl_beli' => $tgl_beli,
                'bobot_beli' => $request->bobot_beli,
                'harga_beli' => $request->harga_beli,
                'status' => 'ongoing',
            ]);
            $notification = array(
                'message' => 'Data kambing berhasil dibuat',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($qr_code)
    {
        $tittle = "Ubah Data Kambing";
        $kambing = Kambing::where('qr_code', $qr_code)->first();
        return view('admin.kambing.edit', compact(['tittle', 'kambing']));
    }

    public function update(Request $request)
    {
        $tgl_beli = Carbon::parse($request->tgl_beli)->format('Y-m-d');
        $this->validate($request, [
            'name' => ['required'],
            'tgl_beli' => ['required'],
            'bobot_beli' => ['required', 'numeric'],
            'harga_beli' => ['required', 'numeric'],
            'foto_beli' => ['image', 'nullable'],
        ]);

        if ($request->hasFile('foto_beli') && $request->hasFile('kwitansi_beli')) {
            $foto_beli = $request->file('foto_beli')->store('photo-kambing-beli');
            $kwitansi_beli = $request->file('kwitansi_beli')->store('photo-kwitansi-beli');
            Kambing::find($request->id)->update([
                'name' => $request->name,
                'tgl_beli' => $tgl_beli,
                'bobot_beli' => $request->bobot_beli,
                'harga_beli' => $request->harga_beli,
                'foto_beli' => $foto_beli,
                'kwitansi_beli' => $kwitansi_beli,
            ]);
            $notification = array(
                'message' => 'Data kambing berhasil diperbaharui',
                'alert-type' => 'success'
            );
            return redirect('/kambing')->with($notification);
        }
        elseif($request->hasFile('foto_beli') && $request->kwitansi_beli != ''){
            $foto_beli = $request->file('foto_beli')->store('photo-kambing-beli');
            Kambing::find($request->id)->update([
                'name' => $request->name,
                'tgl_beli' => $tgl_beli,
                'bobot_beli' => $request->bobot_beli,
                'harga_beli' => $request->harga_beli,
                'foto_beli' => $foto_beli,
            ]);
            $notification = array(
                'message' => 'Data kambing berhasil diperbaharui',
                'alert-type' => 'success'
            );
            return redirect('/kambing')->with($notification);
        }
        elseif($request->hasFile('kwitansi_beli') && $request->foto_beli != ''){
            $kwitansi_beli = $request->file('kwitansi_beli')->store('photo-kwitansi-beli');
            Kambing::find($request->id)->update([
                'name' => $request->name,
                'tgl_beli' => $tgl_beli,
                'bobot_beli' => $request->bobot_beli,
                'harga_beli' => $request->harga_beli,
                'kwitansi_beli' => $kwitansi_beli,
            ]);
            $notification = array(
                'message' => 'Data kambing berhasil diperbaharui',
                'alert-type' => 'success'
            );
            return redirect('/kambing')->with($notification);
        }
        else {
            Kambing::find($request->id)->update([
                'name' => $request->name,
                'tgl_beli' => $tgl_beli,
                'bobot_beli' => $request->bobot_beli,
                'harga_beli' => $request->harga_beli,
            ]);
            $notification = array(
                'message' => 'Data kambing berhasil diperbaharui',
                'alert-type' => 'success'
            );
            return redirect('/kambing')->with($notification);
        }

    }

    public function destroy($id)
    {
        $validasi = Pencatatan::where('kambing_id', $id)->count();
        if($validasi > 0){
            $notification = array(
                'message' => 'Data kambing kambing tidak bisa dihapus, sudah masuk dalam transaksi pencatatan.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        } else {
            Kambing::find($id)->delete();
            $notification = array(
                'message' => 'Data kambing berhasil dihapus',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
    }
}