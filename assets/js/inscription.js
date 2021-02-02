$(function inscription(){
	$("#insc_butt").on("click",function(){
		
		var nom = $("#insc_nom").val();
		var prenom = $("#insc_prenom").val();
		var login = $("#insc_login").val();
		var password = $("#insc_pass").val();

		var by_ajx = {'nom':nom,'prenom':prenom,'login':login,'password':password}
		

		$.ajax({
			url:'inscription.php',
			type:'post',
			data:by_ajx,
			success:function(data_result){
				$('#messageRq').html(data_result);
			}
			

			
		});
		console.log(nom);
		return false;
	});
});