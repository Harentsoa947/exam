<div class="bg-black/3 w-full h-screen flex text-black/60">
    <div class="h-full p-2 w-full flex gap-3">
        @include('layouts.prof-layouts.layoutnav')
        <div class="flex-1 bg-white px-8 py-4 rounded-md">
            @yield('contenue-prof')
        </div>
    </div>
</div>