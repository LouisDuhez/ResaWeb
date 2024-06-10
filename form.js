// 1.a

/* Vérification email */
// On créer une variable avec toutes les emails temporaires : 
let tabemail ="uooos.com, nthrw.com, bbitq.com, alldrys.com,moabuild.com,    20minutemail.it, diolang.com, aosod.com , sharklasers.com, guerrillamail.info, grr.la, guerrillamail.biz, guerrillamail.com, guerrillamail.de, guerrillamail.net, guerrillamail.org, guerrillamailblock.com, pokemail.net, spam4.me , musiccode.me, lyricspad.net, vusra.com, gufum.com, best-john-boats.com, trickyfucm.com, smartinbox.online, goonby.com, plexfirm.com, 10mail.org, firste.ml, zeroe.ml, vintomaper.com, fillallin.com, mailsac.com, mails.omvvim.edu.in, onetimeusemail.com, midiharmonica.com, yopmail.com, crazymailing.com, wemel.site, mybx.site, emeil.top, mywrld.top, matra.top, memsg.site, emailnax.com, inboxbear.com, trashmail.fr, trashmail.se, my10minutemail.com"

let emailTemp = tabemail.split(", ")
let email_selected = document.querySelector('.email')
email_selected.addEventListener('keyup', (e=> {
    email = email_selected.value
    emailTempDetection(email_selected, email, emailTemp)
}))

let form = document.querySelector('form')
form.addEventListener("submit", (e => {
  if (emailTempDetection (email_selected, email, emailTemp)== true) {
    e.preventDefault() // Pour désactiver l'envoie des données 
    alert('Les emails temporaires ne sont pas autorisés.')
  }
}))
function emailTempDetection (inputselect, email, emailTemp) {
  emailDetected = email.split('@')[1]
    if (emailTemp.includes(emailDetected) == true) {
      inputselect.style.borderBottom = "solid 3px red"
      document.querySelector('.erreur').innerHTML ="Erreur email temporaire"
      document.querySelector('.erreur').style.color="red"
      return true
    }
    else {
      document.querySelector('.erreur').innerHTML =""
      return false
    }
  }

// 1.a
let formVoiture = document.querySelectorAll('select')
let formSelect = document.querySelector('#voiture')
let formOption = formSelect.options
let formSelect2 = document.querySelector('#voiture2')
let formOption2 = formSelect2.options
let prix = document.querySelector(".prix-voiture")

formVoiture.forEach((e=> {
  e.addEventListener("click", (e =>{
    prixSelected(formOption, formOption2, prix)
  }))
}))
function prixSelected(option,option2,element) {
  let prix_selected = option.selectedIndex
  let prix_selected2 = option2.selectedIndex
  element.innerHTML = parseInt(option[prix_selected].dataset.prix) + parseInt(option2[prix_selected2].dataset.prix) + " "
}

let AjoutvoitureBtn = document.querySelector("#Ajoutvoiture")

AjoutvoitureBtn.addEventListener("click", (e => {
  document.querySelector(".voiture2").style.display ="block"
  AjoutvoitureBtn.style.display= "none"
}))