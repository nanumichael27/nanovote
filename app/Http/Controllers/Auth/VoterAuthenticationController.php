<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Voter\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class VoterAuthenticationController extends Controller
{
    //
    public function view() {
        return view('auth.voter.login');
    }

    public function login(LoginRequest $request) {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }


}
