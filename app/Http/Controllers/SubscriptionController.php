<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// model
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

    // show subscription
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

        // default status of member subscription
        $status = 'Ongoing';

        // check if there is one week left before the end date and update the status "Ending"
        if ($endDate->diffInDays(Carbon::now()) <= 7) {
            $status = 'Ending';
        }

        // check if end date has passed and update status to "End"
        if ($endDate->isPast()) {
            $status = 'End';
        }

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
        $member->start_date = $startDate;
        $member->end_date = $endDate;
        $member->subscription_id = $subscription->id;
        $member->status = $status; // set default status
        $member->save();

        // count the number of subscriptions for each member
        $members = Member::select('members.*', DB::raw('(SELECT COUNT(*) FROM subscriptions WHERE subscriptions.member_id = members.id) AS subscription_count'))
            ->get();

        return redirect()->route('admin.members')->with('success', 'Subscription copied to member successfully.');
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
