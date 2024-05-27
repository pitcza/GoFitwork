<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/subs/renew.css')}}">


    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="content">
                    <div class="header1">
                    <h1>Renew Subscription</h1>
                    <a class="back" href="{{ route('admin.subscriptions.expiring') }}">Back</a>
                </div>
                    <div class="card">
                    <div class="card-header">Subscription Details</div>
                        <div class="card-body">
                            <p>Name: <span>{{ $subscription->firstname }} {{ $subscription->lastname }}</span></p>
                            <p>Status: <span>{{ $subscription->status }}</span></p>
                            <p>Start Date: <span>{{ $subscription->start_date->format('F j, Y') }}</span></p>
                            <p>End Date: <span>{{ $subscription->end_date->format('F j, Y') }}</span></p>
                            <form action="{{ route('admin.subscription.renew', $subscription->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="renewalPeriod">Renewal Period (months):</label>
                                    <input type="number" class="form-control" id="renewalPeriod" name="renewalPeriod" min="1" value="1" required>
                                </div>
                                <button type="submit" class="button">Renew</button>
                            </form>
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