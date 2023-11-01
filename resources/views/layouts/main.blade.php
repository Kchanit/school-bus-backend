<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Bus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>


<body>
    <main class="inline-flex bg-slate-50 gap-4 content w-full min-h-screen">
        @include('layouts.sidebar')
        <div class="py-3 pr-4 w-full">
            @yield('content')
        </div>
    </main>
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
{{-- @include('layouts.subviews.footer') --}}

</html>
