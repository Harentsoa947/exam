// document.getElementById('creation').addEventListener('click', function(){
//     let nbr_ligne = document.getElementById('nbr_ligne').value
//     let nbr_colonne = document.getElementById('nbr_colonne').value
//     if (nbr_ligne == '' || nbr_colonne == '') {
//         alert('Remplissez les champs')
//         return
//     }
//     creationCase(nbr_ligne, nbr_colonne)
//     caseNoir()
// })

// function creationCase(ligne, colonne){
//     let aff_colonne = ""
//     let aff_ligne = ""
//     for(let i = 1; i <= colonne; i++){
//         aff_colonne += creerColonne()
//     }
//     for(let j = 1; j <= ligne; j++){
//         aff_ligne += creerLigne(aff_colonne)
//     }

//     // aff_ligne += `<div class="flex justify-end">

//     //     <button
//     //         class="bg-rouge text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200">
//     //         <i class="fa-solid fa-floppy-disk mr-2"></i>
//     //         Enregistrer
//     //     </button>

//     // </div>`

//     let final = htmlBase(aff_ligne)

//     document.getElementById('cases').innerHTML = final
//     document.getElementById('cases').innerHTML += `<div class="flex justify-end mt-5">
//          <button
//              class="bg-rouge text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200">
//              <i class="fa-solid fa-floppy-disk mr-2"></i>
//              Enregistrer
//           </button>

//     </div>`
// }

// // function htmlBase(contenu){
// //     return `<div class="flex justify-center gap-5">
// //         <div>
// //             <table class="grille">
// //                 ${contenu}
// //             </table>
// //         </div>
        
// //     </div>`
// // }

// function htmlBase(contenu){
//     return `
//     <div class="flex justify-center items-center w-full overflow-x-auto py-8">
//         <div class="bg-gray-100 p-6 rounded-2xl shadow-xl border border-gray-200">
//             <table class="border-collapse mx-auto">
//                 ${contenu}
//             </table>
//         </div>
//     </div>
//     `
// }

// // function creerColonne(){
// //     return `<td><input type="text" class="cadre" maxlength="1"></td>`
// // }

// function creerColonne(){
//     return `<td class="p-1">

//         <input
//             type="text"
//             maxlength="1"

//             class="
//                 cadre
//                 w-12
//                 h-12
//                 rounded-lg
//                 text-center
//                 text-xl
//                 font-bold
//                 uppercase
//                 bg-gray-200
//                 border
//                 border-gray-300
//                 transition-all
//                 duration-300
//                 disabled:opacity-100
//             ">

//     </td>
//     `
// }


// function creerLigne(col){
//     return  `<tr>
//                 ${col}
//             </tr>`
// }

// // function caseNoir(){
// //     document.querySelectorAll('.cadre').forEach(item=>{
// //         // clique droite
// //         item.addEventListener('contextmenu', function(e){
// //             e.preventDefault()
// //             const noir = this.classList.toggle('case_noir');
// //             this.disabled = noir;
// //             this.blur();
// //         })
// //     })
// // }

// function caseNoir(){
//     document.querySelectorAll('.cadre').forEach(item=>{
//         item.addEventListener('contextmenu', function(e){
//             e.preventDefault()

//             const noir = this.classList.toggle('case_noir');

//             this.disabled = noir;
//             this.blur();

//             if(noir){
//                 this.classList.add(
//                     'bg-black',
//                     'border-black',
//                     'cursor-not-allowed'
//                 )

//                 this.value = ""
//             }
//             else{
//                 this.classList.remove(
//                     'bg-black',
//                     'border-black',
//                     'cursor-not-allowed'
//                 )
//             }
//         })
//     })
// }


document.getElementById('creation').addEventListener('click', function(e){
    e.preventDefault();
    let nbr_ligne = document.getElementById('nbr_ligne').value;
    let nbr_colonne = document.getElementById('nbr_colonne').value;
    
    if (nbr_ligne == '' || nbr_colonne == '') {
        alert('Remplissez les champs');
        return;
    }

    document.getElementById('hidden_ligne').value = nbr_ligne;
    document.getElementById('hidden_colonne').value = nbr_colonne;

    creationCase(nbr_ligne, nbr_colonne);
    caseNoir();
});

function creationCase(ligne, colonne){
    let aff_ligne = "";
    
    for(let j = 1; j <= ligne; j++){
        let aff_colonne = "";
        for(let i = 1; i <= colonne; i++){
            aff_colonne += creerColonne(j, i);
        }
        aff_ligne += creerLigne(aff_colonne);
    }

    let final = htmlBase(aff_ligne);

    document.getElementById('cases').innerHTML = final;
    document.getElementById('cases').innerHTML += `
        <div class="flex justify-end mt-5">
             <button class="bg-rouge text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200">
                 <i class="fa-solid fa-floppy-disk mr-2"></i> Enregistrer
             </button>
        </div>`;
}

function htmlBase(contenu){
    return `
    <div class="flex justify-center items-center w-full overflow-x-auto py-8">
        <div class="bg-gray-100 p-6 rounded-2xl shadow-xl border border-gray-200">
            <table class="border-collapse mx-auto">
                ${contenu}
            </table>
        </div>
    </div>`;
}

function creerColonne(ligneIndex, colonneIndex){
    const ancienneLigne = oldGrille[ligneIndex] ?? {};
    const ancienneValeur = ancienneLigne[colonneIndex] ?? '';
    
    const estNoir = (ancienneValeur === 'XX');
    const classesOptionnelles = estNoir ? 'bg-black border-black cursor-not-allowed case_noir' : '';
    
    const readonlyAttr = estNoir ? 'readonly' : '';

    return `<td class="p-1">
        <input
            type="text"
            maxlength="2" 
            name="grille[${ligneIndex}][${colonneIndex}]"
            value="${ancienneValeur}"
            ${readonlyAttr}
            class="cadre w-12 h-12 rounded-lg text-center text-xl font-bold uppercase bg-gray-200 border border-gray-300 transition-all duration-300 ${classesOptionnelles}">
    </td>`;
}

function creerLigne(col){
    return `<tr>${col}</tr>`;
}

function caseNoir(){
    document.querySelectorAll('.cadre').forEach(item=>{
        item.addEventListener('contextmenu', function(e){
            e.preventDefault();

            const noir = this.classList.toggle('case_noir');
            
            if(noir){
                this.classList.add('bg-black', 'border-black', 'cursor-not-allowed');
                this.readOnly = true; 
                this.value = "XX";    
            }
            else{
                this.classList.remove('bg-black', 'border-black', 'cursor-not-allowed');
                this.readOnly = false;
                this.value = "";
            }
            this.blur();
        });
    });
}

// Restauration automatique après une erreur de validation
window.addEventListener('DOMContentLoaded', () => {
    if (Object.keys(oldGrille).length > 0) {
        const nbrLigne = document.getElementById('nbr_ligne').value;
        const nbrColonne = document.getElementById('nbr_colonne').value;
        
        if (nbrLigne && nbrColonne) {
            creationCase(nbrLigne, nbrColonne);
            caseNoir();
        }
    }
});