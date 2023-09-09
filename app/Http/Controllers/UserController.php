<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function resetPassword(Request $request, User $user)
    {
        // return $user;
        $validatedData = $request->validate(['password'  => 'required|min:5|max:255']);

        $validatedData['password']  =   Hash::make($validatedData['password']);
        User::where('id', $user->id)
            ->update($validatedData);
        // $request->session()->flash('success', 'Reset Password User Success!');
        return back()->with('success', 'Reset Password User Success!');
    }
}
