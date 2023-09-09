<div class="pt-2">
    <!-- Profile Edit Form -->
    <form wire:submit.prevent="update" class="row g-3 needs-validation" novalidate>
        <div class="row mb-3">
            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
            <div class="col-md-8 col-lg-9">
                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" alt="Profile" class="img-preview rounded-3 upload">
                @elseif ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile"
                        class="img-preview rounded-3 upload">
                @else
                    <img src="/img/profile.jpg" alt="Profile" class="rounded-3 upload">
                @endif
                {{-- <img src="/img/profile.jpg" alt="Profile" class="upload"> --}}
                <div class="pt-2">
                    <input type="file" id="photo" style="display:none;visibility:none;" wire:model="photo">
                    <label class="btn btn-primary btn-sm" title="Upload new profile image" for="photo">
                        <i class="bi bi-upload"></i></label>
                </div>
                @error('photo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="nama_guru" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
            <div class="col-md-8 col-lg-9">
                <input wire:model.defer="nama_guru" type="text"
                    class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru" required>
                @error('nama_guru')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="nuptk" class="col-md-4 col-lg-3 col-form-label">NIDN</label>
            <div class="col-md-8 col-lg-9">
                <input wire:model.defer="nuptk" type="text"
                    class="form-control @error('nuptk') is-invalid @enderror" id="nuptk" required>
                @error('nuptk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Address</label>
            <div class="col-md-8 col-lg-9">
                <input wire:model.defer="alamat" type="text"
                    class="form-control @error('alamat') is-invalid @enderror" id="alamat" required>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="no_telp" class="col-md-4 col-lg-3 col-form-label">Phone</label>
            <div class="col-md-8 col-lg-9">
                <input wire:model.defer="no_telp" type="text"
                    class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" required>
                @error('no_telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form><!-- End Profile Edit Form -->
    {{-- <div class="text-center my-2">
        <button wire:click="clear" class="btn btn-danger">Hapus File</button>
    </div> --}}
</div>
