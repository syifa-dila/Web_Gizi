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
            'disease_id' => 'required',
            'gejala_id' => 'required',
            'CF_user' => 'required|numeric',
            'CF_pakar' => 'required|numeric',
            'combine' => 'nullable|numeric',
        ]);

        Rules::create($request->all());

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
            'disease_id' => 'required',
            'gejala_id' => 'required',
            'CF_user' => 'required|numeric',
            'CF_pakar' => 'required|numeric',
            'combine' => 'nullable|numeric',
        ]);

        $rule->update($request->all());

        return redirect()->route('rules.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rule = Rules::findOrFail($id);
        $rule->delete();

        return redirect()->route('rules.index')->with('success', 'Data berhasil dihapus.');
    }
}
