function verifica(){
	// if(isNaN(document.dati.eta.value) | (document.dati.eta.value<=1) | (document.dati.eta.value>=100)) {
	// alert("Per favore inserisci l'eta' corretta in cifre");
	// return false;
	// }
	// if(isNaN(document.dati.peso.value) | (document.dati.peso.value<30) | (document.dati.peso.value>=120)) {
	// alert("Per favore inserisci il peso corretto in Kg");
	// return false;
	// }
	// if(isNaN(document.dati.altezza.value) | (document.dati.altezza.value <120) | (document.dati.altezza.value>220)){
	// alert("Per favore inserisci l'altezza in cm");
	// return false;
	// }


	var kg=document.getElementById('peso').value;
	var cm=document.getElementById('altezza').value;
	var eta=document.getElementById('eta').value;
	var attivita=document.getElementById('attivita').value;

	if(document.getElementById('uomo').checked){
	var bmr=parseInt((9.99*kg)+(6.25*cm)-(4.92*eta)+5);
	}
	else if (document.getElementById('donna').checked){
	var bmr=parseInt((9.99*kg)+(6.25*cm)-(4.92*eta)-161);
	}
	var tdee=parseInt(bmr*attivita);
	var pro=parseInt(1.1*kg);
	var fat=parseInt(((25*tdee)/100)/9);
	var tdeeSenza=tdee-(pro*4)-(25*tdee)/100;
	var cho=parseInt(tdeeSenza/4)
	alert("Il tuo BMR e' "+ bmr + " calorie "
	+"invece il tuo tdee e' di " + tdee + " calorie. \n"
	+ "Secondo i L.A.R.N. queste calorie andrebbero ripartite nel seguente modo: \n"
	+ pro + "g di proteine \n" + fat +"g di grassi \n"+cho+"g di carboidrati" );

}

function validate(){
  	var n1 = document.getElementById('nicoPart').value;
  	var n2 = document.getElementById('nicoOtt').value;
  	var lt = document.getElementById('liquidTot').value;
  	var p_Ar = document.getElementById('percAr').value;					
  	var p_H20 = document.getElementById('percH20').value;
  								

  	var n3 = 0, ne1 = 0, H20 = 0, AR = 0, neG = 0, niG = 0, ARG = 0, H20G = 0;
  	H20 = (p_H20 * lt)/100;
  	AR = (p_Ar * lt)/100;
  	var result = "";

  	var formatNico = "", formatNeutro = "", formatArOtt = "", formatH20Ott = "", formatNicoG = "", formatNeutroG = "", formatArG = "", formatH20G = "";
  	if((p_Ar != 0) | (p_H20 !=0 & (n1 != 0 & n2 != 0) )) {
  		
  		if((n1 > 0) & (n2 > 0 ) & (p_H20 != 0)) {	// se c'è l'acqua
  			n3 = (lt * n2)/n1;
			ne1=lt-n3;
	    	ne1=ne1-H20-AR;
	    	
	    	neG=(20*ne1);
			niG=(20*n3);
			ARG=(20*AR);
			H20G=(20*H20);
			
			formatNico = n3.toFixed(2);
			formatNeutro = ne1.toFixed(2);
			formatArOtt = AR.toFixed(2);
			formatH20Ott = H20.toFixed(2);

			formatNicoG = niG.toFixed(2);
			formatNeutroG = neG.toFixed(2);
			formatArG = ARG.toFixed(2);
			formatH20G = H20G.toFixed(2);

			result = "\nLa nicotina da Inserire è: "+ formatNico + "ml, cioè " + formatNicoG + " gocce\n";
			result += "\nIl Neutro da Inserire è: " + formatNeutro + "ml, cioè " + formatNeutroG + " gocce\n";
			result += "\nDovrai Inserire " + formatArOtt + "ml di Aroma, cioè " + formatArG + " gocce\n";
			result += "\nDovrai Inserire " + formatH20Ott + "ml di Acqua, cioè " + formatH20G + " gocce\n";
			alert(result);
  		}else if((n1 == 0) & (n2 == 0)) {
			H20=(p_H20*lt)/100;
	    	AR=(p_Ar*lt)/100;
	    	ne1=lt-(AR+H20);
	        /*converto In  gocce anche qui*/
	        neG=(20*ne1);
	        ARG=(20*AR);
	        H20G=(20*H20);

			formatNeutro = ne1.toFixed(2);
			formatArOtt = AR.toFixed(2);
			formatH20Ott = H20.toFixed(2);

			
			formatNeutroG = neG.toFixed(2);
			formatArG = ARG.toFixed(2);
			formatH20G = H20G.toFixed(2);

			result = "Fossi In Te Ce La Metterei Un Po' Di Nicotina!\n\n";
			result += "Il Neutro da Inserire è: " + formatNeutro + "ml, cioè " + formatNeutroG + " gocce\n\n";
			result += "Dovrai Inserire " + formatArOtt + "ml di Aroma, cioè " + formatArG + " gocce\n\n";
			result += "Dovrai Inserire " + formatH20Ott + "ml di Acqua, cioè " + formatH20G + " gocce\n";
			alert(result)
			}else {		// ci entra sempre se non esiste H20
				n3= (lt*n2)/n1; /*formula algorittimo*/
		        ne1=lt-n3;
		        ne1=ne1-AR;
		         /* CREO LE GOCCE */
		        neG=(20*ne1);
		        niG=(20*n3);
		        ARG=(20*AR);
		         
		         
		        formatNico = n3.toFixed(2);
		        formatNeutro = ne1.toFixed(2);
		        formatArOtt = AR.toFixed(2);
		         
					
		        formatNicoG = niG.toFixed(2);
		        formatNeutroG = neG.toFixed(2);
		        formatArG = ARG.toFixed(2);
					
		        result = "\nLa nicotina da Inserire è: "+ formatNico + "ml, cioè " + formatNicoG + " gocce\n";
		        result += "\nIl Neutro da Inserire è: " + formatNeutro + "ml, cioè " + formatNeutroG + " gocce\n";
		        result += "\nDovrai Inserire " + formatArOtt + "ml di Aroma, cioè " + formatArG + " gocce\n";
		        
		        alert(result);

		        //res = document.getElemnt(div che ho fatti)
		        //document.res.appendChild()
			}
  		
		}
	
  	// stampa di prova
  
  	return true;
}
