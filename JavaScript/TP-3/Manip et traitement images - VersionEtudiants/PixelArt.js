img = new Image();

/* Cette fonction est appel�e � l'�v�nement load sur l'image. D�s que la source de l'image est modifi�e, l'image est charg�e dans le canvas */
img.onload = function()
   {
        effacerCanvas(ctx);
        canvas.width=img.width;
		canvas.height=img.height;
		canvasResultat.width=img.width;
		canvasResultat.height=img.height;
		ctx.drawImage(img, 0, 0);

  }

/*Cette fonction doit �tre appel�e car la page HTML est compl�tement charg�e*/
function load(){
	canvas = document.getElementById('monCanvas');
	ctx = canvas.getContext('2d');

	canvasResultat = document.getElementById('monCanvasResultat');
	ctxResultat = canvasResultat.getContext('2d');
}

/* Charge une image par l'interm�diaire de l'�l�ment parcourir*/ 
function chargerVers1() {
        var fichier = document.getElementById('fileinput').files;
		img.src=window.URL.createObjectURL(fichier[0]);       
}

/* Charge une image par l'interm�diaire du bouton "charger". C'est fonctionnalit� est associ�e au panel d'images*/ 
function charger() {
 if (selectedImage) {  
         img.src=selectedImage.src;
    }
    else { // (== pas de s�lection) 
        window.alert("S�lectionnez d'abord  une image.");
    }	
}

/* Cette fonction permet d'�ffacer le contenu des canvas*/
var effacer = function(){
	 effacerCanvas(ctx);
	 effacerCanvas(ctxResultat);
	 
}
/* Permet d'effacer un canvas */
function effacerCanvas(context){
    context.clearRect(0,0, context.canvas.width, context.canvas.height);
}

/*Cette fonction permet d'annuler la composante rouge d'une image charg�e dans le canvas "monCanvas"*/
function annuler_R(){	
		ctx.drawImage(img, 0, 0);  /*Replace l'image d'origine dans le canvas*/
		if(img.width > 0){
			var pixels = ctx.getImageData(0, 0, img.width,img.height);
			var numBytes = pixels.data.length;    /*R�cup�re le nombre d'octets */
		
			for (var i=0; i<numBytes; i+=4) {    /*Parcourt le tableau d'octet de 4 en 4*/
				pixels.data[i] = 0; // r				
			} 
			
			effacerCanvas(ctxResultat);
			ctxResultat.putImageData(pixels, 0, 0);
			
		}else{
		    alert("Charger une image !!!");
		}
		
}


function annuler_V(){	
		
}

function annuler_B(){	
				
}

function negatif(){	
				
}

function niveauGrisVers1(){
	   
}

function niveauGrisVers2(){
	  
}

function sepia(){
	  
}

function conversion(x,y){
     return (y*img.width+x)*4;     
}

function retourneHori(){
		if(img.width > 0){
			var pixelsResultat=ctx.createImageData(img.width,img.height);
			var posSrc,posDest;		
			var pixels = ctx.getImageData(0, 0, img.width,img.height);
		
			/* A compl�ter */
			effacerCanvas(ctxResultat);
			ctxResultat.putImageData(pixelsResultat, 0, 0); 
		}else{
		    alert("Charger une image !!!");
		}
}

function retourneVerti(){
		if(img.width > 0){
			var pixelsResultat=ctx.createImageData(img.width,img.height);
			var posSrc,posDest;		
			var pixels = ctx.getImageData(0, 0, img.width,img.height);
		
			for(var y=0,h=img.height;y<h;y++){
				for(var x=0,w=img.width;x<w;x++){
					posSrc=conversion(x,y);
					posDest=conversion(w-x,y);
					//Recopie des 4 octets qui d�finissent le pixel.
					for(var i=0;i<4;i++){
						   pixelsResultat.data[posDest+i]=pixels.data[posSrc+i];
					}
				}
			}	

			effacerCanvas(ctxResultat);
			ctxResultat.putImageData(pixelsResultat, 0, 0);
		}else{
		    alert("Charger une image !!!");
		}
}

function filtre(){
		var pixelsResultat=ctx.createImageData(img.width,img.height);
		var posSrc,posDest;
		var pixels =  niveauGris_retour();
		//var tab = new Array([-2,-1,0],[-1,1,1],[0,1,2]);
		//var tab = new Array([-1,-1,-1],[-1,9,-1],[-1,-1,-1]);
		var tab = new Array([-1/6,-2/3,-1/6],[-2/3,13/3,-2/3],[-1/6,-2/3,-1/6]);

		somme = 0;
		
		for(var y=1;y<img.height-1;y++){
			for(var x=1;x<img.width-1;x++){
			     somme= 0;
				somme+=pixels.data[conversion(x-1,y-1)] * tab[0][0];
				somme+=pixels.data[conversion(x,y-1)] * tab[0][1];
				somme+=pixels.data[conversion(x+1,y-1)] * tab[0][2];
				somme+=pixels.data[conversion(x-1,y)] * tab[1][0];
				somme+=pixels.data[conversion(x,y)] * tab[1][1];
				somme+=pixels.data[conversion(x+1,y)] * tab[1][2];
				somme+=pixels.data[conversion(x-1,y+1)] * tab[2][0];
				somme+=pixels.data[conversion(x,y+1)] * tab[2][1];
				somme+=pixels.data[conversion(x+1,y+1)] * tab[2][2];
				if(somme > 255){
				   somme = 255;
				}
								
				//Recopie des 4 octets qui d�finissent le pixel.
				for(var i=0;i<3;i++){
				       pixelsResultat.data[conversion(x,y)+i]=somme;
                }
				 pixelsResultat.data[conversion(x,y)+3]=pixels.data[conversion(x,y)+3];
			      
			}
		}	

		effacerCanvas(ctxResultat);
	    ctxResultat.putImageData(pixelsResultat, 0, 0); 
}

function changerImage(img, src)

{
   // on cr�e l'objet
   var image = new Image();
   // �v�nements : cas d'erreur
   image.onerror = function()
   {
      alert("Erreur lors du chargement de l'image");
   }
   image.onabort = function()
   {
      alert("Chargement interrompu");
   }
   // �v�nement : une fois le chargement termin�

   image.onload = function()
   {
      img.src = image.src;
      img.width = image.width;
      img.height = image.height;
   }

 // on modifie l'adresse de l'objet "image", ce qui lance le chargement
   image.src = src;            

}