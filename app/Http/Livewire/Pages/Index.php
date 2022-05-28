<?php

namespace App\Http\Livewire\Pages;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert, WithPagination;


    public $downloadedImage;
    protected $paginationTheme = 'bootstrap';

    public function mount(Image $image)
    {
        // $this->images = $image->with(['user'])->get()->toArray();
    }
    public function render()
    {
        return view('livewire.pages.index', [
            'images' => (new Image())->with(['user'])->paginate(12),
        ]);
    }

    public function download($token)
    {
        $this->downloadedImage = Image::where('token', $token)->first();
        return \response()->streamDownload(function () {
            echo \file_get_contents($this->downloadedImage->url);
        }, $this->downloadedImage->file_name);
    }

    public function like($token)
    {
        if (auth()->check()) {
            $image = Image::where('token', $token)->first();

            $image->liked() ? $image->unlike(): $image->like();
        } else {
            $this->alert('warning', 'Oups!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'text' => 'You are required to log in before performing this action.',
               ]);
        }
    }
}