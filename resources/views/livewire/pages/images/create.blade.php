<div class="container">

    @if ($results)
        <div class="row mt-5">
            <div class="col">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Yes. Your image has been uploaded successfully. Please copy the URL below to share your image.
                    </p>
                    <hr>
                    <p class="mb-0">
                        <strong>{{ route('image.show', "{$results['token']}") }}</strong>
                    </p>


                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif


    <div class="row mt-{{ $results ? 3 : 5 }}">
        <div class="col">
            <form wire:submit.prevent='save'>
                <div>
                    <input wire:model='photo' class="form-control" type="file" accept="image/*" />
                    @error('photo')
                        <span class="text-danger small fw-bolder">{{ $message }}</span>
                    @enderror
                </div>


                @if ($photo)
                    <div class="mt-3">
                        <img class="img-fluid w-25 rounded img-thumbnail" src="{{ $photo->temporaryUrl() }}" />
                        <span class="d-block small text-danger" style="cursor: pointer;"
                            wire:click='remove_photo'>Remove
                            image</span>
                    </div>
                @endif

                <button class="btn btn-primary mt-3" type="submit"><i
                        class="fas fa-cloud-upload-alt"></i> Upload</button>
                <a href="{{ route('index') }}" class="btn btn-outline-primary mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
