<div id="modal-commit_lists" class="modal fade" role="dialog" tabindex="-1">

    @php
        $changelogs = Http::get('https://api.github.com/repos/IhsanDevs/Imgee/commits')->body();
        $changelogs = json_decode($changelogs);
    @endphp
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Changelog</h4><button class="btn-close" type="button"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($changelogs as $changelog)
                        <li class="list-group-item">
                            <span><a href="{{ $changelog->html_url }}" class="text-decoration-none"
                                    target="_blank">{{ $changelog->commit->message }}</a></span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button"
                    data-bs-dismiss="modal">Close</button></div>
        </div>
    </div>
</div>
