<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// models
use App\Models\Enquiry;
use App\Models\Subscription;
use App\Models\Member;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    // show subscriptions
    public function getSubscriptions() {        
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.subscriptions', compact('subscriptions'));
    }

    // show subscription by id
    public function getSubscription($id) {        
        $subscriptions = Subscription::findOrFail($id);
        return view('admin.subscriptions.view', compact('subscription'));
    }

    // create subscription for a member
    public function createSubs($id) {
        $subscription = Subscription::findOrFail($id);
        $startDate = Carbon::now()->toDateString();
        return view('admin.subscriptions.create', compact('subscription'));
    }

    // add or store subscription process
    public function addSubscription(Request $request, $subscriptionId) {
        $subscription = Subscription::findOrFail($subscriptionId);

        // check if the member already has a subscription
        if (Member::where('subscription_id', $subscriptionId)->exists()) {
            return redirect()->route('admin.subscriptions')->with('error', 'This member already has a subscription.');
        }

        $validatedData = $request->validate([
            'duration' => 'required|integer|min:1',
        ]);

        // subscription fee per month
        $subscriptionFee = 1500 * $validatedData['duration'];

        // calculate end date based on start date and duration
        $startDate = $request->input('start_date', Carbon::now());

        $durationMonths = $request->input('duration');
        $durationMonths = (int) $durationMonths;

        if (!($startDate instanceof Carbon)) {
            $startDate = Carbon::parse($startDate);
        }

        // create end date by adding duration months to start date
        $endDate = $startDate->copy()->addMonths($durationMonths);

        // create a new member and copy personal data
        $member = new Member();
        $member->firstname = $subscription->firstname;
        $member->lastname = $subscription->lastname;
        $member->email = $subscription->email;
        $member->barangay = $subscription->barangay;
        $member->gender = $subscription->gender;
        $member->occupation = $subscription->occupation;
        $member->reason = $subscription->reason;
        // copy subscription data
        $member->subscription_fee = $subscriptionFee;
        $member->payment_status = 'Paid'; // default status kapag inadd
        $member->start_date = $startDate;
        $member->end_date = $endDate;
        $member->subscription_id = $subscription->id;
        $member->status = 'Ongoing'; // default status kapag inadd
        $member->save();

        // update the subscription record
        $subscription->subscription_fee = $subscriptionFee;
        $subscription->payment_status = 'Paid';
        $subscription->start_date = $startDate;
        $subscription->end_date = $endDate;
        $subscription->status = 'Ongoing';
        $subscription->member_id = $member->id;
        $subscription->save();

        return redirect()->route('admin.members')->with('success', 'Subscription added successfully.');
    }

    // edit subscription
    public function editSubscription($id) {
        $subscription = Subscription::findOrFail($id);
        return view('admin.subscriptions.edit', compact('subscription'));
    }

    // update subscription process
    public function updateSubscription(Request $request, $id) {
        \Log::info('Request data: ', $request->all());

        $validatedData = $request->validate([
            'firstname' => 'required|string|max:155',
            'lastname' => 'required|string|max:155',
            'email' => 'required|email|max:155',
            'barangay' => 'required|string|max:255',
            'gender' => 'required|string|max:55',
            'occupation' => 'required|string|max:255',
            'reason' => 'nullable|string|max:512',
        ]);

        $subscription = Subscription::findOrFail($id);

        \Log::info('Subscription data before update: ', $subscription->toArray());
        
        // update the subscription details
        $subscription->update([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'barangay' => $validatedData['barangay'],
            'gender' => $validatedData['gender'],
            'occupation' => $validatedData['occupation'],
            'reason' => $validatedData['reason'],
        ]);

        \Log::info('Subscription data after update: ', $subscription->toArray());

        // update corresponding member details
        $member = Member::where('subscription_id', $subscription->id)->firstOrFail();
        $member->update([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'barangay' => $validatedData['barangay'],
            'gender' => $validatedData['gender'],
            'occupation' => $validatedData['occupation'],
            'reason' => $validatedData['reason'],
        ]);
        
        return redirect()->route('admin.subscriptions')->with('success', 'Subscription updated successfully.');
    }

    // delete subscription
    public function deleteSubscription($id) {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return redirect()->route('admin.subscriptions')->with('success', 'Subscription deleted successfully.');
    }
    
}
