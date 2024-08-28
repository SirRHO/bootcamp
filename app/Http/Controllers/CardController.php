<?php

namespace App\Http\Controllers;
use App\Models\Sertifikat;


use Illuminate\Http\Request;

class CardController extends Controller
{
    public function main($id_sertifikat)
    {
        $sertifikat = Sertifikat::find($id_sertifikat);
        return view('card.main', compact('sertifikat'));
    }
}
