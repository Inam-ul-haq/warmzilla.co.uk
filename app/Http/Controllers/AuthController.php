<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Design;
// use App\Models\Dimension;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designs = Design::all();
        return view('design.view_design',compact('designs'));
    }
    public function authenticate(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
