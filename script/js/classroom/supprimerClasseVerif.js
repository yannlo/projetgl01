// selection du formulaire
let form = document.getElementById("supForm");

// gestion du comportement lors du submit
form.addEventListener("submit",function(e) {

    // arret la propagation
    e.stopPropagation();
    e.preventDefault();
    
    // envoie de requete de verification d'utilisation
    var xhr = new XMLHttpRequest();
    
    // formatage des donnee du formulaire
    var data = new FormData(this);
    
    // fonction de retour de la requete
    xhr.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){

            // reception de la reponce et formatage
             var reponse = this.response;

            // creation de l'alert correspondante
            if (reponse["code"] != 0) {
                alert(reponse["message"]);   
            }else{
                // soumission du formulaire
                form.submit(); 
            }


        }else if(this.readyState== 4){
    
        }
    };

    // detail de l'envoie de le requete
    xhr.open("POST", "../../script/php/classroom/verificationUtilisation.php", true);
    xhr.responseType ="json";
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);

});