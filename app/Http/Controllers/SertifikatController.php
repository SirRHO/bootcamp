<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Sertifikat;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SertifikatController extends Controller
{
    public function main()
    {
        $title = 'Sertifikat';
        $sertifikat = Sertifikat::with('kategori')->get();
        return view('sertifikat.main', ['sertifikat' => $sertifikat, 'title' => $title]);
    }

    public function certificate(Request $request)
    {
        $sertifikat = Sertifikat::find($request->id_sertifikat);

        Carbon::setLocale('id');

        $tanggalMulaiFormatted = Carbon::parse($sertifikat->tanggal_mulai)->translatedFormat('d F Y');
        $tanggalTutupFormatted = Carbon::parse($sertifikat->tanggal_tutup)->translatedFormat('d F Y');
        $tanggalSekarang = Carbon::now()->translatedFormat('d F Y');

        $urlToCard = route('card.main', ['id_sertifikat' => $sertifikat->id_sertifikat]);
        // Generate QR code tunggal
        // $qrCodes = QrCode::size(200)->generate($urlToCard);
        $qrr = base64_encode(QrCode::format('svg')->size(80)->errorCorrection('H')->generate($urlToCard));

        if ($request->get('export') == 'pdf') {
            $imagePath1 = public_path('assets/img/top.png');
            $imagePath2 = public_path('assets/img/middle.png');
            $imagePath3 = public_path('assets/img/right.png');
            $imagePath4 = public_path('assets/img/left.png');
            $imageLogo = public_path('assets/img/Logo_Natusi.png');

            $pdf = Pdf::loadView('sertifikat.certificate', [
                'sertifikat' => $sertifikat,
                'tanggalMulaiFormatted' => $tanggalMulaiFormatted,
                'tanggalTutupFormatted' => $tanggalTutupFormatted,
                'tanggalSekarang' => $tanggalSekarang,
                'imagePath1' => $imagePath1,
                'imagePath2' => $imagePath2,
                'imagePath3' => $imagePath3,
                'imagePath4' => $imagePath4,
                'imageLogo' => $imageLogo,
                'url' => $urlToCard,
                'qr' => $qrr,
            ])->setPaper('a4', 'landscape');

            $pdf->set_option('fontDir', public_path('fonts')); // Atur direktori font
            $pdf->set_option('fontCache', storage_path('fonts'));

            return $pdf->stream('certificate.pdf');
        }
        // return view('sertifikat.certificate', [
        //     'sertifikat' => $sertifikat,
        //     'tanggalMulaiFormatted' => $tanggalMulaiFormatted,
        //     'tanggalTutupFormatted' => $tanggalTutupFormatted,
        //     'tanggalSekarang' => $tanggalSekarang,
        //     'qrCodes' => $qrCodes
        // ]);

        // return view('sertifikat.certificate', compact('sertifikat','tanggalMulaiFormatted', 'tanggalTutupFormatted', 'tanggalSekarang', 'qrCodes'));
    }

    public function formAdd()
    {
        $title = "Sertifikat";
        $kategori = Kategori::all();
        return view('sertifikat.formAdd', compact('title', 'kategori'));
    }

    public function doformAdd(Request $request)
    {

        $sertifikat = new Sertifikat();
        $sertifikat->no_sertifikat = $request->no_sertifikat;
        $sertifikat->pelatihan_name = $request->pelatihan_name;
        $sertifikat->peserta_name = $request->peserta_name;
        $sertifikat->tanggal_mulai = \Carbon\Carbon::createFromFormat('Y-m-d', $request->tanggal_mulai)->format('d-m-Y');
        $sertifikat->tanggal_tutup = \Carbon\Carbon::createFromFormat('Y-m-d', $request->tanggal_tutup)->format('d-m-Y');
        $sertifikat->masa_berlaku = \Carbon\Carbon::createFromFormat('Y-m-d', $request->masa_berlaku)->format('d-m-Y');
        $sertifikat->kategori_id = $request->kategori_id;
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $gambar = $request->file('gambar');
            $ext_foto = $gambar->getClientOriginalExtension();
            $filename = "Sertifikat_Gambar_" . $request->peserta_name . "_" . date('dmY') . "." . $ext_foto;
            $temp_foto = 'assets/img/sertifikat/';
            $gambar->move(public_path($temp_foto), $filename);
            $sertifikat->gambar = $filename;
        }
        $sertifikat->save();
        return redirect('/tampil-sertifikat');
    }

    public function formEdit($id_sertifikat)
    {
        $title = "Sertifikat";
        $sertifikat = Sertifikat::find($id_sertifikat);
        $kategori = Kategori::all();
        if ($sertifikat->tanggal_mulai) {
            $sertifikat->tanggal_mulai = Carbon::parse($sertifikat->tanggal_mulai)->format('d-m-Y');
        }
        if ($sertifikat->tanggal_tutup) {
            $sertifikat->tanggal_tutup = Carbon::parse($sertifikat->tanggal_tutup)->format('d-m-Y');
        }
        if ($sertifikat->masa_berlaku) {
            $sertifikat->masa_berlaku = Carbon::parse($sertifikat->masa_berlaku)->format('d-m-Y');
        }
        return view('sertifikat.formEdit', compact('sertifikat', 'title', 'kategori'));
    }

    public function doformEdit(Request $request, $id_sertifikat)
    {
        $sertifikat = Sertifikat::find($id_sertifikat);
        $sertifikat->no_sertifikat = $request->no_sertifikat;
        $sertifikat->pelatihan_name = $request->pelatihan_name;
        $sertifikat->peserta_name = $request->peserta_name;
        $sertifikat->tanggal_mulai = \Carbon\Carbon::createFromFormat('Y-m-d', $request->tanggal_mulai)->format('d-m-Y');
        $sertifikat->tanggal_tutup = \Carbon\Carbon::createFromFormat('Y-m-d', $request->tanggal_tutup)->format('d-m-Y');
        $sertifikat->masa_berlaku = \Carbon\Carbon::createFromFormat('Y-m-d', $request->masa_berlaku)->format('d-m-Y');
        $sertifikat->kategori_id = $request->kategori_id;
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $gambar = $request->file('gambar');
            $ext_foto = $gambar->getClientOriginalExtension();
            $filename = "Sertifikat_Gambar_" . $request->peserta_name . "_" . date('dmY') . "." . $ext_foto;
            $temp_foto = 'assets/img/sertifikat/';
            $gambar->move(public_path($temp_foto), $filename);
            $sertifikat->gambar = $filename;
        }
        $sertifikat->update();
        return redirect('/tampil-sertifikat');
    }

    public function deleteSertifikat($id_sertifikat)
    {
        $sertifikat = Sertifikat::find($id_sertifikat);
        $sertifikat->delete();
        return redirect('/tampil-sertifikat');
    }
}
