@extends('layouts.app')

@section('content')
    <h1>Tambah Karyawan</h1>

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Waktu Masuk</label>
            <input type="time" name="waktu_masuk" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Waktu Keluar</label>
            <input type="time" name="waktu_keluar" class="form-control">
        </div>
        <div class="form-group">
            <label>Gaji</label>
            <input type="number" name="gaji" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
