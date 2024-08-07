<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

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
        $request->authenticate();

        $request->session()->regenerate();

        // $http = new \GuzzleHttp\Client;
        // $response = $http->get('http://127.0.0.1:8000/api/events', [
        //     'headers' => [
        //         'Authorization' => 'Bearer'.session()->get('token.access_token')
        //     ]
        // ]);

        // $response = Http::get('http://127.0.0.1:8000/api/events');
        // $jsonData = $response->json();

        $name = 'aslam';
        // return redirect()->intended(route('dashboard', absolute: false));
        return redirect()->intended(route('dashboard', [$name]));
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
