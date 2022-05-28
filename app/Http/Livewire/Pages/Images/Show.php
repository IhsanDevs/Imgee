<?php

namespace App\Http\Livewire\Pages\Images;

use Livewire\Component;

class Show extends Component
{
    public $image;


    public function download()
    {
        return \response()->streamDownload(function () {
            echo \file_get_contents($this->image->url);
        }, $this->image->file_name);
    }

    public function render()
    {
        // return view('livewire.pages.images.show');
        // return \file_get_contents($this->image->url);
    }
}