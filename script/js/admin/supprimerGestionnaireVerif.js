// selection du formulaire
let form = document.getElementById("supForm");

// gestion du comportement lors du submit
form.addEventListener("submit",function(e) {
    
    // arret la propagation
    e.stopPropagation();

    // selection du tableau de checkbox
    let tabCheck = document.getElementsByClassName("selector");

    // booleen verficateur de selection complet
    let boolSelectAll = true;

    // verification de la valeur de toute checkbox
    for (let i = 1; i < tabCheck.length; i++) {

        if(tabCheck[i].checked == false){
            boolSelectAll = false;
        }
    
    }

    if(boolSelectAll ==true){
        // arret du comportement par defaut
        e.preventDefault();
        alert("au moin un gestionnaire doit etre garder pour permetre la connexion a la platform");
    }

});