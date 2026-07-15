function creerRelation(){
    let elementSelectionne = null
    document.querySelectorAll('.item').forEach(item =>{
        item.addEventListener('click', function(){
            if (this.classList.contains('gauche')) {
                if(this.classList.contains('related')){
                    console.log("Interdiction de recliquer");
                    return
                }
                this.classList.remove('bg-blue-600')
                if(elementSelectionne){
                    elementSelectionne.classList.remove('selecte')
                    elementSelectionne.classList.add('bg-blue-600')
                }
                elementSelectionne = this;
                this.classList.add('selecte')
            }
            else if(this.classList.contains('droite') && elementSelectionne){
                if(this.classList.contains('related') || elementSelectionne.classList.contains('related')){
                    console.log('Ne pas faire une relation');
                    return
                }
                this.classList.add('related')
                elementSelectionne.classList.add('related')
                const line = new LeaderLine(
                    elementSelectionne,
                    this,{
                        path: 'straight',
                        color: '#2b6cb0',
                        size: 3
                    }
                )
            }
        })
    })
    // console.log(document.querySelectorAll('.item'));
}


function reinitialiser() {
    // On parcourt le tableau et on applique .remove() sur chaque instance
    toutesLesLignes.forEach(ligne => {
      ligne.remove();
    });
  
    // On vide complètement le tableau pour repartir à zéro
    toutesLesLignes = [];
  }