<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Produk::all();
        return view('tampil', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'stok_produk' => 'required|numeric',
            'harga_produk' => 'required|numeric',
            'gambar_produk' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('alert', [
                'type' => 'error',
                'title' => 'Produk Gagal Ditambahkan',
                'message' => 'Ada inputan yang salah!',
            ]);
        } else {
            $folderPath = public_path('upload');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }
            $nama = strtolower(str_replace([' ', '(', ')', '+'], ['-', '', '', '-'], $request->nama_produk));
            $namaFile = $nama.'.jpg';
            $request->file('gambar_produk')->move($folderPath, $namaFile);
            Produk::create([
                "nama_produk" => $request->nama_produk,
                "stok_produk" => $request->stok_produk,
                "harga_produk" => $request->harga_produk,
                "gambar_produk" => $namaFile,
            ]);
            Session::flash('alert', [
                'type' => 'success',
                'title' => 'Produk Berhasil Ditambahkan',
                'message' => "",
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
