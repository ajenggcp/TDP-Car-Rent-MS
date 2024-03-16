@extends('layouts.app')

@section('content')
<form action="/mobil/peminjaman/add" method="POST">
    @csrf
    <div class="form-group">
        <label for="mobil_id">Pilih Mobil:</label>
        <select name="mobil_id" id="mobil_id" class="form-control" required>
            <option value="">Pilih Mobil</option>
            @foreach($mobils as $mobil)
                <option value="{{ $mobil->id }}">{{ $mobil->merek }} - {{ $mobil->no_plat }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_mulai">Tanggal Mulai:</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal_selesai">Tanggal Selesai:</label>
        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
