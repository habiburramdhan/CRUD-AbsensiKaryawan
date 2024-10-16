<?php
// app/Http/Controllers/KaryawanController.php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Menampilkan daftar karyawan dengan fitur pencarian
    public function index(Request $request)
    {
        $search = $request->input('search'); // Mengambil input pencarian
        $karyawans = Karyawan::where('nama', 'like', "%{$search}%") // Mencari karyawan berdasarkan nama
                        ->orderBy('nama', 'asc') // Mengurutkan karyawan berdasarkan nama
                        ->paginate(10); // Menggunakan pagination

        // Mengembalikan view daftar karyawan dengan data yang diambil
        return view('karyawan.index', compact('karyawans', 'search'));
    }

    // Menampilkan form untuk menambah karyawan baru
    public function create()
    {
        return view('karyawan.create');
    }

    // Menyimpan karyawan baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tanggal_masuk' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'gaji' => 'required|numeric',
        ]);

        // Membuat karyawan baru
        Karyawan::create($request->all());

        // Mengarahkan kembali ke daftar karyawan dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    // Menampilkan detail karyawan berdasarkan ID
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    // Menampilkan form untuk mengedit data karyawan
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    // Mengupdate data karyawan di database
    public function update(Request $request, Karyawan $karyawan)
    {
        // Validasi input
        // return $request->all();

        $waktu_masuk =date('H:i',strtotime($request->waktu_masuk));
        $waktu_keluar =date('H:i',strtotime($request->waktu_keluar));

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tanggal_masuk' => 'required|date', 
            'gaji' => 'required|numeric',
        ]);

        $data= [
            'nama' => $request->nama,
            'tanggal_masuk' => $request->tanggal_masuk,
            'gaji' => $request->gaji,
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar,
        ];

        // Mengupdate data karyawan
        $karyawan->update($data);

        // Mengarahkan kembali ke daftar karyawan dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.'); // Menggunakan session untuk menampilkan pesan
    }

    // Menghapus data karyawan dari database
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        // Mengarahkan kembali ke daftar karyawan dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
