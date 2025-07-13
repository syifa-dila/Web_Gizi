<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Tampilkan semua data penyakit.
     */
    public function index()
    {
        $diseases = Disease::all();
        return view('disease.index', compact('diseases'));
    }

    /**
     * Simpan data penyakit baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'disease_code' => 'required|unique:diseases,disease_code|max:10',
            'name_disease' => 'required|string|max:100',
            'information' => 'required|string',
            'suggestion' => 'required|string',
        ]);

        Disease::create($request->all());

        return redirect()->route('disease.index')->with('success', 'Penyakit berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit penyakit.
     */
    public function edit($id)
    {
        $disease = Disease::findOrFail($id);
        return view('disease.edit', compact('disease'));
    }

    /**
     * Proses update penyakit.
     */
    public function update(Request $request, $id)
    {
        $disease = Disease::findOrFail($id);

        $request->validate([
            'disease_code' => 'required|max:10|unique:diseases,disease_code,' . $disease->id,
            'name_disease' => 'required|string|max:100',
            'information' => 'required|string',
            'suggestion' => 'required|string',
        ]);

        $disease->update($request->all());

        return redirect()->route('disease.index')->with('success', 'Penyakit berhasil diperbarui.');
    }

    /**
     * Hapus penyakit.
     */
    public function destroy($id)
    {
        $disease = Disease::findOrFail($id);
        $disease->delete();

        return redirect()->route('disease.index')->with('success', 'Penyakit berhasil dihapus.');
    }
}
