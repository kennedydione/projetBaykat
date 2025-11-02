<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    public function connection(): View
    {
        return view('auth.connection');
    }
    public function inscription(): View
    {
        return view('auth.inscription');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        if(Auth::user()->role=='admin'){
            return redirect('/admin/home');
        }
         if(Auth::user()->role=='agriculteur'){
            return redirect('/agriculteur/home');
        }
         if(Auth::user()->role=='client'){
            return redirect('/client/home');
        }
       return redirect()->intended(route('dashboard', absolute: false));

       //  $role = Auth::user()->role;
   // return match ($role) {
     //   'admin' => redirect('/admin/home'),
     //   'agriculteur' => redirect('/agriculteur/home'),
    //    'client' => redirect('/client/home'),
      //  default => redirect('/'),
    //};
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
