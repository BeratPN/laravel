<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserProfileController extends Controller
{
    public function requestWriterRole(Request $request)
    {
        $user = Auth::user();
        $writerRoleName = 'writer';

        // check if writer role exists
        if (!Role::where('name', $writerRoleName)->exists()) {
            return redirect()->back()->with('error', 'writer role does not exist.');
        }

        // check if user already has writer role or higher role
        if ($user->hasRole($writerRoleName) || $user->hasRole('admin')) {
            return redirect()->back()->with('info', 'You are already a writer.');
        }

        // update user role to 'writer' role if user has 'user' role
        if ($user->hasRole('user')) {
            $user->removeRole('user');
        }

        // assign 'writer' role to user
        $user->assignRole($writerRoleName);

        // redirect back with success message
        return redirect()->back()->with('success', 'Your role has been updated to writer.');
    }

    public function requestUserRole(Request $request)
    {
        $user = Auth::user();
        $userRoleName = 'user';

        // check if user role exists
        if (!Role::where('name', $userRoleName)->exists()) {
            return redirect()->back()->with('error', 'user role does not exist.');
        }

        // check if user has admin role
        if ($user->hasRole('admin')) {
            return redirect()->back()->with('info', 'You cannot change your role.');
        }

        // check if user already has user role or higher role
        if ($user->hasRole($userRoleName)) {
            return redirect()->back()->with('info', 'You are already a user.');
        }

        // update user role to 'user' role if user has 'writer' role
        if ($user->hasRole('writer')) {
            $user->removeRole('writer');
        }

        // assign 'user' role to user
        $user->assignRole($userRoleName);

        // redirect back with success message
        return redirect()->back()->with('success', 'Your role has been updated to user.');
    }
}
