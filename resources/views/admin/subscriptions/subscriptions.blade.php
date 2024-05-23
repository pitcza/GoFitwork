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
                <div class="container">
                    <h1>Subscriptions</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Barangay</th>
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $subscription)
                            <tr>
                                <td>{{ $subscription->id }}</td>
                                <td>{{ $subscription->firstname }}</td>
                                <td>{{ $subscription->lastname }}</td>
                                <td>{{ $subscription->email }}</td>
                                <td>{{ $subscription->barangay }}</td>
                                <!-- Add more columns as needed -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $subscriptions->links() }} <!-- Pagination links --> --}}
                </div>
            </div>

            {{-- SIDEBAR NATIN --}}
            <div class="sidebar-content">
                @include('admin.sidebar')
            </div>

        </div>

    </body>
</html>