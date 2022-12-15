<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tittle = 'Data Lembur';
        $lembur = Lembur::orderBy('id', 'desc')->get();
        // return view('lembur.index', compact(['lembur']));
        return view('admin.lembur.index', compact(['lembur', 'tittle']));
    }

    public function create()
    {
        //
    }

    public function submit($id)
    {
        $lembur = Lembur::find($id);
        $approval = Lembur::where('id', $id)->value('approval');
        if ($approval == 'DRAFT') {
            $lembur->update([
                'approval' => 'WAITING',
            ]);
            $notification = array(
                'message' => 'Data lembur berhasil disubmit',
                'alert-type' => 'success'
            );
            return redirect()->route('lembur')->with($notification);
        } else {
            return redirect()->route('lembur');
        }
    }

    public function store(Request $request)
    {
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_akhir = Carbon::parse($request->tanggal_akhir);
        $waktu_mulai = $request->waktu_mulai;
        $waktu_akhir = $request->waktu_akhir;
        // $waktu_total = ($waktu_akhir)->diffInMinutes($waktu_mulai);
        // $waktu_total = ((int)$waktu_akhir - (int)$waktu_mulai);
        // dd($waktu_total);
        Lembur::create([
            'user_id' => $request->user_id,
            "jenis_lembur" => $request->jenis_lembur,
            "tanggal_mulai" => $tanggal_mulai,
            "tanggal_akhir" => $tanggal_akhir,
            "waktu_mulai" => $waktu_mulai,
            "waktu_akhir" => $waktu_akhir,
            // "waktu_total" => $waktu_total,
            "deskripsi" => $request->deskripsi,
            "approval" => "DRAFT",
        ]);
        $notification = array(
            'message' => 'Data lembur berhasil dibuat',
            'alert-type' => 'success'
        );
        return redirect('/lembur')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lembur::find($id)->delete();
        // return redirect('/lembur');
        return response()->json(['status' => 'Data Lembur Berhasil di hapus!']);
    }
}