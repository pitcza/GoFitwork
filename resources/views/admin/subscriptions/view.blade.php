<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/subs/view.css')}}">

    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
            <div class="header1">
                    <h1>Subscription Details</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        Details of Subscription #{{ $subscription->id }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $subscription->firstname }} {{ $subscription->lastname }}</h5>
                        <p class="card-text">Email: <span>{{ $subscription->email }}</span></p>
                        <p class="card-text">Barangay: <span>{{ $subscription->barangay }}</span></p>
                        <p class="card-text">Gender: <span>{{ $subscription->gender }}</span></p>
                        <p class="card-text">Occupation: <span>{{ $subscription->occupation }}</span></p>
                        <p class="card-text">Reason: <span>{{ $subscription->reason }}</span></p>
                        <p class="card-title">Subscription Fee: <span>{{ $subscription->subscription_fee !== null ? $subscription->subscription_fee : 'N/A' }}</span></p>
                        <p class="card-title">Payment Status: <span>{{ $subscription->payment_status }}</span></p>
                        <p class="card-title">Status: <span>{{ $subscription->status !== null ? $subscription->status : 'No Date Scheduled' }}</span></p>
                        <a href="{{ route('admin.subscriptions') }}" class="button">Back</a>
                        <a href="{{ route('admin.subscription.edit', $subscription->id) }}" class="button1">Edit</a>
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