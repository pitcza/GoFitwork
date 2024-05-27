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
        $subscription = Subscription::findOrFail($id);
        $subscription->start_date = Carbon::parse($subscription->start_date);
        $subscription->end_date = Carbon::parse($subscription->end_date);

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
        if ($subscription && $subscription->payment_status === 'Paid') {
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

        $status = 'Ongoing'; // Default status

        // current date is before the start date
        if (Carbon::now()->lt($startDate)) {
            $status = 'Scheduled';
        } 
        elseif (Carbon::now()->lt($endDate)) { // current date is before the end date
            if (Carbon::now()->diffInDays($endDate) <= 7) {
                $status = 'Ending';
            } 
            else {
                $status = 'Ongoing';
            }
        } 
        elseif (Carbon::now()->gt($endDate)) { // current date is after the end date
            $status = 'Ended';
        }

        // update the subscription record
        $subscription->subscription_fee = $subscriptionFee;
        $subscription->payment_status = 'Paid';
        $subscription->start_date = $startDate;
        $subscription->end_date = $endDate;
        $subscription->status = $status;
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
        
        return redirect()->route('admin.subscriptions')->with('success', 'Subscription updated successfully.');
    }

    // delete subscription
    public function deleteSubscription($id) {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return redirect()->route('admin.subscriptions')->with('success', 'Subscription deleted successfully.');
    }

    // show ending and ended members subscription sa expiring table
    public function showEndingAndEndedSubs() {
        $subscriptions = Subscription::whereIn('status', ['Ending', 'Ended'])->get();
        return view('admin.subscriptions.expiring', compact('subscriptions'));
    }

    // renew form
    public function renewSubsForm($id) {
        $subscription = Subscription::findOrFail($id);
        return view('admin.subscriptions.renewsubs', compact('subscription'));
    }

    // renew ending and ended members subscription
    public function renewSubscriptions(Request $request, $id) {
        $subscription = Subscription::findOrFail($id);

        $validatedData = $request->validate([
            'renewalPeriod' => 'required|integer|min:1',
        ]);

        // Calculate renewal period
        $renewalPeriod = intval($validatedData['renewalPeriod']);

        // Calculate new end date
        $newEndDate = $subscription->end_date->copy()->addMonths($renewalPeriod);

        // Copy old end date as updated start date
        $newStartDate = $subscription->end_date->copy();

        // Update subscription
        $subscription->start_date = $newStartDate;
        $subscription->end_date = $newEndDate;
        $subscription->save();

        // Update subscription status
        $this->updateSubscriptionStatus($subscription);

        return redirect()->route('admin.subscriptions.expiring')->with('success', 'Subscription renewed successfully.');   
    }

    private function updateSubscriptionStatus($subscription) {
        $currentDate = Carbon::now();
        $endDate = Carbon::parse($subscription->end_date);

        if ($currentDate->gt($endDate)) {
            $subscription->status = 'Ended';
        } elseif ($currentDate->diffInDays($endDate) <= 7) {
            $subscription->status = 'Ending';
        } else {
            $subscription->status = 'Ongoing';
        }

        $subscription->save();
    }
    
}
