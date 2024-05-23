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
                <h1>Enquiry Details</h1>
                <div class="card">
                    <div class="card-header">
                        Details of Enquiry #{{ $enquiry->id }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $enquiry->firstname }} {{ $enquiry->lastname }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $enquiry->email }}</p>
                        <p class="card-text"><strong>Barangay:</strong> {{ $enquiry->barangay }}</p>
                        <p class="card-text"><strong>Gender:</strong> {{ $enquiry->gender }}</p>
                        <p class="card-text"><strong>Occupation:</strong> {{ $enquiry->occupation }}</p>
                        <p class="card-text"><strong>Start By:</strong> {{ $enquiry->start_by }}</p>
                        <p class="card-text"><strong>Reason:</strong> {{ $enquiry->reason }}</p>
                        <a href="{{ route('admin.enquiries') }}" class="btn btn-primary">Back to Enquiries</a>
                        <a href="{{ route('admin.enquiries.edit', $enquiry->id) }}" class="btn btn-secondary">Edit</a>
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