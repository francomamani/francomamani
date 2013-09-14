var resaltar = function (id) {
	for (var i = 0; i < 6; i++){
		var link=document.links[i];
		link.style.backgroundColor=black;
	};
	document.getElementById(id).style.backgroundColor="white";
	document.getElementById(id).style.color="black";

}