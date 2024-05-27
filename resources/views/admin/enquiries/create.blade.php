<!DOCTYPE html>
<html lang="en">
    {{-- TAB TITLE AND SOURCES --}}
    @include('admin.gofitwork')
    <link rel="stylesheet" href="{{asset('css/enquiries/form.css')}}">


    <body>
        <div class="content">
            {{-- HEADER --}}
            <div class="header"></div>

            {{-- MAIN CONTENT --}}
            <div class="body-content">
                <div class="content">
                    <div class="header1">
                    <h1>Enter Inquiry Details</h1>
                    <a href="{{ route('admin.enquiries') }}" class="add-enquiries">Back</a>
                </div>
                <div class="form-content"> 
                    <form action="{{ route('admin.enquiry.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $enquiry->firstname ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $enquiry->lastname ?? '') }}" required>
                        </div>
                        <div class="form-group1">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $enquiry->email ?? '') }}" required>
                        </div>
                        <div class="form-group2">
                            <label for="barangay">Barangay:</label>
                            <input type="text" class="form-control" id="barangay" name="barangay" value="{{ old('barangay', $enquiry->barangay ?? '') }}" required>
                        </div>
                        <div class="form-group1">
                            <label for="gender">Gender:</label>
                            <select type="select" class="form-control" id="gender" name="gender" value="{{ old('gender', $enquiry->gender ?? '') }}" required>
                                <option value="">Choose Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group2">
                            <label for="occupation">Occupation:</label>
                            <select type="text" class="form-control" id="occupation" name="occupation" value="{{ old('occupation', $enquiry->occupation ?? '') }}" required>
                                <option value="">Choose Occupation</option>
                                <option value="Student">Student</option>
                                <option value="Employeed">Employeed</option>
                                <option value="Unemployed">Unemployed</option>
                                <option value="Retired">Retired</option>
                            </select>
                        </div>
                        <div class="form-group1">
                            <label for="start_by">Start By:</label>
                            <input type="date" class="form-control" id="start_by" name="start_by" value="{{ old('start_by', $enquiry->start_by ?? '') }}" required>
                        </div>
                        <div class="form-group2">
                            <label for="reason">Reason to join</label>
                            <select type="text" class="form-control" id="reason" name="reason" value="{{ old('reason', $enquiry->reason ?? '') }}" required>
                                <option value="">Choose Reason</option>
                                <option value="Lowers blood pressure">Lowers blood pressure</option>
                                <option value="Improves flexibility">Improves flexibility</option>
                                <option value="Boost confidence">Boost confidence</option>
                                <option value="Stress relief">Stress relief</option>
                                <option value="Mental Health">Mental Health</option>
                                <option value="Weight Loss">Weight Loss</option>
                            </select>
                        </div>

                        <button type="submit" class="submit">Create</button>
                </div>
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