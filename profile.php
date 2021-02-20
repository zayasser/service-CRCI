<?php
session_start();

include("conn.php");
//echo substr(http_build_query($_GET),0,4);
//$_GET['page']='inscription';      

	function TEST_Val($value_her){
		if(!isset($value_her)||empty($value_her)||$value_her==''||$value_her==NULL){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	if(isset($_SESSION['prenom'])==TRUE&&isset($_SESSION['nom'])==TRUE&&isset($_SESSION['login'])==TRUE&&isset($_SESSION['id'])==TRUE&&isset($_SESSION['Connecte'])==TRUE && isset($_COOKIE['connect'])==TRUE&& isset($_COOKIE['connect_type'])==TRUE&& isset($_COOKIE['id'])==TRUE){
		$prenom=$_SESSION["prenom"];
		$nom=$_SESSION["nom"];
		$login=$_SESSION["login"];
		$id=$_SESSION["id"];
		$Connecte=$_SESSION["Connecte"];
	}else{
		$prenom='';
		$nom='';
		$login='';
		$id='';
		$Connecte='';

        $_SESSION["prenom"] = NULL;
        $_SESSION["nom"] = NULL;
        $_SESSION["login"] = NULL;
        $_SESSION["id"] = NULL;
        $_SESSION["Connecte"] = NULL;
        setcookie('connect',NULL, NULL, '/');
        setcookie('id',NULL,NULL, '/');
        setcookie('connect_type',NULL,NULL, '/');

	}
	if(TEST_Val($prenom)==TRUE&&TEST_Val($nom)==TRUE&&TEST_Val($login)==TRUE&&TEST_Val($id)==TRUE&&TEST_Val($Connecte)==TRUE){
		
		?>

<!DOCTYPE html>
    <html>
    	<head>
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


			<link href="assets/css/profile.css" rel="stylesheet" type="text/css">
			<!------ Include the above in your HEAD tag ---------->
		</head>
		<body>
			<div class="container emp-profile">
			            <form method="post">
			            	
			                <div class="row">
			                    <div class="col-md-10">
			                        <div class="profile-img">
			                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
			                            <div class="file btn btn-lg btn-primary">
			                                Change Photo
			                                <input type="file" name="file"/>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="col-md-6">
			                        <div class="profile-head">
			                            <h5>
			                                    	
			                                       
			                            </h5>
			                        </div>
			                    </div>
			                    <div class="col-md-2">
			                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
			                    </div>
			                </div>

			                <div class="row ">
			                   
			                    <div class="col-md-8">
			                        <div class="tab-content profile-tab" id="myTabContent">
			                            <div class="tab-pane fade show active profile-head" id="home" role="tabpanel" aria-labelledby="home-tab">
			                            		<h4><?php                                            
			                                                     echo'<font>  '  .$_SESSION['prenom']." ".$_SESSION['nom'] . '</font>';            
			                                                    ?></h4>

			                            	<ul class="nav nav-tabs" id="myTab" role="tablist">
				                                <li class="nav-item">
				                                    <a class="nav-link active" id="home-tab" data-toggle="tab"  role="tab" aria-controls="home" aria-selected="true">About</a>
				                                </li>                                
			                            	</ul>
			                                        <div class="row">
			                                            <div class="col-md-6">
			                                                <label>Nom</label>
			                                            </div>
			                                            <div class="col-md-6">
			                                                <p><?php echo $_SESSION['nom'] ;?></p>
			                                            </div>
			                                        </div>
			                                        <div class="row">
			                                            <div class="col-md-6">
			                                                <label>Prenom</label>
			                                            </div>
			                                            <div class="col-md-6">
			                                                <p><?php echo $_SESSION['prenom'] ;?></p>
			                                            </div>
			                                        </div>
			                                        <div class="row">
			                                            <div class="col-md-6">
			                                                <label>Login</label>
			                                            </div>
			                                            <div class="col-md-6">
			                                                <p>kshitighelani@gmail.com</p>
			                                            </div>
			                                        </div>
			                                        <div class="row">
			                                            <div class="col-md-6">
			                                                <label>N° téléphone</label>
			                                            </div>
			                                            <div class="col-md-6">
			                                                <p>123 456 7890</p>
			                                            </div>
			                                        </div>
			                                        <div class="row">
			                                            <div class="col-md-6">
			                                                <label>Adresse</label>
			                                            </div>
			                                            <div class="col-md-6">
			                                                <p>123 456 7890</p>
			                                            </div>
			                                        </div>
			                            </div>                            
			                        </div>
			                    </div>
			                </div>
			            </form>           
			        </div>
			        <!-- my js -->
                <script src="./js/js.js"></script>
		</body>
	</html>
    <?php
    }else{  
    if(strlen(http_build_query($_GET))==0){
        $get_valeu="login"; //echo "isset get ==>  [".http_build_query($_GET)."]".strlen(http_build_query($_GET));
    }elseif(substr(http_build_query($_GET),0,5)=='page='){
        $get_valeu=$_GET['page'];  
    }else{
        $get_valeu='ERROR';
    }
    switch($get_valeu){
    case 'support': $page= 'support';$title='SERVICE CRCI-Support'; break;
    case 'support-detail': $page= 'support-detail';$title='SERVICE CRCI-Detail'; break;
    default : $page= 'ERROR';$title='SERVICE CRCI-Service'; break;
}

}

?>