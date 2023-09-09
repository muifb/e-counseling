<?php

namespace App\Http\Livewire\Perkembangans;

use App\Models\Like;
use App\Models\Siswa;
use Livewire\Component;
use App\Models\Perkembangan;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesan as ModelsComment;
use Illuminate\Support\Facades\Redirect;

class Comment extends Component
{
    public $komentar, $perkembangan, $siswa, $body2, $edit_comment, $comment_id;

    public $show = 'show';
    public $balas;

    public function mount($id, $siswa_id)
    {
        $this->perkembangan = Perkembangan::find($id);
        $this->siswa = Siswa::find($siswa_id);
    }

    public function render()
    {
        return view('livewire.perkembangans.comment', [
            'comments' => ModelsComment::with(['user', 'childrens'])
                ->where('perkembangan_id', $this->perkembangan->id)
                ->whereNull('pesan_id')->get(),
            'total_comments' => ModelsComment::where('perkembangan_id', $this->perkembangan->id)->count()
        ]);
    }

    public function balas()
    {
        $this->show = 'show';
        $this->balas = NULL;
        $this->edit_comment = NULL;
    }

    public function store()
    {
        $this->validate(['komentar' => 'required']);
        $comment = ModelsComment::create([
            'user_id'   => Auth::user()->id,
            'perkembangan_id' => $this->perkembangan->id,
            'isi_pesan' => $this->komentar
        ]);

        if ($comment) {
            // $this->emit('comment_store', $comment->id);
            $this->komentar = NULL;
            $this->balas = NULL;
        } else {
            session()->flash('danger', 'Anda gagal Komen!');
            return redirect()->route('consellings.show', $this->siswa->id);
        }
    }

    public function selectReply($id)
    {
        $this->comment_id = $id;
        $this->edit_comment = Null;
        $this->body2 = Null;
    }

    public function selectEdit($id)
    {
        $comment = ModelsComment::find($id);
        $this->edit_comment = $comment->id;
        $this->body2 = $comment->isi_pesan;
        $this->comment_id = NULL;
        $this->show = NULL;
        $this->balas = 'show';
    }

    public function reply()
    {
        $this->validate(['body2' => 'required']);
        $comment = ModelsComment::find($this->comment_id);
        $comment = ModelsComment::create([
            'user_id'   => Auth::user()->id,
            'perkembangan_id' => $this->perkembangan->id,
            'isi_pesan' => $this->body2,
            'pesan_id' => $comment->comment_id ? $comment->pesan_id : $comment->id
        ]);

        if ($comment) {
            $this->emit('comment_store', $comment->id);
            $this->body2 = NULL;
            $this->comment_id = NULL;
        } else {
            session()->flash('danger', 'Anda gagal Komen!');
            return redirect()->route('consellings.show', $this->siswa->id);
        }
    }

    public function change()
    {
        $this->validate(['body2' => 'required']);
        $comment = ModelsComment::where('id', $this->edit_comment)->update([
            'isi_pesan' => $this->body2
        ]);

        if ($comment) {
            $this->emit('comment_store', $this->edit_comment);
            $this->komentar = NULL;
            $this->edit_comment = NULL;
            $this->show = 'show';
            $this->balas = NULL;
        } else {
            session()->flash('danger', 'Anda gagal ubah komen!');
            return redirect()->route('consellings.show', $this->siswa->id);
        }
    }

    public function delete($id)
    {
        $comment = ModelsComment::where('id', $id)->delete();

        if ($comment) {
            return Null;
        } else {
            session()->flash('danger', 'Anda gagal hapus komen!');
            return redirect()->route('consellings.show', $this->siswa->id);
        }
    }

    public function like($id)
    {
        $data = [
            'pesan_id' => $id,
            'user_id' => Auth::user()->id
        ];

        $like = Like::where($data);

        if ($like->count() > 0) {
            $like->delete();
        } else {
            Like::create($data);
        }

        return NULL;
    }
}
