$(function detail(){
	$("#modi_butt").on("click",function(){
		var statut= $("#statut_select").val();
		//alert($('#formupdate').attr('action'));
		var by_ajx = {'etat':'modif','statut':statut}


		$.ajax({
			beforeSend:function(){
				$('#preloader').css("display","block");
			},
			url:'modif.php'+$('#formupdate').attr('action'),
			type:'post',
			data:by_ajx,
			success:function(data_result){
				$('#messageRq').html(data_result);
				$('#preloader').css("display","none");
				//$('#insc_pass').val('');
			}
		});
		return false;
	});
});



$(function gg(){
	$("#gg").on("click",function(){

		var myModal = new bootstrap.Modal(document.getElementById('myModal'),options);

		myModal.css("display : none");
		});
});
