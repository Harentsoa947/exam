// let nbr_ligne = document.getElementById('nbr_ligne').value
// let nbr_colonne = document.getElementById('nbr_colonne').value
document.getElementById('creation').addEventListener('click', function(){
    let nbr_ligne = document.getElementById('nbr_ligne').value
    let nbr_colonne = document.getElementById('nbr_colonne').value
    if (nbr_ligne == '' || nbr_colonne == '') {
        alert('Remplissez les champs')
        return
    }
    creationCase(nbr_ligne, nbr_colonne)
    caseNoir()
})

function creationCase(ligne, colonne){
    let aff_colonne = ""
    let aff_ligne = ""
    for(let i = 1; i <= colonne; i++){
        aff_colonne += creerColonne()
    }
    for(let j = 1; j <= ligne; j++){
        aff_ligne += creerLigne(aff_colonne)
    }

    let final = htmlBase(aff_ligne)

    document.getElementById('cases').innerHTML = final
}

function htmlBase(contenu){
    return `<div class="flex justify-center gap-5">
        <div>
            <table class="grille">
                ${contenu}
            </table>
        </div>
        
    </div>`
}

function creerColonne(){
    return `<td><input type="text" class="cadre" maxlength="1"></td>`
}

function creerLigne(col){
    return  `<tr>
                ${col}
            </tr>`
}

function caseNoir(){
    document.querySelectorAll('.cadre').forEach(item=>{
        // clique droite
        item.addEventListener('contextmenu', function(e){
            e.preventDefault()
            const noir = this.classList.toggle('case_noir');
            this.disabled = noir;
            this.blur();
        })
    })
}