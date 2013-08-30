<?php
$dir="../../view/fileupload/server/php/files/";
if(is_dir($dir))
{
	if ($directorio=opendir($dir)) 
	{
		while ($archivos=readdir($directorio))
		{
			echo " ejemplo".$archivos."<br/>"; 
		}
		closedir($directorio);
	}
}
?>
