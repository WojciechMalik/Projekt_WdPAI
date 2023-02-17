const form = document.querySelector("form");
const button = form.querySelector("select");
const inputs = form.querySelectorAll('input');
console.log(button);

form.addEventListener('submit', event =>{
    inputs.forEach(input => {
        if(input.value.length == 0)
            event.preventDefault();
    });
});