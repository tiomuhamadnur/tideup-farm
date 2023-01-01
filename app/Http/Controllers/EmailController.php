<?php

namespace App\Http\Controllers;

use App\Mail\MonthlyReportMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function ReportBulanan($email)
    {
        $bulan = Carbon::now();
        $mailData = [
            'title' => 'Email ini dikirim dari farm.tideup.tech',
            'body' => 'Ini adalah laporan bulanan mengenai portofolio investasi anda di Tide Up Farm Periode' . $bulan . ' Terima kasih.'
        ];

        Mail::to($email)->send(new MonthlyReportMail($mailData));

        dd("Email berhasil dikirim.");

    }
}