<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// added
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Provider\AppServiceProvider;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // show login page for admin
    public function index() {
        return view('adminlogin');
    }

    // authenticate admin
    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|username',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
                if (Auth::guard('admin')->user()->role != "admin") {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.adminlogin')->with('error', 'You are not authorized to access this page.');
                }
                return redirect()->route('admin.dashboard');
            }
            else {
                return redirect()->route('admin.adminlogin')->with('error', 'Either username or password is incorrect.');
            }
        }
        else {
            return redirect()->route('admin.adminlogin')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function refreshToken(Request $request) {
        $user = $request->user();

        $user->currentAccessToken()->delete();

        if(in_array($user->role, ['admin']))
            $token = $user->createToken('token-name', ['materials:edit', 'materials:read'])->plainTextToken;

        // sets expiry time
        $tokenModel = $user->tokens->last();
        $expiryTime = now()->addHour();
        $tokenModel->update(['expires_at' => $expiryTime]);

        return response()->json(['token' => $token]);
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.adminlogin');
    }
}
