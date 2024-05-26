<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// model
use App\Models\Subscription;
use App\Models\Member;

use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    // show members
    public function getMembers() {
        // retrieve distinct member names and subscription info for each unique subscription ID
        $members = Member::select('members.subscription_id', 'members.firstname', 'members.lastname', 'members.email', 'members.gender')
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

        return view('admin.members.members', compact('members'));
    }

}
