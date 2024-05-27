@include('admin.gofitwork')
<link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
<body>
    <div class="content">

        <nav class="sidebar-content">
            <div class="logo-title">
                <div class="logo">
                    <img src="{{asset('assets/logo.png')}}">
                </div>
                <div class="gym-name"> 
                    <h1> Gofitwork</h1>
                </div>
            </div>

            <div class="sidebar-tabs">
                <ul class="tabs">
                    <li class="tab">
                        <a class="tab-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard')}}">
                        <span class="tab-icon"> <i class='bx bxs-dashboard'></i> </span>
                        <span class="tab-name">Dashboard</span>
                        </a>
                    </li>

                    <li class="tab">
                        <a class="tab-link {{ request()->routeIs('admin.enquiries', 'admin.enquiry.create', 'admin.enquiry.edit', 'admin.enquiries.view') ? 'active' : '' }}" href="{{ route('admin.enquiries')}}">
                        <span class="tab-icon"> <i class='bx bxs-info-circle' ></i> </span>
                        <span class="tab-name">Inquiries</span>
                        </a>
                    </li>

                    <li class="tab">
                        <a class="tab-link {{ request()->routeIs('admin.members', 'admin.member.view') ? 'active' : '' }}" href="{{ route('admin.members')}}">
                        <span class="tab-icon"> <i class='bx bxs-user-detail' ></i> </span>
                        <span class="tab-name"> Members </span>
                        </a>
                    </li>

                    <li class="tab">
                        <a class="tab-link {{ request()->routeIs('admin.subscriptions', 'admin.subscription.create', 'admin.subscriptions.expiring', 'admin.subscription.renewsubs', 'admin.subscription.edit', 'admin.subscription.view') ? 'active' : '' }}" href="{{ route('admin.subscriptions')}}">
                        <span class="tab-icon"> <i class='bx bxs-wallet' ></i> </span>
                        <span class="tab-name"> Subscriptions </span>
                        </a>
                    </li>
                </ul>
                <div class="logoutbtn">
                    <div class="logout" routerLink="/login">
                        <span> <a href="{{ route('admin.logout')}}"> <i class='bx bx-log-out bx-rotate-180' ></i> </a> </span>
                    </div>
                </div> 
            </div>
        </nav>
    </div>
</body>