<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    /**
     * Self-registration is disabled — accounts are provisioned via secure invitation only.
     */
    public function create(): RedirectResponse
    {
        return redirect()->route('login')
            ->with('status', 'Account registration is by invitation only. Contact your administrator.');
    }

    /**
     * Block direct POST attempts to the registration endpoint.
     */
    public function store(Request $request): RedirectResponse
    {
        abort(403, 'Self-registration is disabled. Accounts are provisioned via secure invitation.');
    }
}
