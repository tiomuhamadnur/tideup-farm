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
        $modal = number_format($modal, 0, '.', '');
        $investasi = Investasi::where('user_id', $id_user);
        $kelompok_id = $investasi->value('kelompok_id');

        $tgl_skrg = Carbon::now();

        if ($kelompok_id != null){
            $modal_total = Investasi::where('kelompok_id', $kelompok_id)->sum('modal');
            if($modal_total == 0){
                $persentase = 0;
            } else {
                $persentase = ($modal/$modal_total)*100;
                $persentase = number_format($persentase, 2, '.', '');
            }
            $kelompok = "Kelompok";
            $tgl_terdaftar = Kambing::where('kelompok_id', $kelompok_id)->where('status', 'ongoing')->orderBy('tgl_beli', 'asc')->value('tgl_beli');
            $periode = $tgl_skrg->diffInDays($tgl_terdaftar);
            $asset = Kambing::where('kelompok_id', $kelompok_id)->where('status', 'ongoing')->count();
            $asset_sold = Kambing::where('kelompok_id', $kelompok_id)->where('status', 'sold')->count();
            $kambing = Kambing::where('kelompok_id', $kelompok_id)->where('status', 'sold')->get();
            $keuntungan = ($kambing->sum('harga_jual') - $kambing->sum('harga_beli'));
            $keuntungan_tideup = $keuntungan * 5/100;
            $keuntungan_pengelola = ($keuntungan - $keuntungan_tideup)/2;
            $keuntungan_investor = $keuntungan_pengelola * ($modal/$modal_total);
            $keuntungan_investor = number_format($keuntungan_investor, 0, '.', '');
        } else {
            $modal_total = $modal;
            if($modal_total == 0){
                $persentase = 0;
            } else {
                $persentase = ($modal/$modal_total)*100;
                $persentase = number_format($persentase, 2, '.', '');
            }
            $kelompok = "Mandiri";
            $tgl_terdaftar = Kambing::where('user_id', $id_user)->where('status', 'ongoing')->orderBy('tgl_beli', 'asc')->value('tgl_beli');
            $periode = $tgl_skrg->diffInDays($tgl_terdaftar);
            $asset = Kambing::where('user_id', $id_user)->where('status', 'ongoing')->count();
            $asset_sold = Kambing::where('user_id', $id_user)->where('status', 'sold')->count();
            $kambing = Kambing::where('user_id', $id_user)->where('status', 'sold')->get();
            $keuntungan = ($kambing->sum('harga_jual') - $kambing->sum('harga_beli'));
            $keuntungan_tideup = $keuntungan * 5/100;
            $keuntungan_pengelola = ($keuntungan - $keuntungan_tideup)/2;
            $keuntungan_investor = $keuntungan_pengelola;
        }
        
        return view('admin.investasi.index', compact(['tittle', 'modal', 'modal_total', 'persentase', 'kelompok', 'asset', 'asset_sold', 'keuntungan_investor', 'periode']));
    }

    public function kambing_ongoing()
    {
        $tittle = "Data Kambing Investasi On Going";
        $user_id = auth()->user()->id;
        $investasi = Investasi::where('user_id', $user_id);
        $kelompok_id = $investasi->value('kelompok_id');
        if ($kelompok_id != null){
            $kambing_ongoing = Kambing::where('kelompok_id', $kelompok_id)->where('status', 'ongoing')->get();
            return view('admin.investasi.kambing.ongoing.index', compact(['tittle', 'kambing_ongoing']));
        } else {
            $kambing_ongoing = Kambing::where('user_id', $user_id)->where('status', 'ongoing')->get();
            return view('admin.investasi.kambing.ongoing.index', compact(['tittle', 'kambing_ongoing']));
        }
    }

    public function kambing_sold()
    {
        $tittle = "Data Kambing Investasi Terjual";
        $user_id = auth()->user()->id;
        $investasi = Investasi::where('user_id', $user_id);
        $kelompok_id = $investasi->value('kelompok_id');
        if ($kelompok_id != null){
            $kambing_sold = Kambing::where('kelompok_id', $kelompok_id)->where('status', 'sold')->get();
            return view('admin.investasi.kambing.sold.index', compact(['tittle', 'kambing_sold']));
        } else {
            $kambing_sold = Kambing::where('user_id', $user_id)->where('status', 'sold')->get();
            return view('admin.investasi.kambing.sold.index', compact(['tittle', 'kambing_sold']));
        }
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
        
    }
}