<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @include('layouts.partials._header')
    <body>
        <div id="app">
            @include('layouts.partials._navigation')

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
