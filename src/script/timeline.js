let modify = document.querySelectorAll(".modifyFrom")
modify.forEach(form =>{
    form.style.display = "none"
})

let open_modify = document.querySelectorAll(".modify")
open_modify.forEach(button => {
    let isVisible = false
    button.addEventListenner("click", e => {
        const target = e.target
        const display = target.nextElementSiblind
        isVisible = !isVisible
        display.style.display = isVisible ? "block" : "none"
        target.innerHTML = isVisible ? "Annuler" : "Modifier"
    })
})

console.log("test")