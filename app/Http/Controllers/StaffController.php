<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class StaffController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.dashboard.staffToko.index', [
            'user' => User::all()
        ]);
    }
    
    public function actionregister(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Session::flash('pesan', 'Register akun anda berhasil');
        return redirect('/admin/petugas');
    }
    public function destroy($id,User $User)
    {
        //
        User::destroy($id);
        return redirect('/admin/petugas')->with('pesan', 'Akun User Berhasil Dihapus');
    }

}
