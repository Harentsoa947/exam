<div class="bg-white h-full p-2 px-3 w-[6cm] rounded-md relative">
    <div class="text-vert font-bold text-3xl px-2">
        Hopes
    </div>
    <div class="mt-3">
        <span class="uppercase text-sm border-b text-black/50 border-black/10 pb-1 inline-block px-2 py-1">
            <i class="fa-solid fa-table-cells-large text-xl me-2"></i>
            Menu
        </span>
        <ul class="my-2">
            <li>
                <a href=""
                    class="inline-block px-2 py-1">
                    <i class="fa-solid fa-user-tie me-2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a  href="{{ route('admin.prof.index') }}"
                    class="inline-block px-2 py-1">
                    <i class="fa-solid fa-user-tie me-2"></i>
                    Profs
                </a>
            </li>
            <li>
                <a href=""
                    class="inline-block px-2 py-1">
                    <i class="fa-solid fa-user-graduate me-2"></i>
                    Etudiants
                </a>
            </li>
        </ul>
    </div>
    <div class="mt-5">
        <span class="uppercase text-sm border-b text-black/50 border-black/10 pb-1 inline-block px-2 py-1">
            <i class="fa-solid fa-book-open text-xl me-2"></i>
            Examen
        </span>
        <ul class="my-2">
            <li>
                <a class="inline-block px-2 py-1">
                    <i class="fa-solid fa-earth-africa me-2"></i>
                    Français
                </a>
            </li>
            <li>
                <a class="inline-block px-2 py-1">
                    <i class="fa-solid fa-flag-usa me-2"></i>
                    Anglais
                </a>
            </li>
            <li>
                <a class="inline-block px-2 py-1">
                    <i class="fa-brands fa-dev me-2"></i>
                    Métier
                </a>
            </li>
            <li>
                <a class="inline-block px-2 py-1">
                    <i class="fa-brands fa-dev me-2"></i>
                    Dev
                </a>
            </li>
            <li>
                <a class="inline-block px-2 py-1">
                    <i class="fa-brands fa-python me-2"></i>
                    Python
                </a>
            </li>
            <li>
                <a class="inline-block px-2 py-1">
                    <i class="fa-solid fa-leaf me-2"></i>
                    Design
                </a>
            </li>
        </ul>
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