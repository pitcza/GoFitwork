<!doctype html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/subs/edit.css')}}">


    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="container">
                    <div class="header1">
                    <h1>Edit Subscription</h1>
                </div>
                <div class="form-content"> 
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
                        <div class="form-group1">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $subscription->email }}" required>
                        </div>
                        <div class="form-group2">
                            <label for="barangay">Barangay:</label>
                            <input type="text" name="barangay" id="barangay" class="form-control" value="{{ $subscription->barangay }}" required>
                        </div>
                        <div class="form-group1">
                            <label for="gender">Gender:</label>
                            <select type="select" class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ $subscription->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $subscription->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="form-group2">
                            <label for="occupation">Occupation:</label>
                            <select type="text" class="form-control" id="occupation" name="occupation" required>
                                <option value="">Choose Occupation</option>
                                <option value="Student" {{ $subscription->occupation == 'Student' ? 'selected' : '' }}>Student</option>
                                <option value="Employeed" {{ $subscription->occupation == 'Employeed' ? 'selected' : '' }}>Employeed</option>
                                <option value="Unemployed" {{ $subscription->occupation == 'Unemployed' ? 'selected' : '' }}>Unemployed</option>
                                <option value="Retired" {{ $subscription->occupation == 'Retired' ? 'selected' : '' }}>Retired</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason to join</label>
                            <select type="text" class="form-control" id="reason" name="reason" required>
                                <option value="">Choose Reason</option>
                                <option value="Lowers blood pressure" {{ $subscription->reason == 'Lowers blood pressure' ? 'selected' : '' }}>Lowers blood pressure</option>
                                <option value="Improves flexibility" {{ $subscription->reason == 'Improves flexibility' ? 'selected' : '' }}>Improves flexibility</option>
                                <option value="Boost confidence" {{ $subscription->reason == 'Boost confidence' ? 'selected' : '' }}>Boost confidence</option>
                                <option value="Stress relief" {{ $subscription->reason == 'Stress relief' ? 'selected' : '' }}>Stress relief</option>
                                <option value="Mental Health" {{ $subscription->reason == 'Mental Health' ? 'selected' : '' }}>Mental Health</option>
                                <option value="Weight Loss" {{ $subscription->reason == 'Weight Loss' ? 'selected' : '' }}>Weight Loss</option>
                            </select>
                        </div>

                       
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