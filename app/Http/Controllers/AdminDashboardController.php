<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // show dashboard page for user
    public function index() {
        return view('admin.dashboard');
    }
}
