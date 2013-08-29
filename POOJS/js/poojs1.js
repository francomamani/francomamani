Function.prototype.method = function(name, fn) {
	this.prototype[name]=fn;
	return this; //for chained
};
var LogIn=function(){
	var color= document.createElement("input");
	color.setAttribute("type","color");
	if(color.type=="text")
	{
		alert("Seguro es Internet Explorer o Firefox! -_- actualice su navegador o use google-chrome u opera")
	}
};

LogIn.
method("update", function(){
	var color= document.getElementsByTagName("input")[0];
	var texto= document.getElementsByTagName("input")[1];
	var parrafo= document.getElementsByTagName("p")[0];
	parrafo.style.color="white";
	if(!texto.value) 
	{
		alert("por favor escriba algo en la caja de texto");
		console.log("por favor escriba algo en la caja de texto"); 
		return;
	}
	parrafo.innerHTML=texto.value;
	texto.value="";
	parrafo.style.backgroundColor=color.value;
	console.log("objeto actualizado :D");
}).
method("destroy", function() {
	seccion= document.getElementById("contenedor");
	seccion.style.display="none";
	console.log("objetos destruidos");
}).
method("restore", function()
{
	seccion= document.getElementById("contenedor");
	seccion.style.display="block";
	console.log("objetos restaurados");
}
);