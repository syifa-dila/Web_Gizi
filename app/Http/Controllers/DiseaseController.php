<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Gejala;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{

    public function index()
    {
        $diseases = Disease::all();
        return view('penyakit.index', compact('diseases'));
    }
    public function edit($id)
    {
        $disease = Disease::findOrFail($id);
        return view('penyakit.edit', compact('disease'));
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

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil diperbarui.');
    }

    /**
     * Hapus penyakit.
     */
    public function destroy($id)
    {
        $disease = Disease::findOrFail($id);
        $disease->delete();

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil dihapus.');
    }

    public function store(Request $request)
{
    $request->validate([
        'disease_code' => 'required|unique:diseases,disease_code|max:10',
        'name_disease' => 'required|string|max:255',
        'information'  => 'required|string',
        'suggestion'   => 'required|string',
    ]);

    Disease::create([
        'disease_code' => $request->disease_code,
        'name_disease' => $request->name_disease,
        'information'  => $request->information,
        'suggestion'   => $request->suggestion,
    ]);

    return redirect()->back()->with('success', 'Data penyakit berhasil ditambahkan.');
}

public function gejalas()
{
    return $this->belongsToMany(Gejala::class, 'aturan_nilai_cf', 'idPenyakit', 'idGejala')
                ->withPivot('cfPakar');
}

}
