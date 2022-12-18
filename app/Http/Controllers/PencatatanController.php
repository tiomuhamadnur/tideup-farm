<?php

namespace App\Http\Controllers;

use App\Models\Kambing;
use App\Models\Pencatatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PencatatanController extends Controller
{
    public function index()
    {
        $tittle = 'Pencatatan Kambing Bulanan';
        $pencatatan = Pencatatan::all();
        $kambing = Kambing::all();
        return view('admin.pencatatan.index', compact(['tittle', 'pencatatan', 'kambing']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        $tgl_catat = Carbon::parse($request->tgl_catat)->format('Y-m-d');
        $kambing = Kambing::find($request->kambing_id);

        $this->validate($request, [
            'user_id' => ['required'],
            'kambing_id' => ['required'],
            'tgl_catat' => ['required'],
            'bobot' => ['required', 'numeric'],
            'foto' => ['image', 'nullable'],
        ]);

        if ($request->hasFile('foto') && $request->foto != '') {
            $foto_catat = $request->file('foto')->store('photo-pencatatan-kambing'); //new file path
            Pencatatan::create([
                'user_id' => $request->user_id,
                'kambing_id' => $request->kambing_id,
                'tgl_catat' => $tgl_catat,
                'bobot' => $request->bobot,
                'foto' => $foto_catat,
            ]);
            $notification = array(
                'message' => 'Data penimbangan ' . $kambing->name . ' berhasil dibuat.',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        } else {
            Pencatatan::create([
                'user_id' => $request->user_id,
                'kambing_id' => $request->kambing_id,
                'tgl_catat' => $tgl_catat,
                'bobot' => $request->bobot,
            ]);
            $notification = array(
                'message' => 'Data penimbangan ' . $kambing->name . ' berhasil dibuat.',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
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