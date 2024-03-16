<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\User;
use App\Models\Peminjaman;


class PeminjamanController extends Controller
{
    
    // use HasFactory;
    protected $fillable = ['user_id', 'mobil_id', 'tanggal_mulai', 'tanggal_selesai'];

    public function index()
    {
        
        $mobils = Mobil::all();
        return view('mobil.peminjaman', compact('mobils'));
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    
    public function add(Request $request)
    {
        // Validasi data yang dikirim oleh pengguna
        $validatedData = $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
        ]);

        // Simpan data peminjaman ke dalam database
        Peminjaman::create([
            'mobil_id' => $validatedData['mobil_id'],
            'tanggal_mulai' => $validatedData['tanggal_mulai'],
            'tanggal_selesai' => $validatedData['tanggal_selesai'],
        ]);

        // Redirect pengguna ke halaman yang sesuai dengan pesan sukses atau lainnya
        return redirect()->back()->with('success', 'Peminjaman mobil berhasil ditambahkan.');
    }



}
