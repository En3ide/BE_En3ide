 

var setupEvents = function() {

    var insertButton = document.getElementById("insertButton");
    insertButton.addEventListener("click", insertImage);
    
    // on peut aussi condenser l'écriture ainsi :
    document.getElementById("appendButton").addEventListener("click", appendImage);

    var removeButton = document.getElementById("removeButton");
    removeButton.addEventListener("click", removeImage);

    var replaceButton = document.getElementById("replaceButton");
    replaceButton.addEventListener("click", replaceImage);
	
	var traitementButton = document.getElementById("traitementButton");
    traitementButton.addEventListener("click", function(){traiterImage(this);});
	
	var images = document.getElementsByTagName("img");
    
	for(var index = 0; index < images.length; index++) {
        images[index].addEventListener("click",selection);
    }
	
	 document.getElementById("chargerButton").addEventListener("click", charger);
	 document.getElementById("effacerButton").addEventListener("click", effacer);
	 document.getElementById("annuler_R_Button").addEventListener("click", annuler_R);
	 /* A compléter */	
	
    load();
}

window.addEventListener("load", setupEvents);

// ==================================================
var selectedImage = null;

/** marque comme "slectedImage" l'image cliquée si elle ne l'était pas déjà, 
sinon la désélectionne : selectedImage passe à null 
l'image sélectionnée à l'id #selected
*/
var selection = function() {
    if (selectedImage == this) {
        selectedImage = null;
        this.id ="";
    } else {
    if (selectedImage // ==true quand selectedImage != null
        && selectedImage != this) {         
            selectedImage.id="";
        }
        selectedImage = this;
        this.id = "selected";
    }
}

/** crée un nouveau noeud image avec la src prise au hasards dans tabSrc*/
var createImage = function() {
    var imgNode = document.createElement("img")
    imgNode.src = tabSrc[Math.floor(Math.random()*tabSrc.length)];
    return imgNode;
}
var tabSrc = ["img/image1.jpg", "img/image2.jpg", "img/image5.jpg", "img/image3.jpg","img/image4.jpg"];

// insère une nouvelle image que l'on crée avant selectedImage, l'image reste sélectionnée
var insertImage = function() {
    if (selectedImage) {  //  --------------------------------------------------
        // --------------------------------------------------
        var parent = selectedImage.parentNode;
        var newImage = createImage();
        //  --------------------------------------------------
        newImage.addEventListener("click",selection);
        //  --------------------------------------------------
        parent.insertBefore(newImage,selectedImage);
    }
    else { // -------------------------------------------------- 
        window.alert("Sélectionnez d'abord  une image.");
    }
}


// ajoute une nouvelle image à la fin de toute les autres, aucune image n'a besoin d'être sélectionnée
var appendImage = function() {
        /* A compléter*/
  }
// supprime l'image sélectionnée (si elle existe)
var removeImage = function() {
    if (selectedImage) {  // selectedImage != null    
          /* A compléter*/
    }
    else { // (== pas de sélection) 
         window.alert("Sélectionnez d'abord  une image.");
    }

}


// remplace l'image sélectionnée (si elle existe) par une image au hasard, la nouvelle image est sélectionnée
var replaceImage = function() {
    if (selectedImage) {  // selectedImage != null    
         /* A compléter*/
    }   
    else { // (== pas de sélection) 
        window.alert("Sélectionnez d'abord  une image."); 
    }

}

var zoneTraitement = false;

// ouvrir zone de traitement d'image
var traiterImage = function(e) {
    if (zoneTraitement == false) {   
        zoneTraitement = true;
		e.innerHTML = "Fermer traitement image"
		document.getElementById("traitementImg").setAttribute("class","openTraitement");
		document.getElementById("images").setAttribute("class","closeimages");
    }   
    else { // (== pas de sélection) 
        document.getElementById("images").setAttribute("class","openimages");
		document.getElementById("traitementImg").setAttribute("class","closeTraitement");
		e.innerHTML = "Ouvrir traitement image"
		zoneTraitement = false;
    }

}

