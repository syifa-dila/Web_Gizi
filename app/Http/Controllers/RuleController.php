<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rules;
use App\Models\Disease;
use App\Models\Gejala;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rules::with(['disease', 'gejala'])->get();
        return view('rules.index', compact('rules'));
    }

    public function create()
    {
        $diseases = Disease::all();
        $gejalas = Gejala::all();
        return view('rules.create', compact('diseases', 'gejalas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'disease_id' => 'required|exists:diseases,id',
            'gejala_id' => 'required|exists:gejalas,id',
            'cf_pakar' => 'required|numeric|between:0,1',
        ]);

        Rules::create([
            'disease_id' => $request->disease_id,
            'gejala_id' => $request->gejala_id,
            'cf_pakar' => $request->cf_pakar,
        ]);

        return redirect()->route('rules.index')->with('success', 'Aturan CF berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rule = Rules::findOrFail($id);
        $diseases = Disease::all();
        $gejalas = Gejala::all();
        return view('rules.edit', compact('rule', 'diseases', 'gejalas'));
    }

    public function update(Request $request, $id)
    {
        $rule = Rules::findOrFail($id);

        $request->validate([
            'disease_id' => 'required|exists:diseases,id',
            'gejala_id' => 'required|exists:gejalas,id',
            'cf_pakar' => 'required|numeric|between:0,1',
        ]);

        $rule->update([
            'disease_id' => $request->disease_id,
            'gejala_id' => $request->gejala_id,
            'cf_pakar' => $request->cf_pakar,
        ]);

        return redirect()->route('rules.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rule = Rules::findOrFail($id);
        $rule->delete();

        return redirect()->route('rules.index')->with('success', 'Data berhasil dihapus.');
    }
    
}
