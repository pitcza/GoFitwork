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
                    <h1>Edit Subscription</h1>
                    <form action="{{ route('admin.subscription.update', $subscription->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $subscription->firstname }}" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $subscription->lastname }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $subscription->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="barangay">Barangay:</label>
                            <input type="text" name="barangay" id="barangay" class="form-control" value="{{ $subscription->barangay }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <input type="text" name="gender" id="gender" class="form-control" value="{{ $subscription->gender }}" required>
                        </div>
                        <div class="form-group">
                            <label for="occupation">Occupation:</label>
                            <input type="text" name="occupation" id="occupation" class="form-control" value="{{ $subscription->occupation }}" required>
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason:</label>
                            <textarea name="reason" id="reason" class="form-control">{{ $subscription->reason }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Subscription</button>
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