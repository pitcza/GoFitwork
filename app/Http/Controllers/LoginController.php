<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// added
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Provider\AppServiceProvider;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // show login page for customer
    public function index() {
        return view('staff/login');
    }

    // authenticate user
    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|username',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->route('account.dashboard');
            }
            else {
                return redirect()->route('account.login')->with('error', 'Either username or password is incorrect.');
            }
        }
        else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // show register page for user
    public function register() {
        return view('staff/register');
    }

    // registration process
    public function processRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|alpha_num|unique:users',
            // 'fisrt_name' => 'required|first_name',
            // 'last_name' => 'required|last_name',
            'password' => 'required|confirmed'
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->username = $request->username;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->role = 'admin';
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('account.login')->with('success', 'You have registered successsfully.');
        }
        else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
