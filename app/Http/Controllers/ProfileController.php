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

    public function show(){
        return view("profile.settings");
    }
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
    public function update(Request $request)
    {
        $user = Auth::user();
        $formFields = $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required|email",
            "country" => "nullable",
            "streetAddress" => "nullable",
            "city" => "nullable",
            "state" => "nullable",
            "postalCode" => "nullable",
            "avatar"=>"image"
        ]);
        $formFields["street_address"] = $request->streetAddress;
        if ($request->hasFile("avatar")) {
            $formFields["avatar"] = $request->file("avatar")->store("avatars", "public");
        }
        $user->update($formFields);
        // dd($user);

        return redirect("/profile")->with('success', 'updated successfully');
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
