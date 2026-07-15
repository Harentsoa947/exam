<div class="bg-black/3 w-full h-screen fixed top-0 left-0 flex text-black/60">
    <div class="h-full p-2 w-full flex gap-3">
        @include('layouts.prof-layouts.layoutnav')
        <div class="flex-1 bg-white rounded-md p-4">
            <div class="overflow-y-scroll h-full">
                @yield('contenue-prof')
            </div>
        </div>
        
    </div>
</div>