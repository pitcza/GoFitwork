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
                <div class="container">
                    <div class="header1">
                        <h1> subscription </h1>
                        <button class="action-btn">Expiring</button>
                    </div>
                    <table class="content-table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Payed On</th>
                            <th class="action">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tbody>
                                @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription->id }}</td>
                                    <td>{{ $subscription->firstname }} {{ $subscription->lastname }}</td>
                                    <td>{{ $subscription->subscription_fee }}</td>
                                    <td>{{ optional($subscription->created_at)->format('F d, Y') }}</td>
                                    <td>
                                        <div class="form-group">
                                        <button class="button"><a href="{{ route('admin.subscription.create', $subscription->id) }}">Add</a></button>
                                        <form action="{{ route('admin.subscriptions.delete', $subscription->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button">Delete</button>
                                        </form>
                                        <button type="button" class="button"> <a href=""> View </a> </button>
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