<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/subs/create.css')}}">

    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="container">
                    <div class="title">Add Subscription</div>
                    <form action="{{ route('admin.subscription.add', $subscription->id) }}" method="POST">
                        @csrf
                        <div class="subscription-details">
                            <div class="input-box">
                                <span class="details">ID</span>
                                <input type="number" value="{{ $subscription->id }}" readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">Name</span>
                                <input type="text" value="{{ $subscription->firstname }} {{ $subscription->lastname }}" readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">Amount</span>
                                <input type="text" name="subscription_fee" id="subscription_fee" value="1,500" readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">Start Date</span>
                                <input type="date" name="start_date" id="start_date" value="{{ now()->toDateString() }}">
                            </div>
                            <div class="input-box">
                                <span class="details">Duration (in months)</span>
                                <input type="number" name="duration" id="duration" min="1" required>
                            </div>
                            <div class="input-box">
                                <span class="details">End Date</span>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" readonly>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Add">
                        </div>
                    </form>
                </div>                

            </div>

            {{-- SIDEBAR NATIN --}}
            <div class="sidebar-content">
                @include('admin.sidebar')
            </div>

        </div>

    </body>
</html>