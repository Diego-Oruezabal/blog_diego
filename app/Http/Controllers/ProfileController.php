<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Validar los campos adicionales (si no se validan en ProfileUpdateRequest)
        $request->validate([
            'descripcion' => 'nullable|string|max:1000',
            'urlfacebook' => 'nullable|url|max:255',
            'urlinstagram' => 'nullable|url|max:255',
            'urlyoutube' => 'nullable|url|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        // Actualizar los campos principales
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Campos personalizados
        $user->descripcion = $request->input('descripcion');
        $user->urlfacebook = $request->input('urlfacebook');
        $user->urlinstagram = $request->input('urlinstagram');
        $user->urlyoutube = $request->input('urlyoutube');

        // Contraseña (si se proporcionó)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password')); // más recomendado que bcrypt()
        }

         // Guardar imagen de perfil
        if ($request->hasFile('profile_image')) {
            // Borrar anterior si existía
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        // Guardar cambios
        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Perfil actualizado correctamente.');
    }

    /**
     * Delete the user's account.
     */
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
