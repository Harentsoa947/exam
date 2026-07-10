function toggleQuestion(id){

    const contenu = document.getElementById('question-' + id);
    const icon = document.getElementById('icon-' + id);


    contenu.classList.toggle('max-h-0');
    contenu.classList.toggle('max-h-screen');

    contenu.classList.toggle('opacity-0');
    contenu.classList.toggle('opacity-100');


    icon.classList.toggle('rotate-180');

}


function creationQuestionQCM(items){
    return `<div class="bg-white rounded-2xl shadow-lg p-8 mb-8">

    <div class="flex justify-between items-center mb-6 cursor-pointer hover:bg-gray-50 transition" onclick="toggleQuestion(${items})">    
    
        <h3 class="text-xl font-bold text-gray-800">
            Question ${items}
        </h3>
    
        <div class="flex items-center gap-3">
    
            <span class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm" id="aff_points-${items}">
                0 points
            </span>
    
            <i id="icon-1" class="fa-solid fa-chevron-down text-gray-500 transition"></i>
    
        </div>
    
    </div>
    
    
    <!-- Texte de la question -->
    
    <div id="question-${items}" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">
        <div class="mb-3">
            <label class="block font-semibold text-gray-700 mb-2">
                Nombre de points
            </label>
            <input type="number" placeholder="" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none" id="points-${items}">
        </div>
        <div class="mb-6">
    
            <label class="block font-semibold text-gray-700 mb-2">
                Texte de la question
            </label>
    
            <textarea
                rows="3"
                placeholder="Saisissez votre question..."
                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none resize-none"></textarea>
    
        </div>
    
    
        <!-- Image -->
    
        <div class="mb-6">
    
            <label class="block font-semibold text-gray-700 mb-2">
                Image (facultatif)
            </label>
    
            <input
                type="file"
                class="block w-full border border-dashed border-gray-300 rounded-xl p-3 file:bg-blue-600 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-lg file:mr-4 hover:file:bg-blue-700">
    
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-gray-700 mb-2">
                Type de question
            </label>
            <select name="" id="question_type-${items}" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none w-full">
                <option value=""></option>
                <option value="mult">Choix multiple</option>
                <option value="bool">Vrai ou Faux</option>
            </select>
        </div>
    
        <!-- Nombre de choix -->

        <div class="choix_multiple-${items}">
            
        </div>
        
    
    
    </div>
    
    
    </div>`
}

const total = document.querySelector('#total')
const parent = document.querySelector('#qcm')

total.addEventListener('input', function(){

    // maximum de question autorisé : 20
    let valeur = parseInt(this.value, 10);
    let max = parseInt(this.max, 20);
    let min = parseInt(this.min, 20);

    // Bloque le maximum
    if (valeur > max) {
        this.value = max;
    }
    // Bloque le minimum
    if (valeur < min) {
        this.value = min;
    }

    // console.log(this.value);
    
    parent.innerHTML = ""

    for (let i = 1; i <= this.value; i++) {
        parent.insertAdjacentHTML('beforeend', creationQuestionQCM(i))
        document.getElementById(`question_type-${i}`).addEventListener('input', function(){
            if(this.value == 'mult'){
                let choix_multiple = document.querySelector(`.choix_multiple-${i}`)
                let contenu = `<div class="mb-6">
                    <select name="" id="multiple-${i}" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none w-full">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4" selected>4</option>
                    </select>    
                </div>

                <div id="propo-${i}"></div>
                <!-- Les propositions -->

                `
                choix_multiple.innerHTML = contenu
                affichage_proposition = ""
                let nbr_proposition = document.getElementById(`multiple-${i}`)
                nbr_proposition.addEventListener('input', function(){
                    affichage_proposition = "";
                    for(let j = 1; j <= this.value; j++){
                        affichage_proposition += creationPropositionChamp(j);
                    }

                    document.getElementById(`propo-${i}`).innerHTML = affichage_proposition

                })
            }else if(this.value == '' || this.value == 'bool'){
                document.querySelector(`.choix_multiple-${i}`).innerHTML = "";
            }
        })
    }
    

    for (let i = 1; i <= this.value; i++) {
        document.getElementById(`points-${i}`).addEventListener('input', function(){
            const valeurEpuree = this.value.trim();
            
            const idNumero = this.id.split('-')[1]; 
            const affichage = document.getElementById(`aff_points-${idNumero}`);
    
            if (valeurEpuree === "") {
                affichage.innerText = '0 points';
            } else {
                affichage.innerText = valeurEpuree + ' points';
            }
        });
    }
    
    
})

function creationPropositionChamp(iden){
    return `<div class="space-y-4 flex flex-col items-center mb-5" >

    <div class="flex gap-4 items-center w-full ">
        <input 
            type="text" 
            placeholder="Proposition ${iden}"
            class="flex rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none w-full">

        <input 
            type="radio" 
            name="bonne_reponse_1"
            class="w-5 h-5 cursor-pointer accent-blue-600">
    </div>  
</div>`
}
