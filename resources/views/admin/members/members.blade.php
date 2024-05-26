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
                <div class="container">
                    <div class="header1">
                        <h1>Members</h1>
                    </div>
                    <div class="content">
                        <table class="content-table">
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Amount </th>
                                <th> Member Since </th>
                                <th> Status </th>
                                <th> Total Subscriptions </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $member->subscription_id }}</td>
                                    <td>{{ $member->firstname }} {{ $member->lastname }}</td>
                                    <td>{{ optional($member->created_at)->format('F d, Y') }}</td>
                                    <td>{{ $member->start_date }}</td>
                                    <td>{{ $member->status }}</td>
                                    <td>{{ $member->member_count }}</td>
                                    <td><button class="delete-btn">Action</button></td>
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