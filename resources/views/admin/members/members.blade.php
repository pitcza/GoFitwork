<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/members/table.css')}}">

    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="content">
                    <div class="header1">
                        <h1>Members</h1>
                    </div>

                    @if ($message = Session::get('success'))
                            <div class="alert alert-success mt-2">
                            {{ $message }}
                            </div>
                    @endif

                    <div class="content1">
                        <table class="content-table">
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Amount </th>
                                <th> Member Since </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscriptions as $subscription)
                                <tr>
                                <td>{{ $subscription->id }}</td>
                                    <td>{{ $subscription->firstname }} {{ $subscription->lastname }}</td>
                                    <td>{{ $subscription->subscription_fee }}</td>
                                    <td>{{ optional($subscription->created_at)->format('F d, Y') ?? 'N/A' }}</td>
                                    <td>{{ $subscription->status }}</td>
                                    <td> <a class="buttons" href="{{ route('admin.member.view', $subscription->id) }}"><i class='bx bxs-low-vision'></i></a> </td>
                                </tr>
                            @endforeach
                            </tbody>
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