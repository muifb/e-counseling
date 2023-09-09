<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <h5 class="card-title py-0">({{ $total_comments }}) Komentar</h5>

    @foreach ($comments as $item)
        {{-- <div class="my-3" id="comment-{{ $item->id }}"> --}}
        <div class="my-3">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    @if ($item->user_id != null)
                        @if ($item->user->photo)
                            <div class="rounded-circle" style="max-height: 45px; overflow:hidden;">
                                <img src="{{ asset('storage/' . $item->user->photo) }}" alt="Profile" width="45px">
                            </div>
                        @else
                            <div class="rounded-circle" style="max-height: 45px; overflow:hidden;">
                                <img src="/img/profile.jpg" alt="Profile" width="45px">
                            </div>
                        @endif
                    @endif
                </div>
                <div class="flex-grow-1 ms-3">
                    <span class="fw-semibold">
                        @if ($item->user_id != null)
                            {{ $item->user->nama }}
                        @else
                            Username
                        @endif
                    </span>

                    <p class="card-text text-secondary mb-0">{{ $item->isi_pesan }}</p>
                    <small class="badge text-black-50">
                        {{ $item->created_at->diffForHumans(null, true, true) }}.
                    </small>
                    @if ($item->id == $comments->last()->id)
                        <a type="button" class="badge border-info text-info {{ $balas == 'show' ? '' : 'd-none' }}"
                            wire:click="balas()">balas</a>
                    @endif
                    @if ($item->user_id != null)
                        @if ($item->user_id == Auth::user()->id)
                            <a type="button" class="badge border-info text-info"
                                wire:click="selectEdit({{ $item->id }})">edit</a>
                            <a type="button" class="badge border-info text-info"
                                wire:click="delete({{ $item->id }})">hapus</a>
                        @endif
                    @endif
                    @if (isset($item->hasLike))
                        <a type="button" class="text-dark" wire:click="like({{ $item->id }})">
                            <i class="ri-thumb-up-fill"></i>
                        </a>
                        <span class="badge bg-secondary text-light">{{ $item->totalLikes() }}</span>
                    @else
                        <a type="button" class="text-dark" wire:click="like({{ $item->id }})">
                            <i class="ri-thumb-up-line"></i>
                        </a>
                        <span class="badge bg-secondary text-light">{{ $item->totalLikes() }}</span>
                    @endif

                    @if (isset($edit_comment) && $edit_comment == $item->id)
                        <form wire:submit.prevent="change" class="needs-validation mt-2" novalidate>
                            <div class="col-sm-10">
                                <input wire:model.defer="body2"
                                    class="form-control @error('body2') is_invalid @enderror" style="height: 50px;"
                                    required>
                                <div class="invalid-feedback">
                                    @error('body2')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 btn-sm">Ubah</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            {{-- @if ($item->childrens)
                @foreach ($item->childrens as $item2)
                    <div class="d-flex ms-5 mt-3">
                        <div class="flex-shrink-0">
                            @if ($item2->user_id != null)
                                @if ($item2->user->photo)
                                    <img src="{{ asset('storage/' . $item2->user->photo) }}" alt="Profile"
                                        width="45" height="45" class="rounded-circle">
                                @else
                                    <img src="/img/profile.jpg" alt="Profile" width="45" height="45"
                                        class="rounded-circle">
                                @endif
                            @endif
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <span class="fw-semibold">
                                @if ($item2->user_id != null)
                                    {{ $item2->user->nama }}
                                @else
                                    Username
                                @endif
                            </span>
                            <p class="card-text text-secondary mb-0">{{ $item2->isi_pesan }}</p>
                            <small class="badge text-black-50">
                                {{ $item2->created_at->diffForHumans(null, true, true) }}.
                            </small>
                            <a type="button" class="badge border-info text-info"
                                wire:click="selectReply({{ $item2->id }})">balas</a>
                            @if ($item2->user_id != null)
                                @if ($item2->user_id == Auth::user()->id)
                                    <a type="button" class="badge border-info text-info"
                                        wire:click="selectEdit({{ $item2->id }})">edit</a>
                                    <a type="button" class="badge border-info text-info"
                                        wire:click="delete({{ $item2->id }})">hapus</a>
                                @endif
                            @endif
                            @if (isset($item2->hasLike))
                                <a type="button" class="border-info text-dark" wire:click="like({{ $item2->id }})">
                                    <i class="ri-thumb-up-fill"></i>
                                </a>
                                <span class="badge bg-secondary text-light">{{ $item2->totalLikes() }}</span>
                            @else
                                <a type="button" class="border-info text-dark" wire:click="like({{ $item2->id }})">
                                    <i class="ri-thumb-up-line"></i>
                                </a>
                                <span class="badge bg-secondary text-light">{{ $item2->totalLikes() }}</span>
                            @endif

                            @if (isset($comment_id) && $comment_id == $item2->id)
                                <form wire:submit.prevent="reply" class="needs-validation mt-2" novalidate>
                                    <div class="col-sm-10">
                                        <textarea wire:model.defer="body2" class="form-control @error('body2') is-invalid @enderror" style="height: 100px"
                                            required></textarea>
                                        <div class="invalid-feedback">
                                            @error('body2')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2 btn-sm">Balas</button>
                                    </div>
                                </form>
                            @endif

                            @if (isset($edit_comment) && $edit_comment == $item2->id)
                                <form wire:submit.prevent="change" class="needs-validation mt-2" novalidate>
                                    <div class="col-sm-10">
                                        <textarea wire:model.defer="body2" class="form-control @error('body2') is_invalid @enderror" style="height: 100px"
                                            required></textarea>
                                        <div class="invalid-feedback">
                                            @error('body2')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2 btn-sm">Ubah</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif --}}
        </div>
    @endforeach
    <form wire:submit.prevent="store" class="needs-validation {{ $show == 'show' ? '' : 'd-none' }}" novalidate>
        <div class="mb-3 mt-3">
            <input wire:model.defer="komentar" class="form-control @error('komentar') is-invalid @enderror"
                style="height: 75px;" required autocomplete="off">
            <div class="invalid-feedback">
                @error('komentar')
                    {{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2 btn-sm">Kirim <i class="bx bx-send"></i></button>
        </div>
    </form>
</div>
