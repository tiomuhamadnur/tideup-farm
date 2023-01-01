<?php

namespace App\Http\Controllers;

use App\Models\Investasi;
use App\Models\Kelompok;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvestasiAdminController extends Controller
{
    public function index()
    {
        $tittle = "Data Investasi";
        $investor = User::where('role', 'investor')->get();
        $investasi = Investasi::all();
        $kelompok = Kelompok::all();
        return view('admin.investasi_admin.index', compact(['tittle', 'investor', 'investasi', 'kelompok']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        $tgl_investasi = Carbon::parse($request->tgl_investasi)->format('Y-m-d');

        $this->validate($request, [
            'user_id' => ['required'],
            'kelompok_id' => ['required'],
            'modal' => ['required', 'numeric'],
            'tgl_investasi' => ['required'],
            'kwitansi_investasi' => ['image', 'nullable'],
        ]);

        if ($request->kelompok_id != "mandiri") {
            $kelompok_id = $request->kelompok_id;
            if ($request->hasFile('kwitansi_investasi')){
                $kwitansi_investasi = $request->file('kwitansi_investasi')->store('investasi/photo-kwitansi-investasi');
                Investasi::create([
                    'user_id' => $request->user_id,
                    'kelompok_id' => $kelompok_id,
                    'tgl_investasi' => $tgl_investasi,
                    'modal' => $request->modal,
                    'kwitansi_investasi' => $kwitansi_investasi,
                ]);
                $notification = array(
                    'message' => 'Data investasi berhasil dibuat',
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            } else {
                Investasi::create([
                    'user_id' => $request->user_id,
                    'kelompok_id' => $kelompok_id,
                    'tgl_investasi' => $tgl_investasi,
                    'modal' => $request->modal,
                ]);
                $notification = array(
                    'message' => 'Data investasi berhasil dibuat',
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            }
        } else {
            $kelompok_id = null;
            if ($request->hasFile('kwitansi_investasi')){
                $kwitansi_investasi = $request->file('kwitansi_investasi')->store('investasi/photo-kwitansi-investasi');
                Investasi::create([
                    'user_id' => $request->user_id,
                    'kelompok_id' => $kelompok_id,
                    'tgl_investasi' => $tgl_investasi,
                    'modal' => $request->modal,
                    'kwitansi_investasi' => $kwitansi_investasi,
                ]);
                $notification = array(
                    'message' => 'Data investasi berhasil dibuat',
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            } else {
                Investasi::create([
                    'user_id' => $request->user_id,
                    'kelompok_id' => $kelompok_id,
                    'tgl_investasi' => $tgl_investasi,
                    'modal' => $request->modal,
                ]);
                $notification = array(
                    'message' => 'Data investasi berhasil dibuat',
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tittle = "Edit Data Investasi";
        $investasi = Investasi::findOrFail($id);
        $investor = User::where('role', 'investor')->get();
        return view('admin.investasi_admin.edit', compact(['tittle', 'investasi', 'investor']));
    }

    public function update(Request $request)
    {
        $tgl_investasi = Carbon::parse($request->tgl_investasi)->format('Y-m-d');
        $id = $request->id;
        $this->validate($request, [
            'user_id' => ['required'],
            'modal' => ['required', 'numeric'],
            'tgl_investasi' => ['required'],
            'kwitansi_investasi' => ['image', 'nullable'],
        ]);
        if ($request->hasFile('kwitansi_investasi')){
            $kwitansi_investasi = $request->file('kwitansi_investasi')->store('investasi/photo-kwitansi-investasi');
            Investasi::findOrFail($id)->update([
                'user_id' => $request->user_id,
                'tgl_investasi' => $tgl_investasi,
                'modal' => $request->modal,
                'kwitansi_investasi' => $kwitansi_investasi,
            ]);
            $notification = array(
                'message' => 'Data investasi berhasil diperbaharui',
                'alert-type' => 'success'
            );
            return redirect('/admin-investasi')->with($notification);
        } else {
            Investasi::findOrFail($id)->update([
                'user_id' => $request->user_id,
                'tgl_investasi' => $tgl_investasi,
                'modal' => $request->modal,
            ]);
            $notification = array(
                'message' => 'Data investasi berhasil diperbaharui',
                'alert-type' => 'success'
            );
            return redirect('/admin-investasi')->with($notification);
        }
    }

    public function destroy($id)
    {
        Investasi::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Data investasi berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect('/admin-investasi')->with($notification);
    }
}