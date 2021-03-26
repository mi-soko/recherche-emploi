const posteJob = document.getElementById('postJob');


posteJob.addEventListener('click',(e) => {

    e.preventDefault()
    posteJob.classList.add("disabled")
    fetch("https://localhost:8000/offer/subscribe/"+posteJob.dataset.id)
        .then((response) => {
          response.json().then((res) => {

            if(!res.contain && res.isSuccess){
                posteJob.textContent = "Annuler"
            }
          if(res.isSuccess && res.contain){
              posteJob.textContent = "Postuler"
          }
          posteJob.classList.remove("disabled")

          })
        })
        .catch((err) => {
            window.alert("Erreur pour" + posteJob.textContent + err)
        })

})
