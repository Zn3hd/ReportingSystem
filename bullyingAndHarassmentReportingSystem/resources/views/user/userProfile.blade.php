<!-- Show Profile -->
<h1>Profile</h1>
<p>Name: {{ $user->name }}</p>
<!-- Edit Profile -->
<h1>Edit Profile</h1>
<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('put')

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>

    <label for="email">Email:</label>
<input type="email" name="email" value="{{ $user->email }}" required>

<label for="address">Address:</label>
<input type="text" name="address" value="{{ $user->address }}" required>

<label for="age">Age:</label>
<input type="number" name="age" value="{{ $user->age }}" required>

<label for="gender">Gender:</label>
<select name="gender" required>
    <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
    <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
    <!-- Add more options as needed -->
</select>

<label for="birthday">Birthday:</label>
<input type="date" name="birthday" value="{{ $user->birthday }}" required>

<label for="university_address">University Address:</label>
<input type="text" name="university_address" value="{{ $user->university_address }}" required>

<label for="course">Course:</label>
<input type="text" name="course" value="{{ $user->course }}" required>

<label for="year">Year:</label>
<input type="text" name="year" value="{{ $user->year }}" required>


    <!-- Add more fields as needed -->

    <button type="submit">Update Profile</button>
</form>

