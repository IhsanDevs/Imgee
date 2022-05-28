<div class="container">
    <div class="row mt-5">
        <div class="col">
            <a href="{{ route('image.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add New
            </a>
        </div>
    </div>

    <div class="row mb-3">
        {{-- @dd($images) --}}
        @foreach ($images as $image)
            <div class="col-lg-4 mt-3">
                <a href="#" class="lightbox-toggle"
                    data-src="<img class='img-fluid' src='{{ $image['url'] }}' loading='lazy' />" data-type='html'>
                    <div class="card">
                        <div class="card-img w-100 d-block"
                            style="background: url('{{ $image['url'] }}') center / cover no-repeat;height: 15rem;">
                        </div>

                        <div class="card-img-overlay">
                            <span class="badge bg-primary me-1"><i class="far fa-user"></i> By:
                                {{ $image['user']['name'] ?? 'Anonymous' }} at
                                {{ Carbon\Carbon::parse($image['created_at'])->diffForHumans() }}</span>
                        </div>
                    </div>
                </a>
                <div class="d-inline">
                    <span wire:loading.remove class="badge bg-info me-1 mt-1" style="cursor: pointer"
                        wire:click='download("{{ $image['token'] }}")'><i class="fas fa-download"></i>
                        Download</span>

                    <span wire:loading wire:target='download("{{ $image['token'] }}")'
                        class="spinner-border text-primary spinner-border-sm me-1 mt-1" role="status"
                        aria-hidden="true"></span>


                    <span class="badge bg-danger me-1 mt-1" style="cursor: pointer"
                        wire:click='like("{{ $image['token'] }}")'><i
                            class="{{ $image['liked'] ? 'fas' : 'far' }} fa-thumbs-up"></i>
                        {{ $image['likeCount'] }}</span>

                    <div class="float-end">
                        <small class="fst-italic fw-bolder">Share:</small>
                        <span>
                            {!! Share::page(route('image.show', $image['token']), 'Nice picture! You will definitely like this picture.')->facebook()->twitter()->linkedin()->telegram()->whatsapp()->reddit() !!}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mb-4">
        <div class="col">
            {{ $images->links() }}
        </div>
    </div>
</div>
