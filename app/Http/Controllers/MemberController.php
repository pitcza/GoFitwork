<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// model
use App\Models\Member;

class MemberController extends Controller
{
    // view members tab
    public function viewTab() {        
        return view('admin.members.members');
    }

    // get members
    public function getMembers() {        
        $members = Member::all();
        return view('admin.members.members', compact('members'));
    }
}
