/* SearchBar */
/* On crée une variable qui permet de sélectionner la barre de recherche */
let searchBar = document.querySelector(".searchbar");
/* On ajoute un événement qui permet de récupérer ce qui est tapé */
searchBar.addEventListener('keyup', (e) => {
/* on récupère la lettre recherchée que l'on stocke dans une nouvelle variable searchedLetters */
let searchedLetters = e.target.value;
/* On récupère les différentes cartes que l'on stocke dans une variable. Ici, on utilise un querySelectorAll pour pouvoir prendre toutes les cartes dans une NodeList. */
let voitureCards = document.querySelectorAll(".car-card");
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
  