<div class="bg-black/3 w-full h-screen flex text-black/60">
    <div class="h-full p-2 w-full flex gap-3">
        @include('layouts.admin-layouts.layoutnav')
        <div class="flex-1 bg-white p-2 px-3 rounded-md">
            @yield('contenue-admin')
        </div>
    </div>
</div>