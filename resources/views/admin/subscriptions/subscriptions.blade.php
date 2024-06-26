<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/subs/table.css')}}">

    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="content">
                    <div class="header1">
                        <h1> All Subscriptions </h1>
                        <a class="expiring" href="{{ route('admin.subscriptions.expiring') }}"> Expiring </a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success mt-2">
                        {{ $message }}
                        </div>                        
                    @elseif ($message = Session::get('error'))
                        <div class="alert alert-danger mt-2">
                        {{ $message }}
                        </div> 
                    @endif

                    <table class="content-table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th class="action">Action</th>
                          </tr>
                        </thead>

                        @if ($subscriptions->isEmpty())
                            <p class="nodata">No data available</p>
                        @else

                        <tbody>
                            @foreach ($subscriptions as $subscription)
                            <tr>
                                <td>{{ $subscription->id }}</td>
                                <td>{{ $subscription->firstname }} {{ $subscription->lastname }}</td>
                                <td> {{ $subscription->subscription_fee !== null ? $subscription->subscription_fee : 'N/A' }} </td>
                                <td>{{ $subscription->payment_status }}</td>
                                <td>
                                    <div class="form-group">
                                    <button class="buttons"><a href="{{ route('admin.subscription.create', $subscription->id) }}"><i class='bx bxs-add-to-queue'></i></a></button>
                                    <button class="buttons"><a href="{{ route('admin.subscription.edit', $subscription->id) }}"><i class='bx bxs-edit'></i></a></button>
                                    <form action="{{ route('admin.subscriptions.delete', $subscription->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="buttons"><i class='bx bxs-message-square-x'></i></button>
                                    </form>
                                    <button type="button" class="buttons"> <a href="{{ route('admin.subscription.view', $subscription->id) }}"><i class='bx bxs-low-vision'></i></a> </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        @endif
                    </table>
                </div>
            </div>

            {{-- SIDEBAR NATIN --}}
            <div class="sidebar-content">
                @include('admin.sidebar')
            </div>

        </div>

    </body>
</html>