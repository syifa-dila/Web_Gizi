<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{
    // Tampilkan halaman profil
    public function show()
    {
        return view('profile.show');
    }

    // Tampilkan form edit profil
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    // Simpan perubahan profil
    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }

    // Hapus akun
    public function destroy()
    {
        $user = auth()->user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }
}
// class ProfileController extends Controller
// {
//     /**
//      * Display the user's profile form.
//      */
//     public function edit(Request $request): View
//     {
//         return view('profile.edit', [
//             'user' => $request->user(),
//         ]);
//     }

//     /**
//      * Update the user's profile information.
//      */
//     public function update(ProfileUpdateRequest $request): RedirectResponse
//     {
//         $request->user()->fill($request->validated());

//         if ($request->user()->isDirty('email')) {
//             $request->user()->email_verified_at = null;
//         }

//         $request->user()->save();

//         return Redirect::route('profile.edit')->with('status', 'profile-updated');
//     }

//     /**
//      * Delete the user's account.
//      */
//     public function destroy(Request $request): RedirectResponse
//     {
//         $request->validateWithBag('userDeletion', [
//             'password' => ['required', 'current_password'],
//         ]);

//         $user = $request->user();

//         Auth::logout();

//         $user->delete();

//         $request->session()->invalidate();
//         $request->session()->regenerateToken();

//         return Redirect::to('/');
//     }
// }
