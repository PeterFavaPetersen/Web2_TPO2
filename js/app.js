"use strict"

const URL = "http://localhost/Web%202%20(XAMPP)/Codigo%20Practicos/TPO_2_API_REST/Web2_TPO2/api/mesadejuego";

let form = document.querySelector('#mesa-form');
form.addEventListener('submit', addMesa);


async function getAll() {

    try{
        let response = await fetch(URL);
        if(!response.ok){
            throw new Error('Estamos complicados, el recurso parece que no existe');
        }

        let mesadejuego = await response.json();
        showMesas(mesadejuego);
    } 
    catch(e){
        console.log(error);
    }
}
//CUANDO QUIERAS COMENZAR A HACER IF PARA LO QUE NECESITES
//LO QUE TENES QUE HACER ES PONER UYNOS RICOLINOS
//${ ELEMENO.VARIABLE == 1 ? 'VARIABLE' : ''}
//ACA TENERS UN EJEMPLO, CHINCULIN.
//https://youtu.be/2O8cmkobYDc
//CUALQUIER COSA, BUSCA COMO SE HACE EN SMARTY
function showMesas(mesadejuego){
    let ul = document.querySelector('#mesa-list');
    ul.innerHTML = "";
    for (const mesa of mesadejuego){
        ul.innerHTML += `
                        <li class="list-group-item">   
                            <span> ${mesa.id_mesadejuego}</span>
                            <span> ${mesa.juego}</span> 
                            <span> ${mesa.cantidadJugadores}</span>
                            <span> ${mesa.director}</span>
                        </li>
                        `;
    }
}


async function addMesa(e){
    e.preventDefault();

    let data = new FormData(form);
    let mesa =  {
        juego : data.get('juego'),
        cantidadJugadores : data.get('cantidadJugadores'),
        director : data.get('director'),
    };
    try {
        let response = await fetch(URL, {
            method: "POST",
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(task)
        });
        if(!response.ok){
            throw new Error('Estamos complicados, el recurso parece que no existe');
        }
        
    }
    catch(e){
        console.log(error);
    } 
    
}
getAll();


                    




