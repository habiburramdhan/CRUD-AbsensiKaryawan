@extends('layouts.app')

@section('content')
    <h1>Edit Karyawan</h1>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" id="updateForm">
        @csrf
        @method('PUT') <!-- Menggunakan method PUT untuk update -->

        {{$errors}}
        
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $karyawan->nama }}" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" value="{{ $karyawan->jabatan }}" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" value="{{ $karyawan->tanggal_masuk }}" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Waktu Masuk</label>
            <input type="time" name="waktu_masuk" value="{{ $karyawan->waktu_masuk }}" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Waktu Keluar</label>
            <input type="time" name="waktu_keluar" value="{{ $karyawan->waktu_keluar }}" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Gaji</label>
            <input type="number" name="gaji" value="{{ $karyawan->gaji }}" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Update</button>
    </form>

    <script>
        // Menangani submit form dengan konfirmasi SweetAlert
        document.getElementById('updateForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari submit default

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data karyawan akan diperbarui!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, perbarui!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Melanjutkan submit form jika yakin
                }
            });
        });
    </script>
@endsection
