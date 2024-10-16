@extends('layouts.app')

@section('content')
    <h1>Daftar Karyawan</h1>

    <form action="{{ route('karyawan.index') }}" method="GET">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari karyawan...">
        <button type="submit" class="btn btn-secondary">Cari</button>
    </form>

    <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Tanggal Masuk</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
                <tr>
                    <td>{{ $karyawan->id }}</td>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>{{ $karyawan->tanggal_masuk }}</td>
                    <td>{{ $karyawan->waktu_masuk }}</td>
                    <td>{{ $karyawan->waktu_keluar }}</td>
                    <td>{{ $karyawan->gaji }}</td>
                    <td>
                        <a href="{{ route('karyawan.show', $karyawan->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $karyawans->links() }} <!-- Menampilkan pagination -->

    @if (session('success')) <!-- Memeriksa apakah ada pesan sukses di session -->
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('success') }}", // Mengambil pesan dari session
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endsection
