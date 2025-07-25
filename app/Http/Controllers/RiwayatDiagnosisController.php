<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis;
use Illuminate\Support\Facades\Auth;

class RiwayatDiagnosisController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Filter berdasarkan tanggal jika disediakan
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Diagnosis::with(['disease'])
            ->where('user_id', $user->id);

        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $riwayat = $query->orderByDesc('date')->get();

        return view('riwayat.index', compact('riwayat', 'startDate', 'endDate'));
    }

    public function show($id)
    {
        $diagnosis = Diagnosis::with(['disease', 'pasien'])->findOrFail($id);

        // Cegah akses diagnosis milik orang lain
        if ($diagnosis->user_id !== Auth::id()) {
            abort(403);
        }

        return view('riwayat.show', compact('diagnosis'));
    }
}
