


function description_fun(description,id_demande,chat,input_desc){

		var by_ajx = {'etat':'desc','description':description,'id_demande':id_demande};
		$.ajax({
			beforeSend:function(){
				//$('#preloader').css("display","block");
			},
			url:'demande.php',
			type:'post',
			data:by_ajx,
			success:function(data_result){
				chat.append(data_result);
				//chats.html();
				$('#preloader').css("display","none");
				input_desc.val('');
				//$('#insc_pass').val('');
			}
		})
		return false;
}

$(document).ready(function(){
	$("#bout").click(function(){
		var chhh = $('#chaat');
		var description = $("#description");
		var id_demande = $("#demande_id").val();
		var scrollab = $("#eeeee");
	 	description_fun(description.val(),id_demande,chhh,description);
	 	scrollab.animate({ scrollTop: 9999 }, 'slow');
	})
});

$(function(){
	$('#FromDescription').keypress(function (e) {
	  if (e.which === 13) {
	    var chhh = $('#chaat');
		var description = $("#description");
		var id_demande = $("#demande_id").val();
		var scrollab = $("#eeeee");

		 description_fun(description.val(),id_demande,chhh,description);
		 scrollab.animate({ scrollTop: 9999 }, 'slow');
	    return false;  
	  }
	});
});



$(document).ready(function() {
	$(".description_butt").on("click", function(event){

	  event.preventDefault();
		var description = $(this).parent().parent().children('span').children('input');
	  	var id_demande = $(this).val();
	  	var chat = $(this).parent().parent().parent().parent().parent().children('div.modal-body').children('div').children('ul');
	  	var scrollab = $(this).parent().parent().parent().parent().parent().children('div.modal-body');
	  	description_fun(description.val(),id_demande,chat,description);
	  	
	  scrollab.animate({ scrollTop: 9999 }, 'slow');
	});

});


$(document).ready(function() {
	$('.modal').keypress(function (e) {
		if (e.which === 13) {
			var description = $(this).children('div.modal-dialog').children('div.modal-content').children('div.modal-footer').children('div.container').children('div.row').children('span').children('input');
		  	var id_demande = $(this).children('div.modal-dialog').children('div.modal-content').children('div.modal-footer').children('div.container').children('div.row').children('div').children('button:first-child').val();
		  	var chat =  $(this).children('div.modal-dialog').children('div.modal-content').children('div.modal-body').children('div').children('ul');
		  	var scrollab = $(this).children('div.modal-dialog').children('div.modal-content').children('div.modal-body');
		  	description_fun(description.val(),id_demande,chat,description);
		  	scrollab.animate({ scrollTop: 9999 }, 'slow');
		}

	});

});




/*$(function description_col(){
	$("#boutt").on("click",function(){
		var description = $("#description_col").val();

		var by_ajx = {'etat':'desc','description':description};
		$.ajax({
			beforeSend:function(){
				//$('#preloader').css("display","block");
			},
			url:'demande.php',
			type:'post',
			data:by_ajx,
			success:function(data_result){
				$('#chaat').append(data_result);
				//chats.html();
				$('#preloader').css("display","none");
				$("#description_col").val('');
				//$('#insc_pass').val('');
			}
		})
		return false;
	})
})*/





$(function demande(){
	$("#dem_butt").on("click",function(){
		//document.getElementById("message").style.display = "none";
		
		var titre = $("#titre_input").val();
		var urgence = $("#urg_select").val();
		var type = $("#type_select").val();
		var categorie = $("#cat_select").val();
		var description = $("#texte_area").val();
		var piece = document.getElementById('file').files[0];
		var data = new FormData();

		data.append('file', piece);
		data.append('titre', titre);
		data.append('urgence', urgence);
		data.append('type', type);
		data.append('categorie', categorie);
		data.append('description', description);		


		var by_ajx = {'titre':titre,'urgence':urgence,'type':type,'categorie':categorie,'description':description}
		

		$.ajax({
			beforeSend:function(){
				$('#preloader').css("display","block");
			},
			url:'demande.php',
			type:'post',
			data:data,
			cache: false,
            contentType: false,
            processData: false,
            resetForm : true,
			success:function(data_result){
				$('#messageRq').html(data_result);
				$('#preloader').css("display","none");

				//$('#insc_pass').val('');
			}
		});
		return false;
	});

});

