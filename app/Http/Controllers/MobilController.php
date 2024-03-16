<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mobil;

class MobilController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $mobils = Mobil::all();
        return view('mobil.manajemen', compact('mobils'));
    }
    public function add(Request $request){

        $request->validate([
            'merek' => 'required|string',
            'model' => 'required|string',
            'no_plat' => 'required|string|unique:mobil',
            'tarif_per_hari' => 'required|numeric',
        ]);

        $mobil = new Mobil();
        $mobil->merek = $request->merek;
        $mobil->model = $request->model;
        $mobil->no_plat = $request->no_plat;
        $mobil->tarif_per_hari = $request->tarif_per_hari;
        $mobil->status = 'Tersedia';

        $mobil-> save();

        return redirect('/mobil/manajemen') -> with('success', 'Mobil telah ditambahkan!');

    
    }

    public function search(Request $request)
    {
        $query = Mobil::query();

        // Filter berdasarkan merek
        if ($request->filled('merek')) {
            $query->where('merek', 'like', '%' . $request->merek . '%');
        }

        // Filter berdasarkan model
        if ($request->filled('model')) {
            $query->where('model', 'like', '%' . $request->model . '%');
        }

        // Filter berdasarkan ketersediaan
        if ($request->filled('ketersediaan')) {
            $query->where('status', $request->ketersediaan);
        }

        $mobils = $query->get();
        
        if ($mobils->isEmpty()) {
            return redirect('/mobil')->with('error', 'Mobil tidak ditemukan.');
        }


        return view('mobil.manajemen', compact('mobils'));
    }





}
