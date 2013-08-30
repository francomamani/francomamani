$(document).ready(function()
{
	$('#navegacion').find('#id_doc').click(function()
	{
		$('#contenido').load('./documentacion.html');
		return false;
	}
	);
}
);