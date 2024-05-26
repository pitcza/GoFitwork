<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')

    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="container">
                    <h1>Member Details</h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Member Information</h5>
                            <p><strong>First Name:</strong> {{ $member->firstname }}</p>
                            <p><strong>Last Name:</strong> {{ $member->lastname }}</p>
                            <p><strong>Email:</strong> {{ $member->email }}</p>
                            <p><strong>Barangay:</strong> {{ $member->barangay }}</p>
                            <p><strong>Gender:</strong> {{ $member->gender }}</p>
                            <p><strong>Occupation:</strong> {{ $member->occupation }}</p>
                            <p><strong>Reason:</strong> {{ $member->reason ?: 'N/A' }}</p>
                            <p><strong>Status:</strong> {{ $member->status }}</p>
                            <p><strong>Subscription Fee:</strong> {{ $member->subscription_fee }}</p>
                            <p><strong>Start Date:</strong> {{ $member->start_date->format('F j, Y') }}</p>
                            <p><strong>End Date:</strong> {{ $member->end_date->format('F j, Y') }}</p>
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