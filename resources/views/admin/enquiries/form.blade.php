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
    <select type="select" class="form-control" id="gender" name="gender" required>
        <option value="">Select Gender</option>
        <option value="Male" {{ $enquiry->gender == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ $enquiry->gender == 'Female' ? 'selected' : '' }}>Female</option>
    </select>
</div>
<div class="form-group2">
    <label for="occupation">Occupation:</label>
    <select type="text" class="form-control" id="occupation" name="occupation" required>
        <option value="">Choose Occupation</option>
        <option value="Student" {{ $enquiry->occupation == 'Student' ? 'selected' : '' }}>Student</option>
        <option value="Employeed" {{ $enquiry->occupation == 'Employeed' ? 'selected' : '' }}>Employeed</option>
        <option value="Unemployed" {{ $enquiry->occupation == 'Unemployed' ? 'selected' : '' }}>Unemployed</option>
        <option value="Retired" {{ $enquiry->occupation == 'Retired' ? 'selected' : '' }}>Retired</option>
    </select>
</div>
<div class="form-group1">
    <label for="start_by">Start By:</label>
    <input type="date" class="form-control" id="start_by" name="start_by" value="{{ old('start_by', $enquiry->start_by ?? '') }}" required>
</div>
<div class="form-group2">
    <label for="reason">Reason to join</label>
    <select type="text" class="form-control" id="reason" name="reason" required>
        <option value="">Choose Reason</option>
        <option value="Lowers blood pressure" {{ $enquiry->reason == 'Lowers blood pressure' ? 'selected' : '' }}>Lowers blood pressure</option>
        <option value="Improves flexibility" {{ $enquiry->reason == 'Improves flexibility' ? 'selected' : '' }}>Improves flexibility</option>
        <option value="Boost confidence" {{ $enquiry->reason == 'Boost confidence' ? 'selected' : '' }}>Boost confidence</option>
        <option value="Stress relief" {{ $enquiry->reason == 'Stress relief' ? 'selected' : '' }}>Stress relief</option>
        <option value="Mental Health" {{ $enquiry->reason == 'Mental Health' ? 'selected' : '' }}>Mental Health</option>
        <option value="Weight Loss" {{ $enquiry->reason == 'Weight Loss' ? 'selected' : '' }}>Weight Loss</option>
    </select>
</div>