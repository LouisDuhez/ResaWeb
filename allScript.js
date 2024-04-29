// Animation au défilement du navigateur
// création de l'observeur
let ratio = 0.5
let options = {
    root: null,
    rootMargin: "0px",
    threshold: ratio,
  };
  function handleIntersect (entries, observer) {
    entries.forEach(function(entry) {
        if(entry.intersectionRatio > ratio) {
            entry.target.classList.add("reveal")
        }
    })
  }

  let observer = new IntersectionObserver(handleIntersect, options);
  document.querySelectorAll(".hide").forEach(function (reveal){
    observer.observe(reveal)
  }
  );


  /*animation du compteur avec la librairie Counter-up 2*/
let counterUp = window.counterUp.default

let callback = entries => {
	entries.forEach( entry => {
		let el = entry.target
		if ( entry.isIntersecting && ! el.classList.contains( 'is-visible' ) ) {
			counterUp( el, {
				duration: 2000,
				delay: 16,
			} )
			el.classList.add( 'is-visible' )
		}
	} )
}

let IO = new IntersectionObserver( callback, { threshold: 1 } )

let el = document.querySelector( '.number' )
IO.observe( el )
