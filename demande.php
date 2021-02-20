<?php

	include("conn.php");
 

//$conn= mysqli_connect("localhost","root","","stage");
if(isset($_POST["titre"]) && isset($_POST["urgence"]) && isset($_POST["type"]) && isset($_POST["categorie"]) && isset($_POST["description"]) ) {
	
	$titre=$_POST["titre"];
	$urgence=$_POST["urgence"];
	$type=$_POST["type"];
	$categorie=$_POST["categorie"];
	$description=$_POST["description"];
	$demandeur= $_COOKIE['id'];
	$piece = time().'_'.$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'],'fichiers/'.$piece);


	function B_G_colors($ID_Input,$ColorsBackGround){

	//background-color: lightpink
	echo'<script>document.getElementById("'.$ID_Input.'").style.backgroundColor = "'.$ColorsBackGround.'";</script>';
	}
	
	if (empty($titre) || empty($urgence)|| empty($type)|| empty($categorie)|| empty($description)){
		
		type_Message( '',"veuillez completer l'ensemble des champs",'red');
		if(empty($titre)){B_G_colors('titre_input','lightpink');}else{B_G_colors('titre_input','white');}
		if(empty($urgence)){B_G_colors('urg_select','lightpink');}else{B_G_colors('urg_select','white');}
		if(empty($type)){B_G_colors('type_select','lightpink');}else{B_G_colors('type_select','white');}
		if(empty($categorie)){B_G_colors('cat_select','lightpink');}else{B_G_colors('cat_select','white');}
		if(empty($description)){B_G_colors('texte_area','lightpink');}else{B_G_colors('texte_area','white');}
	}else{
		B_G_colors('titre_input','white');
		B_G_colors('urg_select','white');
		B_G_colors('type_select','white');
		B_G_colors('cat_select','white');
		B_G_colors('texte_area','white');
		
		$sql="INSERT INTO `demande` (`id`, `titre`, `urgence`, `type`, `categorie`, `description`, `piece`, `statut`, `demandeur`) VALUES (NULL, ?, ?, ?, ?, ?, ?, '1', ?)";

		$data = array($titre, $urgence, $type, $categorie, $description, $piece, $demandeur);
		$query=$conn->prepare($sql);
		if($query->execute($data)){
			echo"tseftooo";
		}else{
			echo "matseftoch";
		}
	}
}elseif(isset($_POST['etat']) && $_POST['etat'] == "desc"){

	if(isset($_POST["description"]))
	{
		$description = $_POST['description'];
		$id_demande = $_POST['id_demande'];
		$heure =  date("h:i:s");
		
		

		if(empty($description)){
			type_Message( 'Veuillez remplir le champs',"", 'red');		
		}else{
									
			$req = "INSERT INTO `description` (`id`,`description`, `heure`, `id_demande`, `envoyeur`) VALUES (NULL, ?, ?,?,?)";
			$dbdesc = array($description, $heure,$id_demande, $_COOKIE['id']);

			$res = $conn->prepare($req);
			if($res->execute($dbdesc)){
				$req =	"SELECT login.nom, login.prenom FROM description,login WHERE description.id_demande= ? AND description.envoyeur=login.id";
					$dbdesc = array($id_demande);
					$reslt = $conn->prepare($req);
					if($reslt->execute($dbdesc)){
						 $reslt = $reslt->fetchAll(PDO::FETCH_NUM  );
				echo"
					<li class='description'>$heure : ".$reslt[0][0]." " .$reslt[0][1]." <br>=> $description</li>
				";}
			}else{
				
			}
		}
	}       
    die();                                                                          
}elseif(isset($_POST['etat']) && $_POST['etat'] == "desc"){

	if(isset($_POST["description"])){
		$description = $_POST['description'];
		$id_demande = $_POST['id_demande'];
		$heure =  date("h:i:s");
		
		

		if(empty($description)){
			type_Message( 'Veuillez remplir le champs',"", 'red');		
		}else{
									
			$req = "INSERT INTO `description` (`id`,`description`, `heure`, `id_demande`, `envoyeur`) VALUES (NULL, ?, ?,?,?)";
			$dbdesc = array($description, $heure,$id_demande, $_COOKIE['id']);

			$res = $conn->prepare($req);
			if($res->execute($dbdesc)){
				$req =	"SELECT login.nom, login.prenom FROM description,login WHERE description.id_demande= ? AND description.envoyeur=login.id";
					$dbdesc = array($id_demande);
					$reslt = $conn->prepare($req);
					if($reslt->execute($dbdesc)){
						 $reslt = $reslt->fetchAll(PDO::FETCH_NUM  );
				echo"
					<li class='description'>$heure : ".$reslt[0][0]." " .$reslt[0][1]." <br>=> $description</li>
				";}
			}else{
				
			}
		}
	}       
    die(); 
   
}else{
	 die(); 
}
                                                                      
?>