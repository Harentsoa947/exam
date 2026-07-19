// console.log(oldQuestion);
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
    const old = oldQuestions[items] ?? {}
    return `<div class="bg-white rounded-2xl shadow-lg p-8 mb-8">

    <div class="flex justify-between items-center mb-6 cursor-pointer hover:bg-gray-50 transition" onclick="toggleQuestion(${items})">    
    
        <h3 class="text-xl font-bold text-gray-800">
            Question ${items}
        </h3>
    
        <div class="flex items-center gap-3">
    
            <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm" id="aff_points-${items}">
                ${old.points ?? '0'} points
            </span>
    
            <i id="icon-${items}" class="fa-solid fa-chevron-down text-gray-500 transition"></i>
    
        </div>
    
    </div>
    
    
    <!-- Texte de la question + video -->
    
    <div id="question-${items}" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">
        <div class="mb-3">
            <label class="block font-semibold text-gray-700 mb-2">
                Nombre de points
            </label>
            <input type="number" 
                value="${old.points ?? ''}"
                name="questions[${items}][points]" 
                placeholder="" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" 
                id="points-${items}">
        </div>
        <div class="mb-6">
    
            <label class="block font-semibold text-gray-700 mb-2">
                Texte de la question
            </label>
    
            <textarea rows="3" name="questions[${items}][text_question]" placeholder="Saisissez votre question..." class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-green-500 outline-none resize-none">${old.text_question ?? ''}</textarea>
    
        </div>
    
    
        <!-- Image -->
    
        <div class="mb-6">
    
            <label class="block font-semibold text-gray-700 mb-2">
                Image (facultatif)
            </label>
    
            <input
            type="file"
            name="questions[${items}][image]"
            class="file-bg-vert block w-full border border-dashed border-gray-300 rounded-xl p-3">
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-gray-700 mb-2">
                Type de question
            </label>
            <select name="questions[${items}][mult_bool]" id="question_type-${items}" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full">
                <option value=""></option>
                <option value="mult" ${old.mult_bool === 'mult' ? 'selected' : ''}>Choix multiple</option>
                <option value="bool" ${old.mult_bool === 'bool' ? 'selected' : ''}>Vrai ou Faux</option>
            </select>
        </div>
    
        <!-- Nombre de choix -->

        <div class="choix_multiple-${items}">
            
        </div>

        <div class="booleen-${items}">
            
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
        const selectType = document.getElementById(`question_type-${i}`);

        selectType.addEventListener('change', function(){
            let vraie_faux = document.querySelector(`.booleen-${i}`);
            let choix_multiple = document.querySelector(`.choix_multiple-${i}`);

            if(this.value == 'mult'){
                vraie_faux.innerHTML = "";

                let old = oldQuestions[i] ?? {};

                let contenu = `<div class="mb-6">
                    <select 
                        name="questions[${i}][choix_multiple]" 
                        id="multiple-${i}" 
                        class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full">

                        <option value=""></option>
                        <option value="2" ${old.choix_multiple == 2 ? 'selected' : ''}>2</option>
                        <option value="3" ${old.choix_multiple == 3 ? 'selected' : ''}>3</option>
                        <option value="4" ${old.choix_multiple == 4 ? 'selected' : ''}>4</option>

                    </select>    
                </div>

                <div id="propo-${i}"></div>`;

                choix_multiple.innerHTML = contenu;


                let nbr_proposition = document.getElementById(`multiple-${i}`);

                nbr_proposition.addEventListener('change', function(){

                    let affichage_proposition = "";

                    for(let j = 1; j <= this.value; j++){
                        affichage_proposition += creationPropositionChamp(j, old);
                    }

                    document.getElementById(`propo-${i}`).innerHTML = affichage_proposition;

                });


                // Restaurer le nombre de choix après erreur
                if(old.choix_multiple){
                    nbr_proposition.dispatchEvent(new Event('change'));
                }


            } else if(this.value == 'bool'){

                choix_multiple.innerHTML = "";

                let old = oldQuestions[i] ?? {};

                vraie_faux.innerHTML = `
                    <div class="flex gap-6 items-center">

                        <label class="flex items-center gap-2 cursor-pointer">
                            Vrai
                            <input 
                                type="radio"
                                name="questions[${i}][bonne_reponse]"
                                value="vrai"
                                ${old.bonne_reponse == 'vrai' ? 'checked' : ''}
                                class="w-5 h-5 cursor-pointer accent-green-600">
                        </label>

                        <label class="flex items-center gap-2 cursor-pointer">
                            Faux
                            <input 
                                type="radio"
                                name="questions[${i}][bonne_reponse]"
                                value="faux"
                                ${old.bonne_reponse == 'faux' ? 'checked' : ''}
                                class="w-5 h-5 cursor-pointer accent-green-600">
                        </label>

                    </div>
                `;
            }
            else {
                choix_multiple.innerHTML = "";
                vraie_faux.innerHTML = "";
            }
        });


        // après addEventListener
        if(selectType.value){
            selectType.dispatchEvent(new Event('change'));
        }
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
    
    enregistrer();
    
})

function creationPropositionChamp(iden, old){
    return `<div class="space-y-4 flex flex-col items-center mb-5" >

    <div class="flex gap-4 items-center w-full ">
        <input 
            type="text" 
            placeholder="Proposition ${iden}"
            name="questions[${iden}][proposition][]"
            value="${old.proposition ?? ''}"
            class="flex rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full">

        <input 
            type="radio" 
            name="bonne_reponse_1"
            class="w-5 h-5 cursor-pointer accent-green-600">
    </div>  
</div>`
}


function enregistrer(){
    // Récupère la liste des éléments enfants HTML
    const div_qcm = document.getElementById('qcm').children;
    
    // Condition corrigée : on regarde si le tableau/la liste est vide
    if (div_qcm.length === 0) { 
        document.getElementById('bouton').style.display = "none";
    } else {
        document.getElementById('bouton').style.display = "flex";
    }
}

enregistrer();

window.addEventListener('DOMContentLoaded', ()=>{
    // console.log(Object.keys(oldQuestions).length);
    if(Object.keys(oldQuestions).length > 0){
        total.dispatchEvent(new Event('input'))
    }
})