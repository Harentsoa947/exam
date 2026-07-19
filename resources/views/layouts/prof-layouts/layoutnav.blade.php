<div class="bg-white p-2 px-3 w-[6cm] rounded-md">
    <div class="text-vert font-bold text-3xl px-2">
        Prof
    </div>
    
    <div class="absolute bottom-5 left-3">
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="hover:underline bg-rouge px-4 font-semibold uppercase rounded-md">
                Deconnexion
            </button>
        </form>
    </div>
</div>