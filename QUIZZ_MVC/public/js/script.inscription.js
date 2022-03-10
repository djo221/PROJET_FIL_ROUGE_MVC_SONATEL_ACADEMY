/* import {  test }  from  './script.connexion.js'; */
import * as TEST from './script.connexion.js';

const prenom = document.getElementById('prenom');
const nom =  document.getElementById('nom');
const passwordconf = document.getElementById("c-password");
const avatar = document.getElementById("avatar-joueur");
const choose = document.getElementById('choose');
const password = document.getElementById('password');

prenom.addEventListener('input', ()=>{
    TEST.checkRequired([prenom]);
   })

 nom.addEventListener('input', ()=>{
    TEST.checkRequired([nom]);
   })

passwordconf.addEventListener('input', ()=>{
   TEST. checkPasswordMatch( password, passwordconf);
   })

/*    function checkPasswordMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'Passwords do not match!');
        formulaire.addEventListener('submit',listener);
    } else{
        showSuccess(input2);
        formulaire.removeEventListener("submit", listener);
    }
} */


 avatar.addEventListener("click" , ()=>{
        
    choose.click();
    choose.addEventListener("change" , change () , false )
} )

function change() {
    
}