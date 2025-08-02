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
        'diseases_id' => 'required|exists:diseases,id',
        'gejalas_id' => 'required|exists:gejalas,id',
        'cf_pakar' => 'required|numeric|between:0,1',
    ]);

    Rules::create([
        'diseases_id' => $request->diseases_id,
        'gejalas_id' => $request->gejalas_id,
        'cf_pakar' => $request->cf_pakar,
    ]);

    $notification = [
        'message' => 'nilai CF Pakar berhasil ditambahkan',
        'alert-type' => 'success'
    ];

    return redirect()->route('rules.index')->with($notification);
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
        'diseases_id' => 'required|exists:diseases,id',
        'gejalas_id' => 'required|exists:gejalas,id',
        'cf_pakar' => 'required|numeric|between:0,1',
    ]);

    $rule->update([
        'diseases_id' => $request->diseases_id,
        'gejalas_id' => $request->gejalas_id,
        'cf_pakar' => $request->cf_pakar,
    ]);

    $notification = [
        'message' => 'nilai CF pakar berhasil diperbarui',
        'alert-type' => 'success'
    ];

    return redirect()->route('rules.index')->with($notification);
}


public function destroy($id)
{
    $rule = Rules::findOrFail($id);
    $rule->delete();

    $notification = [
        'message' => 'nilai CF pakar berhasil dihapus',
        'alert-type' => 'success'
    ];

    return redirect()->route('rules.index')->with($notification);
}

    
}
