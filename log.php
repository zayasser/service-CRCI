<?php
#################### Variable ####################
$linkIndex = "http://localhost/Projetstage/";

#################### Variable ####################
session_start();
/*if($_SERVER["PHP_SELF"]=='/yass/Projetstage/log.php'){  // security url
	echo "error link 0x001";
	header('Location: ../Projetstage/index.php');
	exit;
}else{*/


	include("conn.php");
	
	if(extract($_POST)==3){
		if(strlen($login)==0||strlen($password)==0){
			type_Message('','Votre Nom d\'utiliasteur ou Mot de Passe est incorrect ','red');
		}else{
			
			$login=htmlspecialchars($login);
			$password=htmlspecialchars($password);
			
			$YesItsOke = 0;
				foreach($conn->query('SELECT * from login') as $row) {
				//print_r($row[4]);echo'<br>';
					if($row[3]==$login&&$row[4]==md5($password)){
							if($row[3]==$login){
							$id = $row[0];
							$nom = $row[1];
							$prenom = $row[2];
							$login = $row[3];
							$password = $row[4];
							
							$YesItsOke++;
						}
					}
				}
			if($YesItsOke==1){
						
						$_SESSION["prenom"] = $prenom;
						$_SESSION["nom"] = $nom;
						$_SESSION["login"] = $login;
						$_SESSION["id"] = $id;
						$_SESSION["Connecte"] = $id;
						
						if($remembre=='oui'){
							$time= 60*60*24*365; ///+annee
						}elseif($remembre=='non'){
							$time= 60*60; //1h
						}else{$time= 0;}
						setcookie('connect',md5($login.$nom).md5($password), time()+$time, '/');
						setcookie('id',$id, time()+$time, '/');
						setcookie('connect_type','0'.md5(time()-3600), time()+$time, '/');
						//echo'<script>setTimeout(function(){ location.assign("http://localhost/Projetstage/"); }, 1);</script>';
				echo'<script>
					document.getElementById("preloader").style.display = "";
					document.getElementById("status").style.display = "";
					setTimeout(function(){ location.assign("'.$linkIndex.'"); }, 2);</script>';
				type_Message( '',"Cela a été vérifié avec succès", 'green'); //Connexion oke 
			}else{
				type_Message( '',"Votre Nom d'utilisateur ou Mot de Passe est incorrect", 'red');
			}
		}
	}elseif(extract($_POST)==1){
		$_SESSION["prenom"] = NULL;
		$_SESSION["nom"] = NULL;
		$_SESSION["login"] = NULL;
		$_SESSION["id"] = NULL;
		$_SESSION["Connecte"] = NULL;
		setcookie('connect',NULL, NULL, '/');
		setcookie('id',NULL,NULL, '/');
		setcookie('connect_type',NULL,NULL, '/');
		type_Message( 'Déconnexion : ',"est succès", 'green'); //Connexion oke 
		echo'<script>setTimeout(function(){ location.assign("http://localhost/Projetstage/"); }, 360);</script>';
	}
	


 ?>