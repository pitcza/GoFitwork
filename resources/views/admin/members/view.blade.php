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
                            <p><strong>First Name:</strong> {{ $subscription->firstname }}</p>
                            <p><strong>Last Name:</strong> {{ $subscription->lastname }}</p>
                            <p><strong>Email:</strong> {{ $subscription->email }}</p>
                            <p><strong>Barangay:</strong> {{ $subscription->barangay }}</p>
                            <p><strong>Gender:</strong> {{ $subscription->gender }}</p>
                            <p><strong>Occupation:</strong> {{ $subscription->occupation }}</p>
                            <p><strong>Reason:</strong> {{ $subscription->reason ?: 'N/A' }}</p>
                            <p><strong>Status:</strong> {{ $subscription->status }}</p>
                            <p><strong>Subscription Fee:</strong> {{ $subscription->subscription_fee }}</p>
                            <p><strong>Start Date:</strong> {{ $subscription->start_date->format('F j, Y') }}</p>
                            <p><strong>End Date:</strong> {{ $subscription->end_date->format('F j, Y') }}</p>
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