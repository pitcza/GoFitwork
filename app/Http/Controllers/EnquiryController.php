<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// added
use App\Models\Enquiry;
use App\Models\Subscription;
use App\Models\Member;

class EnquiryController extends Controller
{
    // view enquiries tab
    public function viewTab() {        
        return view('admin.enquiries.enquiries');
    }

    // get enquiries
    public function getEnquiries() {        
        $enquiries = Enquiry::all();
        return view('admin.enquiries.enquiries', compact('enquiries'));
    }

    //get enquiry by id
    public function getEnquiry($id) {
        $enquiry = Enquiry::findOrFail($id);
        return view('admin.enquiries.view', compact('enquiry'));
    }

    // create enquiry
    public function create() {
        return view('admin.enquiries.create');
    }

    // add or store enquiry process
    public function addEnquiry(Request $request)
    {
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

        return redirect()->route('admin.enquiries')->with('success', 'Enquiry created successfully.');
    }

    // edit enquiry
    public function edit($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return view('admin.enquiries.edit', compact('enquiry'));
    }

    // update enquiry
    public function updateEnquiry(Request $request, $id)
    {
        // log request data
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

        return redirect()->route('admin.enquiries')->with('success', 'Enquiry updated successfully.');
    }

    public function approveEnquiry($id) {
        $enquiry = Enquiry::findOrFail($id);

        // Create a subscription record
        $subscription = Subscription::create([
            'enquiry_id' => $enquiry->id,
            'firstname' => $enquiry->firstname,
            'lastname' => $enquiry->lastname,
            'email' => $enquiry->email,
            'barangay' => $enquiry->barangay,
            'gender' => $enquiry->gender,
            'occupation' => $enquiry->occupation,
            'reason' => $enquiry->reason,
        ]);

        // delete the enquiry after approval
        $enquiry->delete();

        return redirect()->route('admin.enquiries')->with('success', 'Enquiry approved successfully.');
    }

    public function deleteEnquiry($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();

        return redirect()->route('admin.enquiries')->with('success', 'Enquiry deleted successfully.');
    }
}
