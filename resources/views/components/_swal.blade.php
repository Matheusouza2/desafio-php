@if (session()->has('icon'))
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Swal.fire({
            title: "{{ session('title') }}",
            text: "{{ session('text') }}",
            icon: "{{ session('icon') }}",
        })
    </script>
@endif
