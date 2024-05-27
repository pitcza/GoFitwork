<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// model
use App\Models\Subscription;
use App\Models\Member;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MemberController extends Controller
{
    // show members if paid
    public function showMembers() {
        $subscriptions = Subscription::whereIn('payment_status', ['Paid'])->get();
        return view('admin.members.members', compact('subscriptions'));
    }

    // show member by id
    public function getMember($id) {        
        $subscription = Subscription::findOrFail($id);
        $subscription->start_date = Carbon::parse($subscription->start_date);
        $subscription->end_date = Carbon::parse($subscription->end_date);

        return view('admin.members.view', compact('subscription'));
    }

}
