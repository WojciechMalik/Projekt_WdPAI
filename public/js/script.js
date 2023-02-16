const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirm-password"]');
const inputs = form.querySelectorAll('input[type=text]');

function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}
function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}
function markValidation(element, condition) {
    !condition ? element.parentElement.classList.add('no-valid') : element.parentElement.classList.remove('no-valid');
}

function validateEmail() {
    markValidation(emailInput, isEmail(emailInput.value));
}

function validatePassword() {
    const condition = arePasswordsSame(
        confirmedPasswordInput.parentElement.previousElementSibling.querySelector('input').value,
        confirmedPasswordInput.value
    );
    markValidation(confirmedPasswordInput, condition);
}

emailInput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePassword);

form.addEventListener('submit', event =>{
    inputs.forEach(input => {if(input.value === ''){
        event.preventDefault();

    }});

    if(arePasswordsSame(inputs[1].value, inputs[2].value) && isEmail(inputs[0].value))
        event.preventDefault();
});


