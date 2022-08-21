<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswordController extends Controller
{
    public function edit()
    {
        return view('admin.user-profile.password');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'string', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->forceFill([
            'password' => Hash::make($request->post('password')),
            'remember_token' => null,
        ])
        ->save();

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Password updated successfully');
        
       
    }
}