$(function inscription(){
	$("#insc_butt").on("click",function(){
		document.getElementById("message").style.display = "none";
		
		var nom = $("#insc_nom").val();
		var prenom = $("#insc_prenom").val();
		var login = $("#insc_login").val();
		var password = $("#insc_pass").val();

		var by_ajx = {'nom':nom,'prenom':prenom,'login':login,'password':password}
		

		$.ajax({
			beforeSend:function(){
				$('#preloader').css("display","block");
			},
			url:'inscription.php',
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

$(function login(){
	$("#login_butt").on("click",function(){
		
		var login = $("#loging_log").val();
		var password = $("#password_log").val(); 
		
		if($('#customCheck1').is(':checked')){
			var remembre = "oui";
		}else{
			var remembre = "non";
		}
		var by_ajx = {'login':login,'password':password,'remembre':remembre}
		

		$.ajax({
			beforeSend:function(){
				$('#preloader').css("display","block");
			},
			url:'log.php',
			type:'post',
			data:by_ajx,
			success:function(data_result){
				$('#preloader').css("display","none");
				$('#messageRq').html(data_result);
				$('#password_log').val('');
			}
			
		});
		//console.log(remembre);
		return false;
	});
});

$( "#insc_pass" ).keydown(function( event ) {
	var myInput = document.getElementById("insc_pass");
		var letter = document.getElementById("letter");
		var capital = document.getElementById("capital");
		var number = document.getElementById("number");
		var length = document.getElementById("length");
		var symbole = document.getElementById("symbole");

		// When the user clicks on the password field, show the message box
		myInput.onfocus = function() {
		  document.getElementById("message").style.display = "block";
		}

		// When the user clicks outside of the password field, hide the message box
		//myInput.onblur = function() {
		//  document.getElementById("message").style.display = "none";
		//}

		// When the user starts to type something inside the password field
		myInput.onkeyup = function() {
		  // Validate lowercase letters
		  var lowerCaseLetters = /[a-z]/g;
		  if(myInput.value.match(lowerCaseLetters)) {  
			letter.classList.remove("invalid");
			letter.classList.add("valid");
		  } else {
			letter.classList.remove("valid");
			letter.classList.add("invalid");
		  }
		  
		  // Validate capital letters
		  var upperCaseLetters = /[A-Z]/g;
		  if(myInput.value.match(upperCaseLetters)) {  
			capital.classList.remove("invalid");
			capital.classList.add("valid");
		  } else {
			capital.classList.remove("valid");
			capital.classList.add("invalid");
		  }

		  // Validate numbers
		  var numbers = /[0-9]/g;
		  if(myInput.value.match(numbers)) {  
			number.classList.remove("invalid");
			number.classList.add("valid");
		  } else {
			number.classList.remove("valid");
			number.classList.add("invalid");
		  }
		  
		  // Validate symbole
		  var symboles = /[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/\s]/g;
		  if(myInput.value.match(symboles)) {  
			symbole.classList.remove("invalid");
			symbole.classList.add("valid");
		  } else {
			symbole.classList.remove("valid");
			symbole.classList.add("invalid");
		  }
		  
		  // Validate length
		  if(myInput.value.length >= 8) {
			length.classList.remove("invalid");
			length.classList.add("valid");
		  } else {
			length.classList.remove("valid");
			length.classList.add("invalid");
		  }
		}
});
$( "#insc_nom" ).click(function() {
  $( "#insc_pass" ).keydown();
});

$(function Deconnect(){
	$("#Deconnect").on("click",function(){
		
		
		var by_ajx = {'Deconnect':'deconect'}
		

		$.ajax({
			beforeSend:function(){
			$('#preloader').css("display","block");
			},
			url:'log.php',
			type:'post',
			data:by_ajx,
			success:function(data_result){
				$('#preloader').css("display","none");
				$('#messageRq').html(data_result);
			}
			
		});
		//console.log(remembre);
		return false;
	});
});
$(function(){
	$("#dem_butt").click(function(){
		var titre = $("#titre_input");
		var optionURG = $("#urg_select");
		var optionType = $("#type_select");
		var optionCat = $("#cat_select");

		valid=true;
		if (titre.val()=="") {
			titre.next(".error-message").fadeIn().text("Veuillez compléter ce champs");
			valid=false;
		}
		else{
			$("#titre_input").next(".error-message").fadeOut();
		}


		if ($("#texte_area").val()=="") {
			$("#texte_area").next(".error-message").fadeIn().text("Veuillez compléter ce champs");
			valid=false;
		}
		else{
			$("#texte_area").next(".error-message").fadeOut();
		}


		if(optionURG.val()<6 && optionURG.val()!=0){
			//console.log("rah kbiir"+optionURG.val());
			optionURG.css("border"," 1px solid black");
		}else{
			optionURG.css("border"," 1px solid red");
		}


		if(optionType.val()<6 && optionType.val()!=0){
			//console.log("rah kbiir"+optionURG.val());
			optionType.css("border"," 1px solid black");
		}else{
			optionType.css("border"," 1px solid red");
		}


		if(optionCat.val()<6 && optionCat.val()!=0){
			//console.log("rah kbiir"+optionCat.val());
			optionCat.css("border"," 1px solid black");
		}else{
			optionCat.css("border"," 1px solid red");
		}

		return valid;
	});
});
