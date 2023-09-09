<div class="pt-3">
    <!-- Change Password Form -->
    <form wire:submit.prevent="update" class="row g-3 needs-validation" novalidate>
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-lg-3 col-form-label">Current
                Password</label>
            <div class="col-md-8 col-lg-9">
                <input wire:model.defer="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" id="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
            <div class="col-md-8 col-lg-9">
                <input wire:model.defer="newPassword" type="password"
                    class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" required
                    value="{{ old('newPassword') }}">
                @error('newPassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                Password</label>
            <div class="col-md-8 col-lg-9">
                <input wire:model.defer="renewPassword" type="password"
                    class="form-control @error('renewPassword') is-invalid @enderror" id="renewPassword" required>
                @error('renewPassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
    </form>
    <!-- End Change Password Form -->
</div>
