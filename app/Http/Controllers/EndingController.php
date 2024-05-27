<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EndingController extends Controller
{
    // get "Ending" and "Ended" membership
    public function moveEndingAndEndedMembers() {
        // get members with "Ending" and "Ended" status
        $endingMembers = Member::whereIn('status', ['Ending', 'Ended'])->get();

        // nsert all members with status "Ending" and "Ended" into another table
        foreach ($endingMembers as $member) {
            Ending::create([
                'firstname' => $member->firstname,
                'lastname' => $member->lastname, 
                'email' => $member->email,
                'barangay' => $member->barangay,
                'gender' => $member->gender,
                'occupation' => $member->occupation,
                'reason' => $member->reason,

                'subscription_fee' => $member->subscription_fee,
                'payment_status' => $member->payment_status,
                'start_date' => $member->start_date,
                'end_date' => $member->end_date,
                'subscription_id' => $member->subscription_id,
                'status' => $member->status,
            ]);
        }

        // Delete only the "Ended" members from the original table
        Member::where('status', 'Ended')->delete();

        // return view('admin.subscriptions.ending', compact('subscriptions'));
    }
}
