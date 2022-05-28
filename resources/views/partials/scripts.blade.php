<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/share.js') }}"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
data-turbolinks-eval="false"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.0/dist/index.bundle.min.js"></script>

<x-livewire-alert::scripts />

<script>
    const options = {
        keyboard: true,
        size: 'lg',
    };

    document.querySelectorAll('.lightbox-toggle').forEach((el) => el.addEventListener('click', (e) => {
        e.preventDefault();
        const lightbox = new Lightbox(el, options);
        lightbox.show();
    }));
</script>
