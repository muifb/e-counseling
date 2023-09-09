<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProfileEdit extends Component
{
    use WithFileUploads;

    public $user;
    public $nama_guru, $nuptk, $alamat, $no_telp, $oldImage;
    public $photo;

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->oldImage = $this->user->photo;
        $this->nama_guru = $this->user->guru->nama_guru;
        $this->nuptk = $this->user->guru->nuptk;
        $this->alamat = $this->user->guru->alamat;
        $this->no_telp = $this->user->guru->no_telp;
    }

    public function render()
    {
        return view('livewire.profile-edit');
    }

    public function update()
    {

        $dataUpdate = [
            'nama_guru'  => 'required|min:3|max:255',
            'alamat'  => 'required|min:3|max:255',
            'no_telp'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ];

        if ($this->photo) {
            $dataUpdate['photo'] = 'image|max:1024';
        }

        if ($this->nuptk != $this->user->guru->nuptk) {
            $dataUpdate['nuptk']  = 'required|unique:guru';
        }
        $validatedData = $this->validate($dataUpdate);
        // return $validatedData['nama_guru'];
        if ($this->photo) {
            if ($this->oldImage) {
                Storage::delete($this->oldImage);
            }
            $validatedData['photo'] = $this->photo->store('photo-user');
            // $validatedData['photo'] = Storage::putFile('photo-user', $this->file('photo'));
        }

        $oldFile = Storage::files('livewire-tmp');
        if ($oldFile) {
            foreach ($oldFile as $file) {
                Storage::delete($file);
            }
        }

        if ($this->nuptk != $this->user->guru->nuptk) {
            Guru::where('id', $this->user->guru->id)
                ->update([
                    'nama_guru' => $validatedData['nama_guru'],
                    'nuptk' => $validatedData['nuptk'],
                    'alamat' => $validatedData['alamat'],
                    'no_telp' => $validatedData['no_telp']
                ]);
            if ($this->photo) {
                User::where('id', $this->user->id)
                    ->update([
                        'username' => $validatedData['nuptk'],
                        'nama' => $validatedData['nama_guru'],
                        'photo' => $validatedData['photo']
                    ]);
                return redirect('/dashboard/profile')->with('success', 'Profile Success Updated!');
            }
            User::where('id', $this->user->id)
                ->update([
                    'username' => $validatedData['nuptk'],
                    'nama' => $validatedData['nama_guru']
                ]);
            return redirect('/dashboard/profile')->with('success', 'Profile Success Updated!');
        }

        Guru::where('id', $this->user->guru->id)
            ->update([
                'nama_guru' => $validatedData['nama_guru'],
                'alamat' => $validatedData['alamat'],
                'no_telp' => $validatedData['no_telp']
            ]);
        if ($this->photo) {
            User::where('id', $this->user->id)
                ->update([
                    'nama' => $validatedData['nama_guru'],
                    'photo' => $validatedData['photo']
                ]);
            return redirect('/dashboard/profile')->with('success', 'Profile Success Updated!');
        }
        User::where('id', $this->user->id)
            ->update([
                'nama' => $validatedData['nama_guru']
            ]);
        return redirect('/dashboard/profile')->with('success', 'Profile Success Updated!');
    }

    public function clear()
    {
        $oldFile = Storage::files('livewire-tmp');
        foreach ($oldFile as $file) {
            Storage::delete($file);
        }
        return redirect('/dashboard/profile')->with('success', 'Old Images Success Deleted!');
    }
}
