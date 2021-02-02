<?php

	include("conn.php");




//préparation de la reqête d'insertion (sql)


//$pdoStat = $conn->prepare('INSERT INTO demande VALUES(NULL, :titre, :urgence, :type, :categorie, :description ,:file');
$pdoStat = $conn->prepare('INSERT INTO demande VALUES(NULL, :titre, :urgence, :type, :categorie,:description , NULL');


//on lie chaque marque à une valeur

$pdoStat->bindValue(':titre', $_POST['titre'],PDO::PARAM_STR);
$pdoStat->bindValue(':urgence', $_POST['urgence'],PDO::PARAM_STR);
$pdoStat->bindValue(':type', $_POST['type'],PDO::PARAM_STR);
$pdoStat->bindValue(':categorie', $_POST['categorie'],PDO::PARAM_STR);
$pdoStat->bindValue(':description', $_POST['description'],PDO::PARAM_STR);
//$pdoStat->bindValue(':file', $_POST['file'],PDO::PARAM_STR);

//$pdoStat->bindValue(':piece', $_FILE['file'],PDO::PARAM_STR);
//éxécution de la requête préparée
echo '<pre style="font-family:"Lucida Console", monospace">';
echo 'description\t:\t'.$_POST['description'];
echo '\ntitre\t:\t'.$_POST['titre'];
echo '\nurgence\t:\t'.$_POST['urgence'];
echo '\ntype\t:\t'.$_POST['type'];
echo '\ncategorie\t:\t'.$_POST['categorie'];
echo '</pre>';
$insertisOk = $pdoStat->execute();

if ( $insertisOk) {
	$message ='c bon';
}else{
 $message = 'Echec de l:insertion';
}







/*extract($_POST);



$host="localhost:3306";
$user="root";
$password="";
$db="demande";


$



$sql="INSERT INTO demande(titre_input, type_select, cat_select, texte_area, piece) VALUES(?,?,?,?,?)";
$data = array($titre_input, $type_select, $cat_select, $texte_area, $piece );
$query=$db->prepare($sql);
$result=$query->execute($data); */




?>