<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $user;
    public $password, $newPassword, $renewPassword;

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function render()
    {
        return view('livewire.change-password');
    }

    public function update()
    {
        $this->validate([
            'password'  => 'required',
            'newPassword' => 'required|min:5',
            'renewPassword' => 'required|min:5|same:newPassword'
        ]);

        if (!Hash::check($this->password, $this->user->password)) {
            return $this->addError('password', 'Current Password salah.');
        }
        if (Hash::check($this->newPassword, $this->user->password)) {
            return $this->addError('newPassword', 'New Password tidak boleh sama dengan Password Saat ini.');
        }

        User::where('id', $this->user->id)
            ->update(['password' => Hash::make($this->newPassword)]);
        return redirect('/dashboard/profile')->with('success', 'Change Password Success!');
    }
}
