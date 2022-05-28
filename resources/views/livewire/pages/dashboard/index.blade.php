<div class="container">
    <div class="row mt-5">
        <div class="col">
            <a href="{{ route('image.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add New
            </a>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col">
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" role="tab"
                            data-bs-toggle="tab" href="#tab-1">My Images</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab"
                            data-bs-toggle="tab" href="#tab-2">Edit Profile</a></li>
                </ul>





                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show active" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>URL</th>
                                        <th>Action</th>
                                        <th>Share</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$images->isEmpty())
                                        @foreach ($images as $image)
                                            {{-- @dd($image) --}}
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $image->file_name }}</td>
                                                <td>{{ route('image.show', $image->token) }}</td>
                                                <td><span class="badge badge-pill bg-danger" style="cursor: pointer"
                                                        wire:click='delete("{{ $image->token }}")'>Delete</span></td>
                                                <td>{!! Share::page(route('image.show', $image->token), 'Nice picture! You will definitely like this picture.')->facebook()->twitter()->linkedin()->telegram()->whatsapp()->reddit() !!}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="5">You haven&#39;t uploaded any images
                                                yet.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                {{ $images->links() }}
                            </div>
                        </div>
                    </div>

                    <div id="tab-2" class="tab-pane fade" role="tabpanel">
                        <p>Coming soon..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
