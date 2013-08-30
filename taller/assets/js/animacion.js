$(document).ready(function()
{
	$('#login').find('#formulario').hide();
	$('#login').hover(function()
		{
				$(this).find('#formulario').slideDown('slow');
		},function()
		{
				$(this).find('#formulario').slideUp('slow');
		}
	);
	$('body').addClass('dialogIsOpen');

	$('#modal img').click(function()
		{
			$('body').removeClass('dialogIsOpen');				
		}
	);

	$('button').on('click',function()
		{
			$('body').toggleClass('dialogIsOpen');
		}
	);
}
);