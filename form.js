/* Vérification email */
// On créer une variable avec toutes les emails temporaires : 
let tabemail ="uooos.com, nthrw.com, bbitq.com, alldrys.com,moabuild.com,    20minutemail.it, diolang.com, aosod.com , sharklasers.com, guerrillamail.info, grr.la, guerrillamail.biz, guerrillamail.com, guerrillamail.de, guerrillamail.net, guerrillamail.org, guerrillamailblock.com, pokemail.net, spam4.me , musiccode.me, lyricspad.net, vusra.com, gufum.com, best-john-boats.com, trickyfucm.com, smartinbox.online, goonby.com, plexfirm.com, 10mail.org, firste.ml, zeroe.ml, vintomaper.com, fillallin.com, mailsac.com, mails.omvvim.edu.in, onetimeusemail.com, midiharmonica.com, yopmail.com, crazymailing.com, wemel.site, mybx.site, emeil.top, mywrld.top, matra.top, memsg.site, emailnax.com, inboxbear.com, trashmail.fr, trashmail.se, my10minutemail.com"

let emailTemp = tabemail.split(", ")
let email_selected = document.querySelector('.email')
email_selected.addEventListener('keyup', (e=> {
    email = email_selected.value
    emailTempDetection(email_selected, email, emailTemp)
}))
function emailTempDetection (inputselect, email, emailTemp) {
  emailDetected = email.split('@')[1]
    if (emailTemp.includes(emailDetected) == true) {
      inputselect.style.backgroundColor = "red";
    }
    else {
      inputselect.style.backgroundColor = "green"
    }
  }

let formSelect = document.querySelector('#voiture')
let formOption = formSelect.options
let prix = document.querySelector(".prix-voiture")

formSelect.addEventListener("click", (e =>{
  prixSelected(formOption, prix)
}))
function prixSelected(option,element) {
  let prix_selected = option.selectedIndex
  
  element.innerHTML = option[prix_selected].dataset.prix
}