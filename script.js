// Etape 1 - Sélectionner nos éléments

let input      = document.querySelector("#prix")
let pseudo     = document.querySelector("#pseudo")
let error      = document.querySelector("small")
let formulaire = document.querySelector("#formulaire")
let scoreboard = document.querySelector("#update")

// Etape 2 - Cacher

error.style.display = "none";
scoreboard.style.display = "none";

// Etape 3 - Générer un nombre aléatoire

let nombreAleatoire = Math.floor(Math.random() * 1001);
let coups           = 0;
let nombreChoisi;

// Etape 6 - Verifier le nombre

function verifier(nombre) {
    let instruction = document.createElement("div");

    if(nombre < nombreAleatoire) {
        instruction.textContent = "#" + coups + " (" + nombre + ") C'est plus !";
        instruction.className = "instruction plus"

    }else if(nombre > nombreAleatoire) {
        instruction.textContent = "#" + coups + " (" + nombre + ") C'est moins !";
        instruction.className = "instruction moins"

    }else {
        instruction.textContent = "#" + coups + " (" + nombre + ") Félicitations vous avez trouvé le juste prix !";
        instruction.className = "instruction fini"
        scoreboard.style.display = "inline";
        input.disabled = true;
        document.cookie = "tries=" + coups;
        document.cookie = "pseudo=" + pseudo.value;
        
    }
    document.querySelector("#instructions").prepend(instruction);
    
}

// Etape 4 - Vérifier que l'utilisateur donne bien un nombre

input.addEventListener("keyup", () => {
    if(isNaN(input.value)) {
        error.style.display = "inline";
    }else {
        error.style.display = "none";
    }
});

// Etape 5 - Agir à l'envoi du formulaire

formulaire.addEventListener('submit', (e) => {
    e.preventDefault();

    if(pseudo.value == ""){
        pseudo.style.borderColor = "red";
    }else if(isNaN(input.value) || input.value == "") {
        input.style.borderColor = "red";
    }else{
        coups++;
        input.style.borderColor = "silver";
        pseudo.style.borderColor = "silver"
        nombreChoisi = input.value;
        input.value = "";
        verifier(nombreChoisi);
    }

});
