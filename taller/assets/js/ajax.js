Function.prototype.method = function(name, fn) {
  this.prototype[name]=fn;
  return this;
};
var Ajax = function()
{

};
Ajax.method("create", function (titulo) {
	var xmlhttp;
	if (window.XMLHttpRequest) 
	{
		xmlhttp = new XMLHttpRequest();		
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
			document.getElementById('content').innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../../view/"+titulo+".html",true);
	xmlhttp.send();
}
);

Ajax.method("createPanel", function (titulo) {
	var xmlhttp;
	if (window.XMLHttpRequest) 
	{
		xmlhttp = new XMLHttpRequest();		
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
			document.getElementById('panel').innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../../view/"+titulo+".html",true);	
	xmlhttp.send();
}
);

Ajax.method("mis_datos", function () {
	var xmlhttp;
	if (window.XMLHttpRequest) 
	{
		xmlhttp = new XMLHttpRequest();		
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
			document.getElementById('panel').innerHTML=xmlhttp.responseText;
		}
	}
	//window.location.replace("#");
//
	//// slice off the remaining '#' in HTML5:    
	//if (typeof window.history.replaceState == 'function') {
	//  history.replaceState({}, '', window.location.href.slice(0, -1));
	//}

	xmlhttp.open("GET","../action/mis_datos.php",true);	
	xmlhttp.send();

}
);
Ajax.method("tipo_producto_servicio", function (tipo) {
	var xmlhttp;
	if (window.XMLHttpRequest) 
	{
		xmlhttp = new XMLHttpRequest();		
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
			document.getElementById('tipo_producto_servicio').innerHTML=xmlhttp.responseText;
		}
	}
	//window.location.replace("#");
//
	//// slice off the remaining '#' in HTML5:    
	//if (typeof window.history.replaceState == 'function') {
	//  history.replaceState({}, '', window.location.href.slice(0, -1));
	//}

	xmlhttp.open("GET","../action/tipo_producto_servicio.php?q="+tipo,true);	
	xmlhttp.send();

}
);
Ajax.method("calcular", function (precio, cantidad) {
	var xmlhttp;
	var precio=document.getElementById('precio').value;
	var cantidad=document.getElementById('cantidad').value;
	alert(precio+cantidad);

	var c=precio.split(" ");
	var n=precio.split(" ");
	var p=precio.split(" ");

	var costo=p*cantidad;
	if (window.XMLHttpRequest) 
	{
		xmlhttp = new XMLHttpRequest();		
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
			document.getElementById('costo').innerHTML=xmlhttp.responseText;
		}
	}
	//window.location.replace("#");
//
	//// slice off the remaining '#' in HTML5:    
	//if (typeof window.history.replaceState == 'function') {
	//  history.replaceState({}, '', window.location.href.slice(0, -1));
	//}

	xmlhttp.open("GET","../action/descripcion.php?cod="+c+",nom="+n+",pre="+p,true);	
	xmlhttp.send();

}
);

Ajax.method("mis_productos", function () {
	var xmlhttp;
	if (window.XMLHttpRequest) 
	{
		xmlhttp = new XMLHttpRequest();		
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
			document.getElementById('panel').innerHTML=xmlhttp.responseText;
		}
	}
	//window.location.replace("#");
//
	//// slice off the remaining '#' in HTML5:    
	//if (typeof window.history.replaceState == 'function') {
	//  history.replaceState({}, '', window.location.href.slice(0, -1));
	//}

	xmlhttp.open("GET","../action/mis_productos.php",true);	
	xmlhttp.send();

}
);

var template = new Ajax();