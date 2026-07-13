const NB_LIGNES = 4;
const NB_COLONNES = 14;

document.getElementById("apper").addEventListener("click", () => {

    const reponse = document
        .getElementById("reponse")
        .value
        .trim()
        .toUpperCase();

    console.log(reponse);

    creationCase();

    const lignes = decouperPhrase(reponse);
    console.log(lignes);
    if(lignes.length > NB_LIGNES){
        alert("La phrase est trop longue.");
        return;
    }

    afficher(lignes);

});

function creationCase(){

    let html = "";

    for(let i=0;i<NB_LIGNES;i++){

        html += "<tr>";

        for(let j=0;j<NB_COLONNES;j++){

            html += `
                <td class="p-1">

                    <input
                        id="${i}-${j}"
                        type="text"
                        maxlength="1"
                        disabled

                        class="
                            w-12
                            h-12
                            rounded-lg
                            text-center
                            text-xl
                            font-bold
                            uppercase
                            bg-gray-200
                            border
                            border-gray-300
                            transition-all
                            duration-300
                            disabled:opacity-100
                        ">

                </td>
            `;

        }

        html += "</tr>";

    }

    document.getElementById("contenue").innerHTML = html;

}
function decouperPhrase(phrase){
    // convertir en tableau
    const mots = phrase.split(" ");

    const lignes = [];

    let ligne = "";

    for(const mot of mots){


        if(mot.length > NB_COLONNES){
            alert(`Le mot "${mot}" est trop long (${mot.length} caractères). Maximum autorisé : ${NB_COLONNES}.`);
            return;
        }

        if(ligne === ""){

            ligne = mot;

        }else if((ligne + " " + mot).length <= NB_COLONNES){

            ligne += " " + mot;

        }else{

            lignes.push(ligne);

            ligne = mot;

        }

    }


    if(ligne !== "")
        lignes.push(ligne);

    return lignes;

}

function afficher(lignes){

    const debutVertical = Math.floor((NB_LIGNES-lignes.length)/2);

    for(let i=0;i<lignes.length;i++){

        const texte=lignes[i];

        const debutHorizontal=Math.floor((NB_COLONNES-texte.length)/2);

        for(let j=0;j<texte.length;j++){

            const input=document.getElementById(`${debutVertical+i}-${debutHorizontal+j}`);

            input.value=texte[j];

            if (texte[j] !== " ") {
                input.classList.add(
                    "bg-vert",
                    "text-white",
                    "border-green-700",
                    "shadow-md",
                    "scale-105"
                );
            }

        }

    }

}