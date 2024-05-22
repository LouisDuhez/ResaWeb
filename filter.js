/* SearchBar */
/* On crée une variable qui permet de sélectionner la barre de recherche */
let searchBar = document.querySelector(".searchbar");

/* On récupère les différentes cartes que l'on stocke dans une variable. Ici, on utilise un querySelectorAll pour pouvoir prendre toutes les cartes dans une NodeList. */
let voitureCards = document.querySelectorAll(".car-card");

/* On ajoute un événement qui permet de récupérer ce qui est tapé */
searchBar.addEventListener('keyup', (e) => {

  /* on récupère la lettre recherchée que l'on stocke dans une nouvelle variable searchedLetters */
let searchedLetters = e.target.value.toLowerCase();
voitureCards
/* Ensuite, on applique une fonction de tri en utilisant searchedLetters et cards comme entrées afin de les comparer. */
  filterElements(searchedLetters, voitureCards);
});

/* On crée maintenant une fonction pour rechercher si des lettres sont présentes dans les cartes */
function filterElements(letters, elements) {
  if (letters.length == 0){
      document.querySelectorAll(".car-card").forEach(function (e){
      e.style.display= "block";
    }
  )
      
    }
    
  else {
    if (letters.length > 0) {
      /* On crée une boucle for avec i (index) initialisé à 0 qui va ensuite s'incrémenter (grâce à i++) pour pouvoir parcourir tous les éléments */
      for (let i = 0; i < elements.length; i++) {
        /* on vérifie que la variable letters est bien contenue dans elements */
        if (elements[i].textContent.toLowerCase().includes(letters)) {
          /* Si letters est contenue dans elements alors on met un display block */
          elements[i].style.display = "block";
        } else {
          /* Si letters n'est pas contenue dans elements alors on met un display none */
          elements[i].style.display = "none";
        }
      }
    }
  }
  }
  

  /* Tri des éléments en fonction du select */
// On récupère les informations au clic
// On sélectionne le sélecteur
let marques = document.querySelector("#marques");

// On ajoute un événement click pour savoir quand l'utilisateur va cliquer sur la barre de recherche et pouvoir lancer le tri
marques.addEventListener('click' , (e)=> {
  
    // On sélectionne les options sélectionnées et on prend leurs valeurs pour les stocker dans une variable marques_selected
    let option_selected = marques.options.selectedIndex;
    let marque_selected = marques.options[option_selected].value;
   
    /* On lance la fonction triElements pour trier en fonction de marque_selected et voitureCards qui est l'ensemble de toutes les cartes des voitures (élément parent) */
    triElements(marque_selected, voitureCards);
  
    /* Fonction pour trier les éléments en fonction de leurs data-marques */
    function triElements(option, elements) { 
        // Pour chaque élément de elements, on va appliquer des conditions pour pouvoir afficher ou non les différentes cartes
        elements.forEach((e) => {
            // On initialise avec l'option numéro 0 qui est "all" qui met donc toutes les cartes en display="block"
            if (option === "all") {
                e.style.display = "block";
            }
            // Sinon, on applique le système de tri
            else {
                if (option === e.dataset["marque"]) {
                    e.style.display = "block";
                } else {
                    e.style.display = "none";
                }
            }
        });
    }
});
    
/* trier par prix */
let prix = document.querySelector("#prix");
let listCars = document.querySelector(".cars-wrapper")
prix.addEventListener("click", (e)=> {
  let option_prix_selected = prix.options.selectedIndex;
  let prix_selected = prix.options[option_prix_selected].value;
  console.log(prix_selected)
  triPrix (prix_selected,listCars)
  document.querySelectorAll(".car-card").forEach((elements=> {
    elements.classList.add("reveal")
  }))
  
})

function triPrix(option){

    // Étape 1 : Mettre les éléments HTML dans un tableau
  let tableauCars = [];
  //Sélectionner tous les éléments des cards
  let balisesCars = document.querySelectorAll(".car-card")
  // Mettre tous les éléments li dans le tableau tableauCars
  balisesCars.forEach(function(baliseCars){
    // ajouter baliseFilm dans la bonne case de tableauCars
    tableauCars.push(baliseCars);
  })
  // Étape 2 : Trier le tableau par prix de voiture
  if (option === "ASC") {
    tableauCars.sort(function(baliseCars1,baliseCars2){
      // On utilise les data-attributes prix des balises
      // pour la fonction de comparaison
      let prix1 = parseInt(baliseCars1.dataset.prix)
      let prix2 = parseInt(baliseCars2.dataset.prix)
      if( prix1 < prix2 ){return -1}
      if( prix1 == prix2 ){return 0}
      if( prix1 > prix2 ){return 1}
      
    })
  }
  else if (option === "DESC") {
    tableauCars.sort(function(baliseCars1,baliseCars2){
      // On utilise les data-attributes prix des balises
      // pour la fonction de comparaison
      let prix1 = parseInt(baliseCars1.dataset.prix)
      let prix2 = parseInt(baliseCars2.dataset.prix)
      if( prix1 < prix2 ){return 1}
      if( prix1 == prix2 ){return 0}
      if( prix1 > prix2 ){return -1}
      
    })
  }
  // Étape 3.1 : Vider la liste des voitures
  document.querySelector(".cars-wrapper").innerHTML = "";
  // Étape 3.2 : Remettre les éléments HTML du tableau dans la page web
  tableauCars.forEach(function(baliseHTMLCars){
    // Ajouter à la fin du code HTML de la liste des voitures
    // le code HTML stocké dans la case du tableau visitée :
    document.querySelector(".cars-wrapper").innerHTML += baliseHTMLCars.outerHTML;
  })
}






/*test trie par prix (fonctionne pas)*/
// function triPrix(option, elements) {
//   let tabprice = 0
//     for (let i = 0; i < elements.length; i++){
//       if(option === "DESC") {
//         if(elements[i].dataset["prix"] > elements[i + 1].dataset["prix"]) {
//           return tabprice = (elements[i].innerHTML)
//         }
//         else {
//           return tabprice = (elements[i + 1].innerHTML)
//         }
//       }
//       if(option === "ASC") {
//         if(elements[i].dataset["prix"] < elements[i + 1].dataset["prix"]) {
//           return tabprice = (elements[i].innerHTML)
//         }
//         else {
//           return tabprice = (elements[i + 1].innerHTML)
//         }
//       }
//       elements.innerHTML =""
//       elements.innerHTML = elements.innerHTML + tabprice
//     }
  
// }
