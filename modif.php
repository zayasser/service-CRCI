<?php

if(!isset($_POST)){

	die("EROOR NOT FOUND");

}else{
	if(isset($_POST['etat']) && $_POST['etat'] == 'modif'){
		if(isset($_POST['statut']) && $_POST['statut'] != NULL){
			extract($_POST);
			if((int)$statut>=0 && (int)$statut<=5){
				if(isset($_GET['demandeur'])){
					$nDemand =  $_GET['demandeur'];
					if(is_numeric($nDemand)){
						require_once 'conn.php';
						$query = "SELECT * FROM demande WHERE id = ?";
						$dddd = $conn->prepare($query);
						if($dddd->execute([(int)$nDemand])){
							if($result = $dddd->fetch(PDO::FETCH_ASSOC)){
				                	 if($result['statut'] != $statut){

										$query ="UPDATE `demande` SET `statut` = ? WHERE `demande`.`id` = ?;";
										$satment = $conn->prepare($query);
										if($satment->execute([$statut, (int)$nDemand])){
											type_Message( 'Modifié avec succès',"", 'green');
										}
				                	 }	
							}
						}
				
					}else{
						die("EROOR NOT FOUND");
					}
				}else{
					die("EROOR NOT FOUND");
				}

			}else{
				die("EROOR NOT FOUND");
			}
		}else{
			die("EROOR NOT FOUND");
		}
	}elseif(isset($_POST['etat']) && $_POST['etat'] == 'desc'){

	}else{
		die("EROOR NOT FOUND");
	}

}
