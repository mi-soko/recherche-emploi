const btnExperience = document.querySelectorAll("#btn-experience");
const selectInput = document.querySelector(".js-select-multiple")
/**
 * permet de sélectionner un element
 */
btnExperience.forEach((i,index) => {
    // supprimer tout les elements qui sont active
    i.classList.remove('active-btn-experience')

    i.addEventListener("click",evt => {
        evt.preventDefault();
        btnExperience.forEach((index,number) => {
            index.classList.remove('active-btn-experience')
        });

        if (evt.target.classList.contains('active-btn-experience')){
            evt.target.classList.remove('active-btn-experience')
        }
        evt.target.classList.add('active-btn-experience')
        evt.target.value = evt.target.content
    })
})

$(document).ready(function() {
    $('.js-select-multiple').select2({
        placeholder: "Sélectionnez vos competences",
        allowClear: true
    });

});
