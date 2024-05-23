<div class="form-group">
    <label for="firstname">First Name:</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $enquiry->firstname ?? '') }}" required>
</div>
<div class="form-group">
    <label for="lastname">Last Name:</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $enquiry->lastname ?? '') }}" required>
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $enquiry->email ?? '') }}" required>
</div>
<div class="form-group">
    <label for="barangay">Barangay:</label>
    <input type="text" class="form-control" id="barangay" name="barangay" value="{{ old('barangay', $enquiry->barangay ?? '') }}" required>
</div>
<div class="form-group">
    <label for="gender">Gender:</label>
    <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender', $enquiry->gender ?? '') }}" required>
</div>
<div class="form-group">
    <label for="occupation">Occupation:</label>
    <input type="text" class="form-control" id="occupation" name="occupation" value="{{ old('occupation', $enquiry->occupation ?? '') }}" required>
</div>
<div class="form-group">
    <label for="start_by">Start By:</label>
    <input type="date" class="form-control" id="start_by" name="start_by" value="{{ old('start_by', $enquiry->start_by ?? '') }}" required>
</div>
<div class="form-group">
    <label for="reason">Start By:</label>
    <input type="text" class="form-control" id="reason" name="reason" value="{{ old('reason', $enquiry->reason ?? '') }}" required>
</div>