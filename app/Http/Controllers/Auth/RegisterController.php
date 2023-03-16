<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $response = Http::post('https://genbi-ntb.com/api/register', [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ]);

    // dd($request);

    if ($response->status() == 201) {
        return redirect()->route('login')->with('success', 'Your account has been created. Please login to continue.');
    } else {
        return back()->withInput()->withErrors($response->json());
    }
}
}