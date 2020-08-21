$(document).ready(function(){
	$('#metier').keyup(function(){
		var metier = $(this).val();
			metier = $.trim(metier);

		if (metier !=="") 
		{
			$.post('refraiche.php',{metier:metier},function(data){
				$('#title').html(data);
		});

		}
		


	});

});