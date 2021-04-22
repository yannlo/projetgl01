// selection du lien de redirection
let redirection = document.getElementById("linkRedirection");

// creation de l'evenement de verification
redirection.addEventListener("click", function(e){
    // comportement par defaut
    e.preventDefault();
    e.stopPropagation();

    // requete de verification de l'exitance de exemplaire
    var xhr = new XMLHttpRequest();
    
    // fonction de retour de la requete
    xhr.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){

            // reception de la reponce et formatage
                var reponse = this.response;
                console.log(reponse);
                
                // creation de l'alert correspondante
                if (reponse["code"] != 0) {
                alert(reponse["message"]);   
            }else{
                // soumission du formulaire
                window.location.href = "formulaireExemplaire.php";
            }


        }else if(this.readyState== 4){
    
        }
    };

    // detail de l'envoie de le requete
    xhr.open("POST", "script/php/copy/verificationExistance.php", true);
    xhr.responseType ="json";
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
});