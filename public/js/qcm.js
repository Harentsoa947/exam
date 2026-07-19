const maintenant = new Date();
const jour = maintenant.getDate();
const mois = maintenant.getMonth() + 1;
const year = maintenant.getFullYear();

const date_jour = jour + '-' + mois + '-' + year;
console.log(date_jour);


function toggleQuestion(id) {
    const contenu = document.getElementById('question-' + id);
    const icon = document.getElementById('icon-' + id);

    contenu.classList.toggle('max-h-0');
    contenu.classList.toggle('max-h-screen');
    contenu.classList.toggle('opacity-0');
    contenu.classList.toggle('opacity-100');
    icon.classList.toggle('rotate-180');
}

function creationQuestionQCM(items) {
    const old = oldQuestions[items] ?? {};
    return `<div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
        <div class="flex justify-between items-center mb-6 cursor-pointer hover:bg-gray-50 transition" onclick="toggleQuestion(${items})">    
            <h3 class="text-xl font-bold text-gray-800">Question ${items}</h3>
            <div class="flex items-center gap-3">
                <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm" id="aff_points-${items}">
                    ${old.points ?? '0'} points
                </span>
                <i id="icon-${items}" class="fa-solid fa-chevron-down text-gray-500 transition"></i>
            </div>
        </div>
        
        <div id="question-${items}" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">
            <div class="mb-3">
                <label class="block font-semibold text-gray-700 mb-2">Nombre de points</label>
                <input type="number" 
                    value="${old.points ?? ''}"
                    name="questions[${items}][points]" 
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" 
                    id="points-${items}">
                <input type="hidden" name="questions[${items}][prof]" value="${prof_id}">
                <input type="hidden" name="questions[${items}][date]" value="${date_jour}">
            </div>

            <div class="mb-6">
                <label class="block font-semibold text-gray-700 mb-2">Texte de la question</label>
                <textarea rows="3" name="questions[${items}][text_question]" placeholder="Saisissez votre question..." class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-green-500 outline-none resize-none">${old.text_question ?? ''}</textarea>
            </div>
        
            <div class="mb-6">
                <label class="block font-semibold text-gray-700 mb-2">Image (facultatif)</label>
                <input type="file" name="questions[${items}][image]" class="file-bg-vert block w-full border border-dashed border-gray-300 rounded-xl p-3">
            </div>

            <div class="mb-6">
                <label class="block font-semibold text-gray-700 mb-2">Type de question</label>
                <select name="questions[${items}][mult_bool]" id="question_type-${items}" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full">
                    <option value=""></option>
                    <option value="mult" ${old.mult_bool === 'mult' ? 'selected' : ''}>Choix multiple</option>
                    <option value="bool" ${old.mult_bool === 'bool' ? 'selected' : ''}>Vrai ou Faux</option>
                </select>
            </div>
        
            <div class="choix_multiple-${items}"></div>
            <div class="booleen-${items}"></div>
        </div>
    </div>`;
}

function creationPropositionChamp(idQuestion, idProposition, old) {
    // Récupération de la valeur de la proposition précédente si elle existe
    const propositionsAnciennes = old.proposition ?? [];
    const valeurProposition = propositionsAnciennes[idProposition - 1] ?? '';
    
    // Vérification de si cette proposition était cochée comme la bonne réponse
    const estCochee = old.bonne_reponse_mult == (idProposition - 1) ? 'checked' : '';

    return `<div class="space-y-4 flex flex-col items-center mb-5">
        <div class="flex gap-4 items-center w-full">
            <input 
                type="text" 
                placeholder="Proposition ${idProposition}"
                name="questions[${idQuestion}][proposition][]"
                value="${valeurProposition}"
                class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full" required>

            <input 
                type="radio" 
                name="questions[${idQuestion}][bonne_reponse_mult]"
                value="${idProposition - 1}"
                ${estCochee}
                class="w-5 h-5 cursor-pointer accent-green-600" required>
        </div>  
    </div>`;
}

