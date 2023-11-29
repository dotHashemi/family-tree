<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('GET')) {

            return view('auth.login');

            // // // -- -- --

        } else if ($request->isMethod('POST')) {

            $request->validate([
                'phone'     => 'required|string',
                'password'  => 'required|string'
            ]);

            $user = User::where('phone', $request->phone)->first();

            if ($user) {
                if (Hash::check($request->password, $user->password)) {

                    Auth::login($user);

                    return redirect()->route('panel.index');
                }
            }

            return redirect('/');
        }
    }
}
