<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/enquiries/enquiries.css')}}">

    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="content">
                    <div class="header1"> 
                        <h1> Inquiries </h1>
                        <a href="{{ route('admin.enquiry.create') }}" class="add-enquiries">Add Inquiry</a>
                    </div>

                    @if ($message = Session::get('success'))
                            <div class="alert alert-success mt-2">
                            {{ $message }}
                            </div>
                    @endif

                    <!---------- TABLE ------------> 

                    <div class="table">
                        <table class="container">
                            <section class="table">
                                <table class="content-table">
                                    <thead class="table-head"> 
                                <tr>
                                    <th>Name</th>
                                    <th>Barangay</th>
                                    <th>Gender</th>
                                    <th class="action">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($enquiries as $enquiry)
                                <tr>
                                    <td>{{ $enquiry->firstname }} {{ $enquiry->lastname }}</td>
                                    <td>{{ $enquiry->barangay }}</td>
                                    <td>{{ $enquiry->gender }}</td>
                                    <td class="action">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <form action="{{ route('admin.enquiries.approve', $enquiry->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="button"><i class='bx bxs-add-to-queue'></i></button> 
                                            </form>
                                            <a class="buttons" href="{{ route('admin.enquiry.edit', $enquiry->id) }}"><i class='bx bxs-edit'></i></a>
                                            <form action="{{ route('admin.enquiries.delete', $enquiry->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button"><i class='bx bxs-message-square-x'></i></button>
                                            </form>
                                            <a class="buttons" href="{{ route('admin.enquiries.view', $enquiry->id) }}"><i class='bx bxs-low-vision'></i></a>
                                        </div>
                                    </td>
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
                               