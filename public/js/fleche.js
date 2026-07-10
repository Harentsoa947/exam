const nombreCouples = document.getElementById('nombreCouples')
const bloc_principal = document.getElementById('bloc_principal')
let toutesLesLignes = [];
let ligneSelectionnee = null;
let elementSelectionne = null;
nombreCouples.addEventListener('input', function(){
    reinitialiser();
    // console.log(this.value);
    bloc_principal.innerHTML = affichage_base()
    nbr_aff(this.value);
    creerRelation();
})

function affichage_base(){
    return `<div class="bg-gray-50 rounded-2xl shadow p-6">
    
            <h3 class="text-2xl font-bold text-center text-gray-700 mb-8">
                Associer les éléments
            </h3>
    
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
    
                <!-- ==================== COLONNE GAUCHE ==================== -->
    
                <div>
    
                    <h4 class="font-bold text-blue-600 mb-5">
                        Colonne gauche
                    </h4>
    
                    <div id="gauche"></div>
    
                </div>
    
                <!-- ==================== COLONNE DROITE ==================== -->
    
                <div>
    
                    <h4 class="font-bold text-green-600 mb-5">
                        Colonne droite
                    </h4>

                    <div id="droite"></div>    
                </div>
    
            </div>
    
        </div>
        <div class="flex justify-end mt-8">
    
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition">
                Enregistrer
            </button>
    
        </div>`
}

function nbr_aff(total){
    let gauche = ""
    let droite = ""
    for(let i=1; i<=total; i++){
        // <!-- ==================== COLONNE GAUCHE ==================== -->
        gauche += `<div class="relative">
            <input
                type="text"
                placeholder="Élément gauche ${i}"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 pr-12 focus:ring-2 focus:ring-blue-500 outline-none">

            <div class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-blue-600 cursor-pointer item gauche"></div>

        </div> `

        // <!-- ==================== COLONNE DROITE ==================== -->
        droite += `<div class="relative">
    
                <div class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-green-600 cursor-pointer item droite"></div>

                <input
                    type="text"
                    placeholder="Élément droite ${i}"
                    class="w-full rounded-lg border border-gray-300 py-3 pl-12 pr-4 focus:ring-2 focus:ring-green-500 outline-none ">

            </div>`
    }
    document.getElementById('gauche').innerHTML = `<div class="space-y-4">${gauche}</div>`
    document.getElementById('droite').innerHTML = `<div class="space-y-4">${droite}</div>`
}