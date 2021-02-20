
<?php
#################### Variable ####################
$linkIndex = "http://localhost/Projetstage/";
$linkError505 = "http://localhost/Projetstage/ERROR-500.php";

#################### Variable ####################
function type_Message($TextImprtn,$Text,$EtatMessage){ // EtatMessage = [s,i,w,d] S=success  I=info  W=warning  D=danger
	switch($EtatMessage){
		case 's':$EtatMessage="success";break;
		case 'S':$EtatMessage="success";break;
		case 'OK':$EtatMessage="success";break;
		case 'green':$EtatMessage="success";break;
		
		case 'i':$EtatMessage="info";break;
		case 'I':$EtatMessage="info";break;
		case 'info':$EtatMessage="info";break;
		
		case 'w':$EtatMessage="warning";break;
		case 'W':$EtatMessage="warning";break;
		case 'atontion':$EtatMessage="warning";break;
		
		case 'd':$EtatMessage="danger";break;
		case 'D':$EtatMessage="danger";break;
		case 'danger':$EtatMessage="danger";break;
		case 'red':$EtatMessage="danger";break;
		
		default: $EtatMessage="i";break;
	}
	echo '<div class="alert alert-'.$EtatMessage.' alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
			</button>
			<strong>'.$TextImprtn.'</strong> 
			'.$Text.'
		</div>';
}
	$host='localhost';
	$user='root';
	$pass='';
	$db='stage';

	//$conn = new mysqli($host,$user,$pass,$db);
	try {
		$conn = new PDO('mysql:host='.$host.'; charset=utf8;dbname='.$db.'', $user, $pass);
		/*foreach($conn->query('SELECT * from login') as $row) {
			//print_r($row[4]);echo'<br>';
			if($row[4]==md5('haha')){
				echo 'oke';
			}
		}*/
	}catch (PDOException $e) {
		$conn ='';
		echo'<script>setTimeout(function(){ location.assign("'.$linkError505.'"); }, 1);</script>';
		//print "Error!: " . $e->getMessage() . "<br/>"; //ERROR CONNECTION
		//header('Location: '.$linkIndex);
		die();
	}


?>