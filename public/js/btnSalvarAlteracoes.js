const divPaiBtns = document.getElementById('btnsTable');

const registrosAlterados = [];


function salvandoAlteracoes(){
    document.querySelectorAll(".campo_nome").forEach(input => {
        if(input.dataset.original != input.value){
            
            registrosAlterados.push({
                id: input.dataset.id,
                nome:input.dataset.value
            })


        } 


    })

    fetch(
        "../../Controllers/ContatoController.php", {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            },
            body:JSON.stringify({
                action: "update",
                registros: registrosAlterados   
            })
        }
    )
}


divPaiBtns.addEventListener('click', function (e) {
    if(e.target.id === "save"){
        salvandoAlteracoes();
    }
})


