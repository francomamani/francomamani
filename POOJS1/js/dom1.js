Function.prototype.method = function(name, fn) {
	this.prototype[name]=fn;
	return this;
};

var Color = function()
{	
	this.rojo=128;
	this.verde=128;
	this.azul=128;
	alert("CLASE COLOR CREADO!");
};
Color.
method("setColorRojo", function(){
	this.rojo=document.forms.main.elements.rojo.value;
	document.forms.main.elements.result.value="rgb("+this.rojo+","+this.verde+","+this.azul+")";
	document.forms.main.elements.result.style.backgroundColor="rgb("+this.rojo+","+this.verde+","+this.azul+")";
}
).
method("setColorVerde", function () {
	this.verde=document.forms.main.elements.verde.value;	
	document.forms.main.elements.result.value="rgb("+this.rojo+","+this.verde+","+this.azul+")";
	document.forms.main.elements.result.style.backgroundColor="rgb("+this.rojo+","+this.verde+","+this.azul+")";
}
).
method("setColorAzul", function () {
	this.azul=document.forms.main.elements.azul.value;
	document.forms.main.elements.result.value="rgb("+this.rojo+","+this.verde+","+this.azul+")";
	document.forms.main.elements.result.style.backgroundColor="rgb("+this.rojo+","+this.verde+","+this.azul+")";
}
).
method("ajustarIntervalo", function(){
	var step=document.forms.main.elements.intervalo;
	var red= document.getElementsByTagName("input")[0];
	var green= document.getElementsByTagName("input")[1];
	var blue= document.getElementsByTagName("input")[2];
	red.step=step.value;
	green.step=step.value;
	blue.step=step.value;
}
);
