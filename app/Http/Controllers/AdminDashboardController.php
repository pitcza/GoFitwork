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
    // show dashboard page for user
    public function index() {
        
        // fetch total counts
        $totalEnquiries = Enquiry::count();
        $totalMembers = Member::distinct('subscription_id')->count('subscription_id');
        $totalSubscriptions = Subscription::count();

        // retrieve distinct member names and subscription info for each unique subscription ID
        $members = Member::select('members.subscription_id', 'members.firstname', 'members.lastname', 'members.email')
            ->distinct('members.subscription_id')
            ->get();

        // retrieve the count of member_ids for each subscription_id
        $subscriptionCounts = Member::select('subscription_id', DB::raw('count(*) as member_count'))
            ->groupBy('subscription_id')
            ->get();

        // map the subscription counts to the members array
        $members->each(function ($member) use ($subscriptionCounts) {
            $subscriptionCount = $subscriptionCounts->where('subscription_id', $member->subscription_id)->first();
            $member->member_count = $subscriptionCount ? $subscriptionCount->member_count : 0;
        });

        return view('admin.dashboard', compact('totalEnquiries', 'totalMembers', 'totalSubscriptions', 'members'));
    }
}
