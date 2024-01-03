<?php

namespace App\Http\Controllers;
use App\Models\Reports;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/welcome')->with ('status', 'account-deleted');
    }
   
   
    public function userProfile()
{
    try {
        $user = auth()->user(); // Fetch the authenticated user

        $reportSummary = Reports::select('status', \DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        \Log::info('Report Summary: ' . print_r($reportSummary, true));

        return view('user.userProfile', ['user' => $user, 'reportSummary' => $reportSummary]);
    } catch (\Exception $e) {
        \Log::error('Error fetching report summary: ' . $e->getMessage());
        return view('user.userProfile', ['user' => null, 'reportSummary' => []]);
    }
}
public function updateProfile(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . auth()->id(),
        'address' => 'required|string|max:255',
        'age' => 'required|integer|min:18',
        'gender' => 'required|in:male,female',
        'birthday' => 'required|date',
        'university_address' => 'required|string|max:255',
        'course' => 'required|string|max:255',
        'year' => 'required|string|max:255',
        // Add more validation rules as needed
    ]);

    // Update the user profile based on the form data
    auth()->user()->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'address' => $request->input('address'),
        'age' => $request->input('age'),
        'gender' => $request->input('gender'),
        'birthday' => $request->input('birthday'),
        'university_address' => $request->input('university_address'),
        'course' => $request->input('course'),
        'year' => $request->input('year'),
        // Update other fields as needed
    ]);

    // Redirect back to the profile page or show a success message
    return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
}

}
