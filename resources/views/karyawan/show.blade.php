@extends('layouts.app')

@section('content')
    <h1>Detail Karyawan</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $karyawan->id }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $karyawan->nama }}</td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td>{{ $karyawan->jabatan }}</td>
        </tr>
        <tr>
            <th>Tanggal Masuk</th>
            <td>{{ $karyawan->tanggal_masuk }}</td>
        </tr>
        <tr>
            <th>Waktu Masuk</th>
            <td>{{ $karyawan->waktu_masuk }}</td>
        </tr>
        <tr>
            <th>Waktu Keluar</th>
            <td>{{ $karyawan->waktu_keluar }}</td>
        </tr>
        <tr>
            <th>Gaji</th>
            <td>{{ $karyawan->gaji }}</td>
        </tr>
    </table>

    <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Kembali</a>
@endsection
