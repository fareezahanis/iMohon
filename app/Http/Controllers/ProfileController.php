<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    
    public function show(Request $request): View
    {
        $role = strtolower($request->user()->role ?? '');

        if ($role === 'pelulus' && view()->exists('pelulus.profile.user')) {
            return view('pelulus.profile.user', ['user' => $request->user()]);
        }

        return view('profile.user', ['user' => $request->user()]);
    }

    /**
     * borang edit ikut role
     */
    public function edit(Request $request): View
    {
        $role = strtolower($request->user()->role ?? '');

        
        if ($role === 'pelulus' && view()->exists('pelulus.profile.edit')) {
            return view('pelulus.profile.edit', [
                'user' => $request->user(),
            ]);
        }

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Kemaskini maklumat profil & kata laluan pengguna.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'ic'             => ['nullable', 'string', 'max:20'],
            'no_tel_pejabat' => ['nullable', 'string', 'max:20'],
            'phone'          => ['nullable', 'string', 'max:20'],
            'jawatan'        => ['nullable', 'string', 'max:255'],
            'bahagian'       => ['nullable', 'string', 'max:255'],
            'unit'           => ['nullable', 'string', 'max:255'],
            'address'        => ['nullable', 'string', 'max:500'],
        ]);

        // kemaskini medan asas
        $user->name           = $validated['name'];
        $user->email          = $validated['email'];
        $user->ic             = $validated['ic'] ?? $user->ic;
        $user->no_tel_pejabat = $validated['no_tel_pejabat'] ?? $user->no_tel_pejabat;
        $user->phone          = $validated['phone'] ?? $user->phone;
        $user->jawatan        = $validated['jawatan'] ?? $user->jawatan;
        $user->bahagian       = $validated['bahagian'] ?? $user->bahagian;
        $user->unit           = $validated['unit'] ?? $user->unit;
        $user->address        = $validated['address'] ?? $user->address;

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // kemaskini kata laluan jika pengguna mengisi medan kata laluan baharu
        if ($request->filled('password')) {
            $request->validate([
                'current_password' => ['required', 'current_password'],
                'password'         => ['required', 'confirmed', Password::defaults()],
            ]);

            $user->password = Hash::make($request->password);
        }

        $user->save();

        // redirect semula ke halaman profil mengikut role
        $role = strtolower($user->role ?? '');

        if ($role === 'pelulus') {
            return Redirect::route('pelulus.profile.user')->with('status', 'profile-updated');
        }

        return Redirect::route('profile.user')->with('status', 'profile-updated');
    }

    
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}