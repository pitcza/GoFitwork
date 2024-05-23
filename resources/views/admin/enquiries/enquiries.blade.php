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
                <div class="card">
                    <div class="card-header">
                        <h1>Enquiries</h1>
                        <a href="{{ route('admin.enquiries.create') }}" class="btn btn-primary">Add Enquiry</a>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success mt-2">
                            {{ $message }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Barangay</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($enquiries as $enquiry)
                                <tr>
                                    <td>{{ $enquiry->firstname }} {{ $enquiry->lastname }}</td>
                                    <td>{{ $enquiry->barangay }}</td>
                                    <td>{{ $enquiry->gender }}</td>
                                    <td>
                                        {{-- <a href="{{ route('enquiries.show', $enquiry->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('enquiries.edit', $enquiry->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form> --}}
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <form action="{{ route('admin.enquiries.approve', $enquiry->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Approve</button>
                                            </form>
                                            <button type="button" class="btn btn-outline-primary"> <a href="{{ route('admin.enquiries.edit', $enquiry->id) }}"> Edit </a> </button>
                                            <form action="{{ route('admin.enquiries.delete', $enquiry->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-primary">Delete</button>
                                            </form>
                                            <button type="button" class="btn btn-outline-primary"> <a href="{{ route('admin.enquiries.view', $enquiry->id) }}"> View </a> </button>
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
                               