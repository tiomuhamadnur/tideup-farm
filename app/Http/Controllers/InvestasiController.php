<?php

namespace App\Http\Controllers;

use App\Models\Investasi;
use App\Models\Kambing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvestasiController extends Controller
{
    public function index()
    {
        $id_user = auth()->user()->id;
        $tittle = "Data Investasiku";
        $modal = Investasi::where('user_id', $id_user)->value('modal');
        $asset = Kambing::where('user_id', $id_user)->where('status', 'ongoing')->count();
        $keuntungan = 200000;
        $tgl_terdaftar = auth()->user()->created_at;
        $tgl_skrg = Carbon::now();
        $periode = $tgl_skrg->diffInDays($tgl_terdaftar);
        return view('admin.investasi.index', compact(['tittle', 'modal', 'asset', 'keuntungan', 'periode']));
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}