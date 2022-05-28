<?php

namespace App\Http\Livewire\Pages\Dashboard;

use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use LivewireAlert, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function delete($token)
    {
        $image = Image::where('token', $token)->first();

        $image->delete();

        $this->alert('success', 'Yeay!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'You have successfully deleted your image.',
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'close',
           ]);
    }
    public function render()
    {
        return view('livewire.pages.dashboard.index', [
            'images' => Image::with('user')->where('user_id', Auth::id())->paginate(10),
        ]);
    }
}