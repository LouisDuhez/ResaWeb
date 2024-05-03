let position
position = 1

let photo = document.querySelector('.js-photo')

let photoWidth = photo.offsetWidth


window.setInterval(decaleGauche,3000)
function decaleGauche() { 
    position +=1
    if (position == 4) {
        retourDebut ()
    }
    else {
        document.querySelector('.js-photos').style.left = position * - photoWidth + "px"
    }
    return
}

function retourDebut () {
    document.querySelector('.js-photos').style.transition ="0s"
    position = 0
    document.querySelector('.js-photos').style.left = position * -photoWidth + "px"
    setTimeout(function () {
        document.querySelector('.js-photos').style.transition ="0.3s"
        decaleGauche ()
    }, 20)

}
function retourFin () {
    document.querySelector('.js-photos').style.transition ="0s"
    position = 4
    document.querySelector('.js-photos').style.left = position *-photoWidth + "px"
    setTimeout(function() {
        document.querySelector('.js-photos').style.transition ="0.3s"
        decaleDroite()

    }, 20)
}


