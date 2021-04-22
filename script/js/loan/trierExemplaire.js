let selectVal = document.getElementById("livre");

selectVal.addEventListener("change", function(e){

    e.stopPropagation();

    let xhr = new XMLHttpRequest();

    let value = this.options[this.selectedIndex].value;


    // fonction de retour de la requete
    xhr.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){

            // reception de la reponce et formatage
            var reponse = this.response;
            let exemplaire = document.getElementById("codeExemplaire");
            exemplaire.innerHTML =reponse['resultat'];


        }else if(this.readyState== 4){

        }
    };

    // detail de l'envoie de le requete
    xhr.open("POST", "script/php/loan/trierExemplaire.php", true);
    xhr.responseType ="json";
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("code="+value);
});