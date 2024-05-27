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
                <div class="container mt-5">
                    <h2>Renew Subscription</h2>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Subscription Details</h5>
                            <p class="card-text"><strong>Name:</strong> {{ $subscription->fisrtname }} {{ $subscription->lastname }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ $subscription->status }}</p>
                            <p class="card-text"><strong>Start Date:</strong> {{ $subscription->start_date->format('Y-m-d') }}</p>
                            <p class="card-text"><strong>End Date:</strong> {{ $subscription->end_date->format('Y-m-d') }}</p>
                            <form action="{{ route('admin.subscription.renew', $subscription->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="renewalPeriod">Renewal Period (months):</label>
                                    <input type="number" class="form-control" id="renewalPeriod" name="renewalPeriod" min="1" value="1" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Renew Subscription</button>
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