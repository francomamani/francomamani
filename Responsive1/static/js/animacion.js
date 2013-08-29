$(document).ready(function()
		{
			$("section").find("section").hide();
			$("section").find("#inicio").slideDown("fast");
			$("#minicio").css({"background":"rgba(0,255,0,.5)"});
			$("a").hover
			(
				function(event)
				{
					$(this).css(
						{
							"color":"rgba(255, 255, 255, .9)"
						}
					);
				},
				function(event)
				{
					$(this).css(
						{
							"color":"rgba(255, 255, 255, .6)"
						}
					);
				}
					
			);

			$("#minicio").click(
					function(event)
					{
						$("section").find("section").hide();
						$("#nav").find("li a").css(	{"background":"none", "color":"rgba(255, 255, 255, .6)"});
						$(this).css({"background":"rgba(0,255,0,.5)" });

						$("#inicio").slideDown("slow");
					}
			);

			$("#mregistro").click(
					function(event)
					{
						$("section").find("section").hide();
						$("#nav").find("li a").css(	{"background":"none", "color":"rgba(255, 255, 255, .6)"});
						$(this).css({"background":"rgba(0,255,0,.5)"});

						$("#inicio").slideDown("slow");
					}
			);
			
			$("#mpracticas").click(
				function(event)
				{

				/*
					if ($("#practicas").is(":visible"))
					{
						$("#practicas").slideUp("fast");
					}
					else
					{
						$("#practicas").slideDown("slow");	
					}
				*/	
					/*quita todos los colores de fondo verde de los enlaces*/
					$("#nav").find("li a").css({"background":"none", "color":"rgba(255, 255, 255, .6)"});
					/*aplica el color de fondo verde a este enlace*/
					$(this).css({"background":"rgba(0,255,0,.5)" });
					$("section").find("section").hide();
					$("#practicas").slideDown("slow");
				}
			);

			$("#mvirtual").click(
					function(event)
					{
						$("section").find("section").hide();
						$("#nav").find("li a").css(	{"background":"none", "color":"rgba(255, 255, 255, .6)"});
						$(this).css({"background":"rgba(0,255,0,.5)" });

						$("#virtual").slideDown("slow");
					}
			);

			$("#mnotas").click(
					function(event)
					{
						$("section").find("section").hide();
						$("#nav").find("li a").css(	{"background":"none", "color":"rgba(255, 255, 255, .6)"});
						$(this).css({"background":"rgba(0,255,0,.5)" });

						$("#inicio").slideDown("slow");
					}
			);

			$("#macerca").click(
					function(event)
					{
						$("section").find("section").hide();
						$("#nav").find("li a").css(	{"background":"none", "color":"rgba(255, 255, 255, .6)"});
						$(this).css({"background":"rgba(0,255,0,.5)" });

						$("#inicio").slideDown("slow");
					}
			);

		}
);