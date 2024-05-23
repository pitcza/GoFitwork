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
                    <h1>Edit Enquiry</h1>
                    <form action="{{ route('admin.enquiries.update', $enquiry->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.enquiries.form')
                        <button type="submit" class="btn btn-primary">Update</button>
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