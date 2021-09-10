//on select les inputs pour ajouter la classe active form (pour changer la couleur des bordures)
document.querySelectorAll("input").forEach(element => {
    element.classList.add('activeForm')
});

//on select les textarea pour ajouter la classe active form (pour changer la couleur des bordures)
document.querySelectorAll("textarea").forEach(element => {
    element.classList.add('activeForm')
});

//on select les selects pour ajouter la classe active form (pour changer la couleur des bordures)
document.querySelectorAll("select").forEach(element => {
    element.classList.add('activeForm')
});

//on select les selects pour ajouter la classe active form (pour changer la couleur des bordures)
document.getElementById("pwdConstraint").querySelectorAll('ul').forEach(element => {
        element.classList.add('p-0')
})
//on select la search bar du header pour supprimer la class activeForm qui rencontre en conflit avec d'autres de ses classes
document.querySelectorAll("#search_header_bar").forEach(element => {
    element.classList.remove('activeForm')
});

//on select les checkboxes pour supprimer la class activeForm qui rencontre en conflit avec d'autres de ses classes
document.querySelectorAll("input[type=checkbox]").forEach(element => {
    element.classList.remove('activeForm')
});

document.querySelectorAll('a[href=" /CGU "] label').forEach(element => {
    element.setAttribute('for', '');
    element.classList.add('text-secondary', 'pointer', 'text-decoration-underline')
});

//on select les li générés par le knp pour supprimer les classes first
document.querySelectorAll('li').forEach(element => {
    element.querySelectorAll(".first").forEach(element2 => {
        element2.classList.remove('first')
    })
});

//on select les li générés par le knp pour supprimer les classes last
document.querySelectorAll('li').forEach(element => {
    element.querySelectorAll(".last").forEach(element2 => {
        element2.classList.remove('last')
    })
});

//on select le menu selectioné dans le mega pour changer le bg
document.querySelectorAll('li').forEach(element => {
    element.querySelectorAll(".last").forEach(element2 => {
        element2.classList.remove('last')
    })
});

//on select les div pour y ajouter un plus ou un moins selon si ils sont cliqués ou non
document.querySelectorAll('#CatPlusMinus').forEach(element => {

    element.classList.add('p_plus');

    document.getElementById('CatPlusMinusEvent').addEventListener("click", e =>{

        if (element.classList.contains('p_plus')){
            element.classList.remove('p_plus')
            element.classList.add('p_minus')
        }

        if (element.classList.contains('p_minus')) {
            element.classList.remove('p_minus')
            element.classList.add('p_plus')
        }

    })

});

    