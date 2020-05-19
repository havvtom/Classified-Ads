<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @include('layouts.partials._header')
    <body>
        <div id="app">
            @include('layouts.partials._navigation')

            <div class="container">
            	@include('layouts.partials._alerts')
                @yield('content')
            </div>
        </div>
    </body>
</html>
