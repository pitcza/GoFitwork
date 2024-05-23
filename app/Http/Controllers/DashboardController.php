<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // show dashboard page for user
    public function index() {
        return view('staff/dashboard');
    }
}
