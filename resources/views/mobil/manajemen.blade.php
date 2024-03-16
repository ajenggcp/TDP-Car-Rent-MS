@extends('layouts.app')

@section('content')

<h1>Tambah mobil</h1>

<form action="/mobil/add" method="POST">
    @csrf
    <div class="form-group">
        <label for="merek">Merek:</label>
        <input type="text" class="form-control" id="merek" name="merek" required>
    </div>
    <div class="form-group">
        <label for="model">Model:</label>
        <input type="text" class="form-control" id="model" name="model" required>
    </div>
    <div class="form-group">
        <label for="no_plat">Nomor Plat:</label>
        <input type="text" class="form-control" id="no_plat" name="no_plat" required>
    </div>
    <div class="form-group">
        <label for="tarif_per_hari">Tarif Sewa per Hari:</label>
        <input type="number" class="form-control" id="tarif_per_hari" name="tarif_per_hari" required>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Mobil</button>
</form>



<h1>Search Mobil</h1>

<form action="/mobil/search" method="GET">
    <div class="form-group">
        <input type="text" name="merek" class="form-control" placeholder="Merek">
    </div>
    <div class="form-group">
        <input type="text" name="model" class="form-control" placeholder="Model">
    </div>
    <div class="form-group">
        <select name="ketersediaan" class="form-control">
            <option value="">Pilih Ketersediaan</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Disewa">Disewa</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
</form>

@if($mobils->isNotEmpty())
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Merek</th>
                <th>Model</th>
                <th>Nomor Plat</th>
                <th>Tarif Sewa per Hari</th>
                <!-- tambahkan kolom lainnya sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @foreach($mobils as $mobil)
            <tr>
                <td>{{ $mobil->merek }}</td>
                <td>{{ $mobil->model }}</td>
                <td>{{ $mobil->no_plat }}</td>
                <td>{{ $mobil->tarif_per_hari }}</td>
                <!-- tambahkan kolom lainnya sesuai kebutuhan -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
    <p>Tidak ada mobil yang tersedia.</p>
@endif

@endsection
