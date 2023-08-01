<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class GantiPasswordController extends Controller
{
    //
    public function showChangePasswordForm()
    {
        return view('admin.dashboard.staffToko.gantipassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');

        if (Hash::check($currentPassword, $user->password)) {
            $user->update([
                'password' => Hash::make($newPassword),
            ]);

            return redirect()->back()->with('pesan', 'Password Anda Sudah Diganti');
        } else {
            return redirect()->back()->with('pesan', 'Password saat ini salah.');
        }
    }
}
