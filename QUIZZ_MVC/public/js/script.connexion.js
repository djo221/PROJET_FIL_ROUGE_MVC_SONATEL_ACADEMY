/* *****************connexion****************************/
const formulaire = document.getElementById('formulaire');
const login = document.getElementById('login');
const password = document.getElementById('password');
const listener = function (e){  e.preventDefault();}


 login.addEventListener('input', ()=>{
	 checkLength(login,6,20);
	 checkEmail(login);
	 checkRequired([login]);
	})
 password.addEventListener('input',()=>{
	 checkLength(password,6,20)
	 checkRequired([password]);
	})
function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'form error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}
function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form success'; 
}
function checkEmail(input) {//Tester si l'email est valide :  javascript : valid email
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (re.test(input.value.trim().toLowerCase())) {
        showSuccess(input);
		formulaire.removeEventListener("submit", listener);

    } else {
        showError(input,`Email is not valid!`);
		formulaire.addEventListener('submit',listener);

    }
}
export function checkRequired(inputArray) {// Tester si les champs ne sont pas vides
    inputArray.forEach(input => {

        if (input.value.trim() === '') {
            showError(input,`${getFieldName(input)} is required`);
			formulaire.addEventListener('submit',listener);

        }
		else
		{
            showSuccess(input);
		formulaire.removeEventListener('submit',listener);

        }
    }
	);
}
function getFieldName(input) {//Retour le nom de chaque input en se basant sur son id
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
//
function checkLength(input, min, max) {//Tester la longueur de la valeur  d'un input
    if(input.value.length < min){
        showError(input, `${getFieldName(input)} must be at least ${min} characters!`)
		formulaire.addEventListener('submit',listener);

    }else if(input.value.length > max){
        showError(input, `${getFieldName(input)} must be less than ${max} characters !`);
		formulaire.addEventListener('submit',listener);

    }else{
        showSuccess(input);
		formulaire.removeEventListener('submit',listener);

    }
}
//
export function checkPasswordMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'Passwords do not match!');
        formulaire.addEventListener('submit',listener);
    } else{
        showSuccess(input2);
        formulaire.removeEventListener("submit", listener);
    }
}