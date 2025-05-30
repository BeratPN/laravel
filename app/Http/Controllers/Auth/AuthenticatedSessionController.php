<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * show login form.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * create a new authenticated session.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate email and password
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        // check if email and password are correct
        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
        // kill guest session and create new user session
        $request->session()->regenerate();


        // Redirects the user to the page they were visiting before logging in or  redirect to dashboard
        return redirect()->intended(route('dashboard'));
    }

    /**
     * end the authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // kill user session
        Auth::guard('web')->logout();

        // invalidate all session information
        $request->session()->invalidate();

        // regenerate csrf token to prevent csrf attacks
        $request->session()->regenerateToken();

        return redirect('/'); // redirect to home
    }
}