const total = document.querySelector('#total');
const parent = document.querySelector('#qcm');

total.addEventListener('input', function() {
    let valeur = parseInt(this.value, 10);
    let max = parseInt(this.max, 10) || 20; // Utilise la propriété HTML max
    let min = parseInt(this.min, 10) || 1;

    if (valeur > max) { this.value = max; valeur = max; }
    if (valeur < min) { this.value = min; valeur = min; }
    if (isNaN(valeur)) { parent.innerHTML = ""; enregistrer(); return; }
    
    parent.innerHTML = "";

    for (let i = 1; i <= valeur; i++) {
        parent.insertAdjacentHTML('beforeend', creationQuestionQCM(i));
        const selectType = document.getElementById(`question_type-${i}`);

        selectType.addEventListener('change', function() {
            let vraie_faux = document.querySelector(`.booleen-${i}`);
            let choix_multiple = document.querySelector(`.choix_multiple-${i}`);
            let old = oldQuestions[i] ?? {};

            if (this.value == 'mult') {
                vraie_faux.innerHTML = "";
                
                choix_multiple.innerHTML = `
                    <div class="mb-6">
                        <label class="block font-semibold text-gray-700 mb-2">Nombre de propositions</label>
                        <select name="questions[${i}][choix_multiple]" id="multiple-${i}" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full">
                            <option value=""></option>
                            <option value="2" ${old.choix_multiple == 2 ? 'selected' : ''}>2</option>
                            <option value="3" ${old.choix_multiple == 3 ? 'selected' : ''}>3</option>
                            <option value="4" ${old.choix_multiple == 4 ? 'selected' : ''}>4</option>
                        </select>    
                    </div>
                    <div id="propo-${i}"></div>`;

                let nbr_proposition = document.getElementById(`multiple-${i}`);
                nbr_proposition.addEventListener('change', function() {
                    let affichage_proposition = "";
                    for (let j = 1; j <= this.value; j++) {
                        affichage_proposition += creationPropositionChamp(i, j, old);
                    }
                    document.getElementById(`propo-${i}`).innerHTML = affichage_proposition;
                });

                if (old.choix_multiple) {
                    nbr_proposition.dispatchEvent(new Event('change'));
                }

            } else if (this.value == 'bool') {
                choix_multiple.innerHTML = "";
                vraie_faux.innerHTML = `
                    <div class="flex gap-6 items-center mb-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            Vrai
                            <input type="radio" name="questions[${i}][bonne_reponse_bool]" value="vrai" ${old.bonne_reponse_bool == 'vrai' ? 'checked' : ''} class="w-5 h-5 cursor-pointer accent-green-600" required>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            Faux
                            <input type="radio" name="questions[${i}][bonne_reponse_bool]" value="faux" ${old.bonne_reponse_bool == 'faux' ? 'checked' : ''} class="w-5 h-5 cursor-pointer accent-green-600" required>
                        </label>
                    </div>`;
            } else {
                choix_multiple.innerHTML = "";
                vraie_faux.innerHTML = "";
            }
        });

        if (selectType.value) {
            selectType.dispatchEvent(new Event('change'));
        }

        // Écouteur pour mettre à jour l'affichage des points en direct
        document.getElementById(`points-${i}`).addEventListener('input', function() {
            const valeurEpuree = this.value.trim();
            const idNumero = this.id.split('-')[1]; 
            const affichage = document.getElementById(`aff_points-${idNumero}`);
            affichage.innerText = valeurEpuree === "" ? '0 points' : valeurEpuree + ' points';
        });
    }
    
    enregistrer();
});

function enregistrer() {
    const div_qcm = document.getElementById('qcm').children;
    document.getElementById('bouton').style.display = div_qcm.length === 0 ? "none" : "flex";
}

enregistrer();

window.addEventListener('DOMContentLoaded', () => {
    if (Object.keys(oldQuestions).length > 0) {
        total.dispatchEvent(new Event('input'));
    }
});