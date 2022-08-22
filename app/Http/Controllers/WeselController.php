<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\DataWesel;
use App\Models\User;
use App\Models\Wesel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class WeselController extends Controller
{
    public function index()
    {
        $wesel = Wesel::all();
        return view('wesel.index', compact(['wesel']));
    }

    public function show_detail_wesel()
    {
        $users = User::orderBy('name', 'ASC')->get();
        $area = Area::all();
        $data_wesel = DataWesel::all();
        Alert::image('', 'Detail Turnout Wesel', '/assets/img/panduan.PNG', '900px', '', 'detail-wesel')->width('900px')->persistent('Dismiss');
        return view('wesel.create', compact(['users', 'area', 'data_wesel']));
    }

    public function export($id)
    {
        $wesel = Wesel::find($id);
        return view('wesel.export.index', compact(['wesel']));
    }

    public function create()
    {
        $users = User::orderBy('name', 'ASC')->get();
        $area = Area::all();
        $data_wesel = DataWesel::all();
        return view('wesel.create', compact(['users', 'area', 'data_wesel']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_kegiatan_1' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'foto_kegiatan_2' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $foto_kegiatan_1 = $request->foto_kegiatan_1->store('foto-kegiatan-wesel');
        $foto_kegiatan_2 = $request->foto_kegiatan_2->store('foto-kegiatan-wesel');

        Wesel::create([
            "user_id" => $request->user_id,
            "nama_tim_2" => $request->nama_tim_2,
            "nama_tim_3" => $request->nama_tim_3,
            "nama_tim_4" => $request->nama_tim_4,
            "nama_line" => $request->nama_line,
            "nama_stasiun" => $request->nama_stasiun,
            "nama_wesel" => $request->nama_wesel,
            "tanggal_kerja" => $request->tanggal_kerja,
            "TG_1" => $request->TG_1,
            "CL_1" => $request->CL_1,
            "TG_2" => $request->TG_2,
            "CL_2" => $request->CL_2,
            "TG_2A" => $request->TG_2A,
            "CL_2A" => $request->CL_2A,
            "TG_2AA" => $request->TG_2AA,
            "CL_2AA" => $request->CL_2AA,
            "TG_3" => $request->TG_3,
            "CL_3" => $request->CL_3,
            "TG_3A" => $request->TG_3A,
            "CL_3A" => $request->CL_3A,
            "CL_4" => $request->CL_4,
            "TG_4A" => $request->TG_4A,
            "CL_4A" => $request->CL_4A,
            "TG_5" => $request->TG_5,
            "CL_5" => $request->CL_5,
            "TG_5A" => $request->TG_5A,
            "CL_5A" => $request->CL_5A,
            "TG_6A" => $request->TG_6A,
            "TG_7" => $request->TG_7,
            "CL_7" => $request->CL_7,
            "TG_7A" => $request->TG_7A,
            "CL_7A" => $request->CL_7A,
            "BG_8" => $request->BG_8,
            "CL_8" => $request->CL_8,
            "BG_8A" => $request->BG_8A,
            "CL_8A" => $request->CL_8A,
            "TG_10" => $request->TG_10,
            "CL_10" => $request->CL_10,
            "TG_10A" => $request->TG_10A,
            "CL_10A" => $request->CL_10A,
            "LL_2" => $request->LL_2,
            "AL_2" => $request->AL_2,
            "LL_5" => $request->LL_5,
            "AL_5" => $request->AL_5,
            "LL_5A" => $request->LL_5A,
            "AL_5A_1per2" => $request->AL_5A_1per2,
            "AL_5A_1per4" => $request->AL_5A_1per4,
            "AL_5A_3per4" => $request->AL_5A_3per4,
            "LL_9" => $request->LL_9,
            "AL_9" => $request->AL_9,
            'foto_kegiatan_1' => $foto_kegiatan_1,
            'foto_kegiatan_2' => $foto_kegiatan_2,
        ]);

        Alert::success('Yeah!', 'Job wesel berhasil ditambahkan');
        return redirect('/wesel');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::orderBy('name', 'ASC')->get();
        $wesel = Wesel::find($id);
        return view('wesel.edit', compact(['wesel', 'users']));
    }

    public function update(Request $request, $id)
    {
        $wesel = Wesel::find($id);
        $wesel->update($request->except(['_token', 'submit']));
        Alert::success('Yuhuu!', 'Job wesel berhasil dimutakhirkan');
        return redirect('/wesel');
    }

    public function destroy($id)
    {
        $wesel = Wesel::find($id);
        $wesel->delete();
        Alert::success('Voila!', 'Job wesel berhasil dihapus');
        return back();
    }
}