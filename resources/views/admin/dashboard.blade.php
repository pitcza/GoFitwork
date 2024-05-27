<!doctype html>
<html lang="en">
    @include('admin.gofitwork')

    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <body>
        <div class="content">
            <div class="header"></div>

                <div class="body-content">
                    <div class="content"> 

                        <div class="cards">
                            <div class="card1">
                                <div class="icon-case1">
                                <!-- <img src="assets/images/GC.png"> -->
                                </div>
                                <div class="box1">
                                    <h1 class="members"> {{ $totalMembers }} </h1>
                                    <h3>Joined Members </h3>
                                </div>
                            </div>
                    
                            <a class="card1">
                                <div class="icon-case2">
                                <!--- <img src="assets/images/CCS.png"> -->
                                </div>
                                <div class="box1">
                                    @foreach ($monthlyMemberCounts as $count)
                                    <h1 class="members"> {{ $count->month ?? '0' }} </h1>
                                    @endforeach
                                    <h3>Monthly Joined </h3>
                                </div>
                            </a>
                            
                            <a class="card1">
                                <div class="icon-case3">
                                    <!-- <img src="assets/images/CEAS.png" alt=""> ---> 
                                </div>
                                <div class="box1">
                                    <h1> {{ $totalEnquiries }} </h1>
                                    <h3>Total Enquiries</h3>
                                </div>
                            </a>
                        
                    
                
                        <!------------------- TABLE ---------------->
                
                        <div class="table">
                            <div class="container"> 
                                <section class="table">
                                    <table class="content-table">
                                        <thead class="table-head">
                                            <tr>
                                                <th> Name </th>
                                                <th> Gender </th>
                                                <th> Status </th>
                                                <th> Member Since </th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                @foreach($subscriptions as $subscription)
                                                    <tr>
                                                        <td>{{ $subscription->firstname }} {{ $subscription->lastname }}</td>
                                                        <td>{{ $subscription->gender }}</td>
                                                        <td>{{ $subscription->status }}</td>
                                                        <td>{{ optional($subscription->created_at)->format('F d, Y') ?? 'N/A' }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="sidebar-content">
                    @include('admin.sidebar')
                </div>

        </div>
    </body>
</html>
                               