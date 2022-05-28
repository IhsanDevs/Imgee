<footer class="text-center mt-auto">
    <div class="container text-muted py-4 py-lg-5">

        @include('components.external_links')
        @include('components.social_media_links')

        <a href="https://www.flaticon.com/free-icons/picture" title="picture icons" class="text-decoration-none">Picture
            icons created by Pixel
            perfect - Flaticon</a>


        <p class="mb-0">Copyright © {{ date('Y') }} {{ env('APP_NAME') }}</p>


    </div>
</footer>

@include('components.modal_terms')
@include('components.modal_coming_soon')
@include('components.modal_license')
