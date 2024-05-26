<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// models
use App\Models\Enquiry;
use App\Models\Subscription;
use App\Models\Member;

class EnquiryController extends Controller
{
    // get enquiries
    public function getEnquiries() {        
        $enquiries = Enquiry::all();
        $enquiries = Enquiry::orderBy('created_at', 'desc')->get();
        return view('admin.enquiries.enquiries', compact('enquiries'));
    }

    // get enquiry by id
    public function getEnquiry($id) {
        $enquiry = Enquiry::findOrFail($id);
        return view('admin.enquiries.view', compact('enquiry'));
    }

    // create enquiry
    public function createEnquiry() {
        return view('admin.enquiries.create');
    }

    // add or store enquiry process
    public function addEnquiry(Request $request) {
        $request->validate([
            'firstname' => 'required|string|max:155',
            'lastname' => 'required|string|max:155',
            'email' => 'required|string|max:155',
            'barangay' => 'required|string|max:255',
            'gender' => 'required|string|max:55',
            'occupation' => 'required|string|max:255',
            'start_by' => 'required|date',
            'reason' => 'required|string|max:512',
        ]);

        Enquiry::create($request->all());
        return redirect()->route('admin.enquiries')->with('success', 'Inquiry added successfully.');
    }

    // edit enquiry
    public function edit($id) {
        $enquiry = Enquiry::findOrFail($id);
        return view('admin.enquiries.edit', compact('enquiry'));
    }

    // update enquiry process
    public function updateEnquiry(Request $request, $id) {
        \Log::info('Request data: ', $request->all());

        $request->validate([
            'firstname' => 'required|string|max:155',
            'lastname' => 'required|string|max:155',
            'email' => 'required|string|max:155',
            'barangay' => 'required|string|max:255',
            'gender' => 'required|string|max:55',
            'occupation' => 'required|string|max:255',
            'start_by' => 'required|date',
            'reason' => 'required|string|max:512',
        ]);

        $enquiry = Enquiry::findOrFail($id);

        // log enquiry data before update
        \Log::info('Enquiry data before update: ', $enquiry->toArray());
        $enquiry->update($request->all());

        // log enquiry data after update
        \Log::info('Enquiry data after update: ', $enquiry->toArray());
        return redirect()->route('admin.enquiries')->with('success', 'Inquiry updated successfully.');
    }

    // approve enquiry -> store to subscriptions table
    public function approveEnquiry(Enquiry $enquiry) {
        // check if enquiry is already approved
        if ($enquiry->status === 'approved') {
            return redirect()->back()->with('error', 'Inquiry has already been approved.');
        }

        // shift data to subscriptions table with payment_status as "Pending"
        $subscriptionData = $enquiry->toArray();
        $subscriptionData['payment_status'] = 'Pending';

        // shift data to subscriptions table
        Subscription::create($subscriptionData);

        // dekete the enquiry when approved
        $enquiry->delete();
        return redirect()->back()->with('success', 'Inquiry approved successfully.');
    }

    // delete enquiry
    public function deleteEnquiry($id) {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->route('admin.enquiries')->with('success', 'Inquiry deleted successfully.');
    }
}
