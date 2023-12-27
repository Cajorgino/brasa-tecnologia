<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('title') | Sistema Profs.</title>

    @yield('head-script')
</head>

<body>

    <div class="flex flex-col justify-center" style="height: 100vh;">
        @yield('content')
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Sucesso!',
                text: '{{session("success")}}',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            title: 'Erro!',
            text: '{{session("error")}}',
            icon: 'error',
            confirmButtonText: 'OK'
        })
    </script>
    @endif

</body>

</html>
