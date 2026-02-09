<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class InvitationController extends Controller
{
    public function showRegistrationForm($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

        if ($invitation->isExpired()) {
            return abort(403, 'This invitation link has expired. Please contact the administrator.');
        }

        return view('invitations.register', compact('invitation'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'token' => 'required|exists:invitations,token',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $invitation = Invitation::where('token', $request->token)->firstOrFail();

        if ($invitation->isExpired()) {
            return abort(403, 'This invitation link has expired.');
        }

        $employee = Employee::findOrFail($invitation->employee_id);

        // Create the User
        $user = User::create([
            'name' => $employee->full_name,
            'email' => $invitation->email,
            'password' => Hash::make($request->password),
            'role' => $employee->system_role,
            'directorate_id' => $invitation->directorate_id,
        ]);

        // Clean up invitation
        $invitation->delete();

        // Log in the user
        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'Account established successfully. Welcome to the BETin PMS.');
    }
}
