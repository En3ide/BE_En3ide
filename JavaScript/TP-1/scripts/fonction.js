var Prix_Calculette = 0;
var quantite = 0;
		 
		 function selectCalculette(e){
		     
			  Prix_Calculette = e.value;
			  document.getElementById('prix').innerHTML = Prix_Calculette;
			  quantite = document.getElementById('liste_Quantite').value;
			  document.getElementById('prix_total').innerHTML = e.value * quantite;
		 }
		 
		 function selectQuantite(e){
		      
			  quantite = document.getElementById('liste_Quantite').value;
			  document.getElementById('prix_total').innerHTML = Prix_Calculette * quantite;
		 }
		 var tab=[0,1,2,3,4];
		 console.log("La moyenne des","","0","est: " +tab[0]);