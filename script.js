let supercars = document.querySelector(".supercars-js")
let limousine = document.querySelector(".limousine-js")
let oldcars = document.querySelector(".oldCars-js")

function addText (nb) {
  document.querySelectorAll(".explication-off")[nb].classList.add('explication-on')
  return
}
function removeText (a) {
  document.querySelectorAll(".explication-on")[a].classList.remove('explication-on')
  return
}

supercars.addEventListener('mouseover', function(event) {
  addText (0)
})
limousine.addEventListener('mouseover', function(event) {
  addText (1)
})
oldcars.addEventListener('mouseover', function(event) {
  addText (2)
})



supercars.addEventListener('mouseleave', (e)=> {
  removeText (0)
})
limousine.addEventListener('mouseleave', (e)=> {
  removeText (0)
})
oldcars.addEventListener('mouseleave', (e)=> {
  removeText (0)
})


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

  