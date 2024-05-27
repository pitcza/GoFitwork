<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/enquiries/view.css')}}">


    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="header1">
                    <h1>Inquiry Details</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        Details of Enquiry #{{ $enquiry->id }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $enquiry->firstname }} {{ $enquiry->lastname }}</h5>
                        <p class="card-text">Email: <span>{{ $enquiry->email }}</span></p>
                        <p class="card-text">Barangay: <span>{{ $enquiry->barangay }}</span></p>
                        <p class="card-text">Gender: <span>{{ $enquiry->gender }}</span></p>
                        <p class="card-text">Occupation: <span>{{ $enquiry->occupation }}</span></p>
                        <p class="card-text">Start By: <span>{{ $enquiry->start_by }}</span></p>
                        <p class="card-text">Reason: <span>{{ $enquiry->reason }}</span></p>
                        <a href="{{ route('admin.enquiries') }}" class="button">Back</a>
                        <a href="{{ route('admin.enquiry.edit', $enquiry->id) }}" class="button1">Edit</a>
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