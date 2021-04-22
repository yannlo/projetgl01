let selectVal1 = document.getElementById("classe");

selectVal1.addEventListener("change", function(e){

    e.stopPropagation();

    let xhr = new XMLHttpRequest();

    let value1 = this.options[this.selectedIndex].value;


    // fonction de retour de la requete
    xhr.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){

            // reception de la reponce et formatage
            var reponse = this.response;
            let etudiant = document.getElementById("matriculeEtudiant");
            etudiant.innerHTML =reponse['resultat'];


        }else if(this.readyState== 4){

        }
    };

    // detail de l'envoie de le requete
    xhr.open("POST", "script/php/loan/trierEtudiant.php", true);
    xhr.responseType ="json";
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("code="+value1);
});