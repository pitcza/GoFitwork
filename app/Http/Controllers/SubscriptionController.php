<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// model
use App\Models\Enquiry;
use App\Models\Subscription;
use App\Models\Member;

class SubscriptionController extends Controller
{
    // view subscriptions tab
    public function viewTab() {        
        return view('admin.subscriptions.subscriptions');
    }

    // get subscriptions
    public function getSubscriptions() {        
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.subscriptions', compact('subscriptions'));
    }

    public function addSubscription($id) {
        $enquiry = Enquiry::findOrFail($id);

        return view('admin.add_subscription', compact('enquiry'));
    }

    public function storeSubscription(Request $request)
{
    $enquiryId = $request->input('enquiry_id');
    $enquiry = Enquiry::findOrFail($enquiryId);

    // Create a member record
    $member = Member::create([
        'enquiry_id' => $enquiryId,
        'firstname' => $enquiry->firstname,
        'lastname' => $enquiry->lastname,
        'email' => $enquiry->email,
        'subscription_fee' => $request->input('subscription_fee'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
        'status' => $request->input('status'),
    ]);

    return redirect()->route('admin.members')->with('success', 'Subscription added successfully.');
}
}
