<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        // dd($request);
        $request->authenticate();

        $request->session()->regenerate();

        $url = '';

        if ($request->user()->role === 'admin') {
            $url = 'admin/dashboard';
        } elseif ($request->user()->role === 'supplier') {
            $url = 'supplier/dashboard';
        } else {
            $url = 'dashboard';
        }

        $name = $request->input('login');

        Alert::success('You are logged in', 'Welcome back '. $name);

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
