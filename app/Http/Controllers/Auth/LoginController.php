<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function showLoginForm()
{
    return view('auth.login');
}

public function login(Request $request)
{
    $response = Http::post('https://genbi-ntb.com/api/login', [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ]);
        // return $response;

    if ($response->status() == 200) {
        // session(['api_token' => $response['access_token']]);
        $token = $response['token'];
        session(['api_token' => $token]);
        $request->session()->regenerate();
        return redirect()->intended('/dashboard')->with('success', 'You have successfully logged in.');
    } else {
        return back()->withInput()->withErrors($response->json());
    }
}


public function logout(Request $request)
{
    // return $request;
    $response = Http::withToken(session('api_token'))->post('https://genbi-ntb.com/api/logout');

    if ($response->status() == 200) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('success', 'You have successfully logged out.');
    } else {
        return back()->withInput()->withErrors($response->json());
    }
}
}