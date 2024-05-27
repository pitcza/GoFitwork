<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/members/view.css')}}">


    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="header1">
                    <h1>Member Informations</h1>
                    <a class="back">Back</a>
                </div>
                
                    <div class="card">
                    <div class="card-header"> Personal Details</div>
                        <div class="card-body">
                            <p>First Name: <span>{{ $member->firstname }}</span></p>
                            <p>Last Name: <span>{{ $member->lastname }}</span></p>
                            <p>Email: <span>{{ $member->email }}</span></p>
                            <p>Barangay: <span>{{ $member->barangay }}</span></p>
                            <p>Gender: <span>{{ $member->gender }}</span></p>
                            <p>Occupation: <span>{{ $member->occupation }}</span></p>
                            <p>Reason: <span>{{ $member->reason ?: 'N/A' }}</span></p>
                            <p>Status: <span>{{ $member->status }}</span></p>
                            <p>Subscription Fee: <span>{{ $member->subscription_fee }}</span></p>
                            <p>Start Date: <span>{{ $member->start_date->format('F j, Y') }}</span></p>
                            <p>End Date: <span>{{ $member->end_date->format('F j, Y') }}</span></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SIDEBAR NATIN --}}
            <div class="sidebar-content">
                @include('admin.sidebar')
            </div>

        </div>

    </body>
</html>