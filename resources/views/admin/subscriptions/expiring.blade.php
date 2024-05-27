<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/subs/expiring.css')}}">

    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="container">
                <div class="header1">
                        <h1> Expiring Subscription </h1>
                        <a class="expiring" href="{{ route('admin.subscriptions') }}"> All </a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success mt-2">
                        {{ $message }}
                        </div>
                    @endif

                    <div class="content">
                        <table class="content-table">
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Start Date </th>
                                <th> End Date </th>
                                <th> Status </th>
                                <th class= "action"> Action </th>
                            </tr>
                            </thead>

                            @if ($subscriptions->isEmpty())
                                <p class="nodata">No data available</p>
                            @else

                            <tbody>
                            @foreach($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription->id }}</td>
                                    <td>{{ $subscription->firstname }} {{ $subscription->lastname }}</td>
                                    <td>{{ $subscription->start_date->format('F j, Y') }}</td>
                                    <td>{{ $subscription->end_date->format('F j, Y') }}</td>
                                    <td>{{ $subscription->status }}</td>
                                    <td> 
                                        <a href="{{ route('admin.subscription.renewsubs', $subscription->id) }}" class="buttons">Renew</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            
                            @endif

                        </table>
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