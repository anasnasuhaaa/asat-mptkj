<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use File;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barang = Barang::get();
        return view('barang.index', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $filename = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $filename);

        $barang = new Barang();

        $barang->nama = $request->nama;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->gambar = $filename;

        $barang->save();
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $barang = Barang::find($id);

        return view('barang.show', ['barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $barang = Barang::find($id);

        return view('barang.update', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg',
        ]);

        $barang = Barang::find($id);

        if ($request->has('gambar')) {
            $path = 'images/';

            File::delete($path . $barang->gambar);
            $filename = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $filename);

            $barang->gambar = $filename;
            $barang->save();
        }

        $barang->nama = $request->input('nama');
        $barang->deskripsi = $request->input('deskripsi');
        $barang->harga = $request->input('harga');
        $barang->stok = $request->input('stok');

        $barang->save();

        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $barang = Barang::find($id);

        $path = 'images/';
        File::delete($path . $barang->gambar);

        $barang->delete();

        return redirect('/barang');
    }
}
