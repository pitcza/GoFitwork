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
                            <p>First Name: <span>{{ $subscription->firstname }}</span></p>
                            <p>Last Name: <span>{{ $subscription->lastname }}</span></p>
                            <p>Email: <span>{{ $subscription->email }}</span></p>
                            <p>Barangay: <span>{{ $subscription->barangay }}</span></p>
                            <p>Gender: <span>{{ $subscription->gender }}</span></p>
                            <p>Occupation: <span>{{ $subscription->occupation }}</span></p>
                            <p>Reason: <span>{{ $subscription->reason ?: 'N/A' }}</span></p>
                            <p>Status: <span>{{ $subscription->status }}</span></p>
                            <p>Subscription Fee: <span>{{ $subscription->subscription_fee }}</span></p>
                            <p>Start Date: <span>{{ $subscription->start_date->format('F j, Y') }}</span></p>
                            <p>End Date: <span>{{ $subscription->end_date->format('F j, Y') }}</span></p>
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