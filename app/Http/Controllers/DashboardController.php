<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\PartaiModel;
use App\Models\PegawaiModel;
use App\Models\SuratMasukModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $data = [
            'keuangan_count' => 0,
            'surat_masuk_count' => SuratMasukModel::count(),
            'partai_count' => PartaiModel::count(),
            'anggota_count' => AnggotaModel::count(),
            'pegawai_count' => PegawaiModel::count(),
            'ptt_count' => PTTModel::count(),
            'user_count' => 0
        ];

        return view('dashboard.index', $data);
    }
}
