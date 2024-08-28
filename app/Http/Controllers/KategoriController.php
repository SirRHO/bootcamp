<?php

namespace App\Http\Controllers;
use App\Models\Kategori;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function main()
    {
        $title = 'Kategori';
        $kategori = Kategori::all();
        return view('kategori.main', ['kategori' => $kategori, 'title' => $title]);
    }

    public function formAdd()
    {
        $title = "Kategori";
        return view('kategori.formAdd', compact('title'));
    }

    public function doformAdd(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect('/kategori');
    }

    public function formEdit($id_kategori)
    {
        $title = "Kategori";
        $kategori = Kategori::find($id_kategori);
        return view('kategori.formEdit', compact('kategori', 'title'));
    }

    public function doformEdit(Request $request, $id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();
        return redirect('/kategori');
    }

    public function delete($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $kategori->delete();
        return redirect('/kategori');
    }
}
