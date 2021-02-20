<?php
/*if($_SERVER["SCRIPT_NAME"]=='/yass/Projetstage/inscription.php'){  // security url
	header('Location: /yass/Projetstage/index.php');
	exit;
}else{*/
session_start();
function password_strength_check($passwordTest, $min_len = 8, $max_len = 70, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1, $req_space = 0) {
    // Build regex string depending on requirements for the password
    $GradeDePasswordIs = 0;
	$regex = '/^';
    if ($req_digit == 1) { $regex .= '(?=.*\d)'; $GradeDePasswordIs++;}              // Match at least 1 digit
    if ($req_lower == 1) { $regex .= '(?=.*[a-z])'; $GradeDePasswordIs++;}           // Match at least 1 lowercase letter
    if ($req_upper == 1) { $regex .= '(?=.*[A-Z])'; $GradeDePasswordIs++;}           // Match at least 1 uppercase letter
    if ($req_symbol == 1) { $regex .= '(?=.*[^a-zA-Z\d])'; $GradeDePasswordIs++;}    // Match at least 1 character that is none of the above
    if ($req_space == 1) { $regex .= '(?=.*[^\s])'; $GradeDePasswordIs++;}    // Match at least 1 character that is none of the above
    $regex .= '.{' . $min_len . ',' . $max_len . '}$/';

    if(preg_match($regex, $passwordTest)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function B_G_colors($ID_Input,$ColorsBackGround){
	//background-color: lightpink
	echo'<script>document.getElementById("'.$ID_Input.'").style.backgroundColor = "'.$ColorsBackGround.'";</script>';
}

$testChar = '/[^A-Za-z\sîïâäôöéàçèضصثقفغعهخحجدذطكمنتالبيسشئءؤرلاىةوزظـأإÄÏÖÔÎÂ]/';
$testChar_Num = '/[^A-Za-zîïâäôöéàçèضصثقفغعهخحجدذطكمنتالبيسشئءؤرلاىةوزظـأإ0123456789-_ÄÏÖÔÎÂ]/';

	include("conn.php");
	extract($_POST);
	if (empty($nom) || empty($prenom)|| empty($login)|| empty($password)){
		
		type_Message( '',"veuillez completer l'ensemble des champs",'red');
		if(empty($nom)){B_G_colors('insc_nom','lightpink');}else{B_G_colors('insc_nom','white');}
		if(empty($prenom)){B_G_colors('insc_prenom','lightpink');}else{B_G_colors('insc_prenom','white');}
		if(empty($login)){B_G_colors('insc_login','lightpink');}else{B_G_colors('insc_login','white');}
		if(empty($password)){B_G_colors('insc_pass','lightpink');}else{B_G_colors('insc_pass','white');}
	}else{
		B_G_colors('insc_nom','white');
		B_G_colors('insc_prenom','white');
		B_G_colors('insc_login','white');
		B_G_colors('insc_pass','white');
		
		$number_4 = 0;
		
		if(strlen($nom)>=3 &&strlen($nom)<30){
			if(!preg_match($testChar, $nom)){
				B_G_colors('insc_nom','white');  
				$number_4++;			
			}else{
				type_Message( 'Oupss ..!',"Le <b>Nom</b> saisi n'est pas acceptable. Veuillez réessayer.",'w');
				B_G_colors('insc_nom','lightpink');
			}
		}else{
			type_Message( 'Oupss ..!',"La longueur du <b>Nom</b> n'est pas acceptable. Veuillez réessayer.",'w');
			B_G_colors('insc_nom','lightpink');
		}
		
		if(strlen($prenom)>=3 &&strlen($prenom)<30){
			if(!preg_match($testChar, $prenom)){
				B_G_colors('insc_prenom','white');
				$number_4++;
			}else{
				type_Message( 'Oupss ..!',"Le <b>Prenom</b> saisi n'est pas acceptable. Veuillez réessayer.",'w');
				B_G_colors('insc_prenom','lightpink');
			}
		}else{
			type_Message( 'Oupss ..!',"La longueur du <b>Prenom</b> n'est pas acceptable. Veuillez réessayer.",'w');
			B_G_colors('insc_prenom','lightpink');
		}
		
		if(strlen($login)>=3&&strlen($login)<20){
			if(!preg_match($testChar_Num, $login)){
				
				$wadouble=0;
				foreach($conn->query("SELECT * FROM `login` WHERE `login`= '".$login."'") as $row) {
					//print_r($row[4]);echo'<br>';
						if($row[3]==$login){
							$wadouble++;
						}
					}
				if($wadouble==0){
					B_G_colors('insc_login','white');
					$number_4++;
				}else{
					type_Message( 'Oupss ..!',"login déjà enregistré. Veuillez réessayer.",'D');
					B_G_colors('insc_login','lightpink');
				}
			}else{
				type_Message( 'Oupss ..!',"Le <b>Login</b> saisi n'est pas acceptable. Veuillez réessayer.",'w');
				B_G_colors('insc_login','lightpink');
			}
		}else{
			type_Message( 'Oupss ..!',"La longueur du <b>Login</b> n'est pas acceptable. Veuillez réessayer.",'w');
			B_G_colors('insc_login','lightpink');
		}
		
		
		$passwordmd5=md5($password);
		if(strlen($password)>=8&&strlen($password)<50){
			if(strtoupper($password)==strtoupper($login)||strtoupper($password)==strtoupper($nom)||strtoupper($password)==strtoupper($prenom)){
				type_Message( 'Attention !',"Interdit d'utiliser le <b>Password</b> comme nom ou prénom ... Veuillez réessayer.",'D');
			}else{
				$DogreDePassword = 0;
				for($x=0;$x<16;$x++){
					$bin = sprintf( "%04d", decbin($x));
					$Dijital = substr($bin, 0, 1);$Dijital = (int)$Dijital;
					$Lowera_z = substr($bin, 1, 1);$Lowera_z = (int)$Lowera_z;
					$UperA_Z = substr($bin, 2, 1);$UperA_Z = (int)$UperA_Z;
					$Symboles = substr($bin, 3, 1);$Symboles = (int)$Symboles;
					if(password_strength_check($password,2,50,$Dijital,$Lowera_z,$UperA_Z,$Symboles)==TRUE){
						$DogreDePassword++;
					}
				}
				if($DogreDePassword==2){
					type_Message( 'Attention !',"<b>Password</b> est <b>très faible</b>. Veuillez réessayer.",'D');
				}elseif($DogreDePassword==4){
					type_Message( '',"le password est <b>faible</b>.",'w');
				}elseif($DogreDePassword==8){
					$number_4++;
				}elseif($DogreDePassword==16){
					$number_4++;
				}else{
					type_Message( 'ERROR P108!',"SVP ! Contactez-nous pour résoudre le problème",'D');
				}
			}
		}else{
			type_Message( 'Oupss ..!',"La longueur du <b>Password</b> n'est pas acceptable. Veuillez réessayer.",'D');
		}
		
		
		if($number_4==4){
			if($conn->query("INSERT INTO `login`(nom,prenom,login,password) VALUES ('$nom','$prenom','$login','$passwordmd5')")){
				$wadouble=0;
				foreach($conn->query("SELECT * FROM `login` WHERE `login`= '".$login."'") as $row) {
				//print_r($row[4]);echo'<br>';
					if($row[3]==$login){
						$id = $row[0];
						$nom = $row[1];
						$prenom = $row[2];
						$login = $row[3];
						$password = $row[4];						
						$wadouble++;
					}
				}
				if($wadouble==1){
						$_SESSION["prenom"] = $prenom;
						$_SESSION["nom"] = $nom;
						$_SESSION["login"] = $login;
						$_SESSION["id"] = $id;
						$_SESSION["Connecte"] = $id;
						
						setcookie('connect',$login.md5($password), time()+3600, '/');
						setcookie('id',$id, time()+3600, '/');
						setcookie('connect_type','0'.md5(time()-3600), time()+3600, '/');
						echo'<script>setTimeout(function(){ location.assign("http://localhost/Projetstage/"); }, 1);</script>';
				}else{
					type_Message('Error E-15 : ','SVP ! Contactez-nous pour résoudre l\'error.','red');
					//echo 'id : '.$id.'<br>nom : '.$nom.'<br>Prenom : '.$prenom.'<br>Login : '.$login;
					//echo $wadouble;
					exit;
				}
			}else{
				type_Message('Error E-14 : ','Contactez-nous pour résoudre l\'error.','red');
				echo $nom.$prenom.$login.$passwordmd5;
				exit;
			}
		}
	}
	
//}


?>