<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// models
use App\Models\Enquiry;
use App\Models\Subscription;
use App\Models\Member;

use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    // show dashboard page for admin
    public function index() {
        
        // fetch total counts
        $totalEnquiries = Enquiry::count();
        $totalMembers = Subscription::where('payment_status', 'Paid')->count();
        $totalSubscriptions = Subscription::count();

        // fetch the count of members grouped by year and month
        $monthlyMemberCounts = Subscription::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as member_count')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        $subscriptions = Subscription::whereIn('payment_status', ['Paid'])->get();

        return view('admin.dashboard', compact('totalEnquiries', 'totalMembers', 'totalSubscriptions', 'monthlyMemberCounts', 'subscriptions'));
    }
}
