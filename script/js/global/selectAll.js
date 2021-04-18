function selector(select){
    

    // selection 
    let firstElt = document.getElementsByClassName(select)[0];

    // evenement click declanche une selection complet
    firstElt.addEventListener("click",function(e){

    // stop la propagation et les comportement par defaut
    e.stopPropagation();

    // tableau de checkbox
    let tab = document.getElementsByClassName(select);


    // passer toute les checkbox en on
    if(tab[0].checked == true){
        for (let i=0; i<tab.length; i++){
            tab[i].checked = true;
        }
    }else{
        for (let i=0; i<tab.length; i++){
            tab[i].checked = false;
        }
    }


    });


    // tableau de checkbox
    let tabCheck = document.getElementsByClassName(select);
    for (let j = 0; j < tabCheck.length; j++) {  

        // selection des checkbox
        tabCheck[j].addEventListener("click",function(e){

            //  annulation de la selection global
            if(tabCheck[j].checked == false){
                firstElt.checked = false;
            }

            // booleen verficateur de selection complet
            let boolSelectAll = true;

            // verification de la valeur de toute checkbox
            for (let i = 1; i < tabCheck.length; i++) {

                if(tabCheck[i].checked == false){
                    boolSelectAll = false;
                }
            
            }
            
            if(boolSelectAll ==true){
                firstElt.checked = true;
            }

        });


    }

}

// appel

selector("selector");
selector("selector1");