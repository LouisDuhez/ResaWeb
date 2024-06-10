

let nb = 1;
let allnb = document.querySelectorAll(".supercars-js").forEach((e)=> {
  
  e.classList.add("nb"+ nb)
  nb = nb + 1
  return
})
let nb1 = document.querySelector(".nb1")
let nb2 = document.querySelector(".nb2")
let nb3 = document.querySelector(".nb3")

function addText (nb) {
  document.querySelectorAll(".explication-off")[nb].classList.add('explication-on')
  return
}
function removeText (a) {
  document.querySelectorAll(".explication-on")[a].classList.remove('explication-on')
  return
}

nb1.addEventListener('mouseover', function(event) {
  addText (0)
})
nb2.addEventListener('mouseover', function(event) {
  addText (1)
})
nb3.addEventListener('mouseover', function(event) {
  addText (2)
})



nb1.addEventListener('mouseleave', (e)=> {
  removeText (0)
})
nb2.addEventListener('mouseleave', (e)=> {
  removeText (0)
})
nb3.addEventListener('mouseleave', (e)=> {
  removeText (0)
})


//Vidéo de Kevin Powell : https://youtu.be/iLmBy-HKIAw?si=4DXGvl3-uxAzxbge

const scrollers = document.querySelectorAll(".scroller");

// If a user hasn't opted in for recuded motion, then we add the animation
if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
  addAnimation();
}

function addAnimation() {
  scrollers.forEach((scroller) => {
    // add data-animated="true" to every `.scroller` on the page
    scroller.setAttribute("data-animated", true);

    // Make an array from the elements within `.scroller-inner`
    const scrollerInner = scroller.querySelector(".scroller__inner");
    const scrollerContent = Array.from(scrollerInner.children);

    // For each item in the array, clone it
    // add aria-hidden to it
    // add it into the `.scroller-inner`
    scrollerContent.forEach((item) => {
      const duplicatedItem = item.cloneNode(true);
      duplicatedItem.setAttribute("aria-hidden", true);
      scrollerInner.appendChild(duplicatedItem);
    });
  });
}

/* boutton apparition formulaire */
document.querySelector('.avis-btn a').addEventListener('click', function(event){
  document.querySelector('.avis-formulaire').style.display = 'block'
})

