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
                        <h1> subscription </h1>
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
                        <tbody>
                            <tbody>
                                @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription->id }}</td>
                                    <td>{{ $subscription->firstname }} {{ $subscription->lastname }}</td>
                                    <td> {{ $subscription->subscription_fee !== null ? $subscription->subscription_fee : 'Pending' }} </td>
                                    <td>{{ $subscription->payment_status }}</td>
                                    <td>
                                        <div class="form-group">
                                        <button class="button"><a href="{{ route('admin.subscription.create', $subscription->id) }}"><i class='bx bxs-add-to-queue'></i></a></button>
                                        <a class="button" href="{{ route('admin.subscription.edit', $subscription->id) }}">E</a>
                                        <form action="{{ route('admin.subscriptions.delete', $subscription->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="buttons"><i class='bx bxs-message-square-x'></i></button>
                                        </form>
                                        <button type="button" class="button"> <a href=""><i class='bx bxs-low-vision'></i></a> </button>
                                        <!-- Add more actions as needed -->
                                        </div>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </tbody>
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