<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller {
    public function index() {
        return view( 'auth.login' );
    }

    public function auth( Request $request ) {
        $credentials = $request->validate( [
            'username' => 'required',
            'password' => 'required',
        ] );

        if ( Auth::attempt( $credentials ) ) {
            $user = Auth::user();
            $request->session()->regenerate();
            if ( $user->level == 'Admin' ) {
                return redirect()->intended( 'dashboard' );
            } else {
                return redirect()->intended( '/mhs/dashboard' );
            }
        }

        return back()->with( 'error', 'Username or Password Wrong!' );
    }

    public function logout( Request $request ) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route( 'login' );
    }
}