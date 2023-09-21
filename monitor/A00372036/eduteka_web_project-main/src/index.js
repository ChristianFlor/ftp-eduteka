const openResForm = document.querySelectorAll(".registration");
const closeResForm = document.querySelector('#close-registration-form');
const registrationFormModal = document.querySelector('#registration-form-modal');
const registrationForm = document.querySelector("#registration-form");
const agradecimientoModal = document.querySelector("#agradecer");
const closeThaksModal = document.querySelector("#close-thanks");

openResForm.forEach(button => {
    button.addEventListener('click', () => {
        registrationFormModal.showModal();
        registrationForm.reset();
        console.log('registratation');
    });
});
    

closeThaksModal.addEventListener('click', () => {
    agradecimientoModal.close();
});

closeResForm.addEventListener('click', () => {
    registrationFormModal.close();
});

registrationForm.addEventListener("submit", () => {


    let nombre = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let pais = document.getElementById("country").value;
    let areaEnseñanza = document.getElementById("teaching-area").value;
    let comentario = document.getElementById("comentarios").value;

    let registro = {}
    registro.name = nombre;
    registro.email = email;
    registro.country = pais;
    registro.teachingArea = areaEnseñanza;
    registro.comment = comentario;

    console.log(registro);

    agradecimientoModal.showModal();
});