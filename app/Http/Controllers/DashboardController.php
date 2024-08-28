<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;

class DashboardController extends Controller
{
    public function main()
    {
        $title = 'Dashboard';
        $sertifikatCount = Sertifikat::distinct('no_sertifikat')->count('no_sertifikat');
        $pelatihanCount = Sertifikat::distinct('pelatihan_name')->count('pelatihan_name');
        $pesertaCount = Sertifikat::distinct('peserta_name')->count('peserta_name');

        return view('dashboard.main', compact('title', 'sertifikatCount', 'pelatihanCount', 'pesertaCount'));
    }
}
