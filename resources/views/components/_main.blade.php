<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

    {{-- Recebe os styles individuais das outras views --}}
    @yield('styles')
</head>

<body>

    <div id="wrapper">
        @include('components._sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('components._header')

                <div class="container-fluid">
                    @yield('body')
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    {{-- Recebe os scripts individuais das outras views --}}
    @yield('scripts')
</body>

</html>
