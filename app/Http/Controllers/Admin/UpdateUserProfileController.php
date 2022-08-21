<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use function PHPSTORM_META\map;

class UpdateUserProfileController extends Controller
{
    public function edit()
    {
        return view('admin.user-profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        //$user = Auth::user();
        $user = $request->user();
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 
                'string', 'email', 
                'max:255', 
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update( $request->all() );

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Profile updated successfully');
    }
}
