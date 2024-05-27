<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/enquiries/edit.css')}}">


    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="content">
                    <div class="header1">
                    <h1>Edit Inquiry</h1>
                </div>
                <div class="form-content"> 
                    <form action="{{ route('admin.enquiry.update', $enquiry->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.enquiries.form')
                        <button type="submit" class="update">Update</button>
                    </form>
                </div>
            </div>

            {{-- SIDEBAR NATIN --}}
            <div class="sidebar-content">
                @include('admin.sidebar')
            </div>

        </div>

    </body>
</html>