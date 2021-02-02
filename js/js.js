/*$(function demande(){
	$("#dem_butt").on("click",function(){

		var titre = $("#titre_input").val();
		var urgence = $("#urg_select").val();
		var type = $("#type_select").val();
		var categorie = $("#cat_select").val();
		var description = $("#texte_area").val();
	//	var piece = $("#file").val();
	   
 var file_data = $("#file").prop("files")[0];   
    var form_data = new FormData();
    form_data.append("file", file_data);


		var by_ajx = {'titre':titre,'urgence':urgence,'type':type,'categorie':categorie,'description':description,'piece':form_data}

		$.ajax({
			beforeSend:function(){
				$('#preloader').css("display","block");
			},
			url:'demande.php',
			type:'post',
			data:by_ajx,
			success:function(data_result){
				$('#messageRq').html(data_result);
				$('#preloader').css("display","none");
			}

		});
		return false;
	});
});*/
$(function demande(){
	$("#dem_butt").on("click",function(){
		//document.getElementById("message").style.display = "none";
		
		var titre = $("#titre_input").val();
		var urgence = $("#urg_select").val();
		var type = $("#type_select").val();
		var categorie = $("#cat_select").val();
		var description = $("#texte_area").val();
		var file = $("#file").val();

		var by_ajx = {'titre':titre,'urgence':urgence,'type':type,'categorie':categorie,'description':description, 'file':file}
		

		$.ajax({
			beforeSend:function(){
				$('#preloader').css("display","block");
			},
			url:'demande.php',
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

