/* SearchBar */
/* On crée une variable qui permet de sélectionner la barre de recherche */
let searchBar = document.querySelector(".searchbar");

/* On récupère les différentes cartes que l'on stocke dans une variable. Ici, on utilise un querySelectorAll pour pouvoir prendre toutes les cartes dans une NodeList. */
let voitureCards = document.querySelectorAll(".car-card");

/* On ajoute un événement qui permet de récupérer ce qui est tapé */
searchBar.addEventListener('keyup', (e) => {

  /* on récupère la lettre recherchée que l'on stocke dans une nouvelle variable searchedLetters */
let searchedLetters = e.target.value;
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
    