document.getElementById('question').addEventListener('input', function(){
    console.log("Appeller fonciton création");
    creation(this.value)
})

function creation(iteration){
    let html = "";
    for(let i = 1; i <= iteration; i++){
        html += `<div class="mx-15 mb-6">
        <div class="question_reponse px-4 rounded-2xl pt-5 border">
            <div class="mb-3">
                <label class="block font-semibold text-gray-700 mb-2">
                    Question ${i}
                </label>
                <input type="text" placeholder="Entrez le question" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" id="  ">
            </div>
            <div class="mb-3">
                <label class="block font-semibold text-gray-700 mb-2">
                    Réponse ${i}
                </label>
                <input type="text" placeholder="Entrez la réponse attendue" class="w-full rounded-lg border border-green-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" id="  ">
            </div>
        </div>
    </div>`
    }
    

    document.getElementById('quest').innerHTML = html
}