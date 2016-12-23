



function servicio() {
	var l = document.getElementsByName("servicios");
	
 var x = document.getElementById("preciototal");



var precio=0;
	for (var i =  0 ; i < l.length; i++) {

		if ( (l[i].children[0].value ) >= 0) {
             precio = precio + (l[i].children[0].value * l[i].children[0].id);

		}
	
		
	}


	
x.value = precio;

 
};



function prev(elemento) {


 
 var x = document.getElementById("preciototal");

elem= document.getElementById("error");


if (elemento.value < 0    ) {




elem.innerHTML = "<p>* El anticipo no puede ser negativo</p>";

}else {

	


 if( (elemento.value * 1) > (x.value * 1)  ){

 	elem.innerHTML = "<p>* El anticipo no puede ser mayor al precio</p>";

} else{
	elem.innerHTML = "";
}
}




}