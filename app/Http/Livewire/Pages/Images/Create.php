<?php

namespace App\Http\Livewire\Pages\Images;

use App\Models\Image;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $photo, $image_model, $results;

    protected $rules = [
        'photo' => 'required|image'
    ];

    protected $proxies = '*';

    protected $messages = [
        'photo.required' => 'Please select an image',
        'photo.image' => 'Please select an image file'
    ];


    public function mount(Image $image)
    {
        $this->image_model = $image;
    }
    public function save()
    {
        $validated = $this->validate();

        if ($validated) {
            $upload = $this->upload_to_yandex($this->photo);
            $upload = json_decode($upload);

            $data = [
                'file_name' => $this->photo->getClientOriginalName(),
                'url' => $upload->url,
                'token' => Str::random(16),
                'mime_type' => $this->photo->getClientMimeType(),
                'user_id' => auth()->user()->id ?? null
            ];

            $this->image_model->create($data);

            $this->results = $data;
        }

    }

    public function updatedPhoto()
    {
        $this->validate();
    }


    public function remove_photo()
    {
        $this->reset('photo');
    }

    public function render()
    {
        return view('livewire.pages.images.create');
    }

    protected function upload_to_yandex($file)
    {
        // \dd($file->getRealPath());
        try {
            $url = 'https://yandex.com/images-apphost/image-download?images_avatars_size=fullocr';

            $response = Http::withBody(file_get_contents($file->getRealPath()), $file->getClientMimeType())
                ->post($url);

                return $response->body();
        } catch (\Throwable $th) {
            return "Failed to uploading image. Error: " . $th->getMessage();
        }



    }
}