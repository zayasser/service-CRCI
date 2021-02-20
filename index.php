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
        $grade='';

        $_SESSION["prenom"] = NULL;
        $_SESSION["nom"] = NULL;
        $_SESSION["login"] = NULL;
        $_SESSION["id"] = NULL;
        $_SESSION["Connecte"] = NULL;
        
        setcookie('connect',NULL, NULL, '/');
        setcookie('id',NULL,NULL, '/');
        setcookie('connect_type',NULL,NULL, '/');
        setcookie('grade',NULL,NULL, '/');

	}
	if(TEST_Val($prenom)==TRUE&&TEST_Val($nom)==TRUE&&TEST_Val($login)==TRUE&&TEST_Val($id)==TRUE&&TEST_Val($Connecte)==TRUE ){
        if(!isset($_SESSION["id"]) || (isset($_SESSION["id"]) && $_SESSION["grade"] == "5") ) {
        header('location: support.php');
        }
 	
		?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
                <title>SERVICE CRCI-Service</title>
                <meta content="Admin Dashboard" name="description" />
                <meta content="ThemeDesign" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <link rel="shortcut icon" href="assets/images/sqli-1.png">

                <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
                <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
                <link href="assets/css/style.css" rel="stylesheet" type="text/css">
                <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
                
            </head>
            <body class="fixed-left">

                <!-- Loader -->
                <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

                <!-- Begin page -->
                <div id="wrapper">

                    <!-- ========== Left Sidebar Start ========== -->
                   
                    <!-- Left Sidebar End -->

                    <!-- Start right Content here -->

                    <div class="content-page">
                        <!-- Start content -->
                        <div class="content">

                            <!-- Top Bar Start -->
                            <div class="topbar">

                                <div class="topbar-left d-none d-lg-block">
                                    <div class="text-center">
                                        
                                        <a class="logo"><img src="assets/images/sqli-2.png" height="40" alt="logo"></a>
                                    </div>
                                </div>
                                

                                <nav class="navbar-custom">

                                    <ul class="list-inline float-right mb-0">                                                            
                                       <li class="list-inline-item dropdown notification-list">
                                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                               aria-haspopup="false" aria-expanded="false">
                                               <?php                                            
                                                 echo'<font color="white"> Bonjour  : '  .$_SESSION['prenom']." ".$_SESSION['nom'] . '</font>';            
                                                ?>
                                                <img src="assets/images/users/user-1.jpg" alt="user" class="rounded-circle">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                                <a class="dropdown-item" href="demande-detail.php" type="button" id=""><i class="bi bi-envelope-fill"></i>Mes demandes</a>
                                                <a class="dropdown-item" href="#" type="button" id="Deconnect"><i class="mdi mdi-logout m-r-5 text-muted" ></i> Déconnécter</a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </nav>

                            </div>
                            <!-- Top Bar End -->
                            <div class="page-content-wrapper ">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            
                                            <h5 class="page-title text-center">Formulaire de la demande</h5>
                                            <span id="messageRq"></span>
                                        </div>
                                    </div>
                                    <!-- end row -->                              
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card m-b-30">
                                                    <div class="card-body">           
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label">Titre</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" placeholder="Entrer le titre de la demande" id="titre_input" name="titre">
                                                                <span class="error-message"></span>
                                                            </div>
                                                        </div>        
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Niveau d’urgence </label>
                                                            <div class="col-sm-10">
                                                                <select class="custom-select" name="urgence" id="urg_select">
                                                                    <option value="0" selected>Sélectionner un niveau d'urgence</option>
                                                                    <option value="1">Basse</option>
                                                                    <option value="2">Moyen</option>
                                                                    <option value="3">Urgente</option>
                                                                    <option value="4">Très urgente</option>
                                                                    <option value="5">Bloquante</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                         <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Type</label>
                                                            <div class="col-sm-10">
                                                                <select class="custom-select" id="type_select" name="type">
                                                                    <option value ="0" selected>Sélectionner un type</option>
                                                                    <option value="1">Une demande</option>
                                                                    <option value="2">un incident</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Catégorie</label>
                                                            <div class="col-sm-10">
                                                                <select class="custom-select" id="cat_select" name="categorie">
                                                                    <option value ="0" selected>Sélectionner une catégorie</option>
                                                                    <option value="1">Licence d’un logiciel</option>
                                                                    <option value="2">Un matériel</option>
                                                                    <option value="3">Un accès </option>
                                                                </select>
                                                            </div>
                                                        </div>                                                    
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Description détaillée de la demande</label>
                                                            <div class="col-sm-10">
                                                                <TEXTAREA style="width: 100%" id="texte_area" name="area" rows=4 cols="100" placeholder="Description détaillée de la demande"></TEXTAREA>
                                                                <span class="error-message"></span>
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Pièce(s) jointe(s) (img/pdf/word) </label>
                                                            <div class="m-b-30  fallback">
                                                                <form action="#" class="">
                                                                    <input id="file" name="file" type="file" accept="image/* , .pdf , .docx"  >
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="text-center m-t-15">
                                                                <button class="btn btn-primary waves-effect waves-light" name="envoyer" id="dem_butt" type="submit">Envoyer</button>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->   
                                                
                                </div><!-- container fluid -->
                            </div> <!-- Page content Wrapper -->
                        </div> <!-- content -->
                        <footer class="footer" >
                             © 2020 <b>SQLI</b> <span class="d-none d-sm-inline-block"><i class="mdi mdi-heart text-danger"></i></span>
                        </footer>
                    </div>
                    <!-- End Right content here -->
                </div>
                <!-- END wrapper -->
                <!-- jQuery  -->
                            
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
            <!-- jQuery  -->
            <script src="./assets/js/jquery.min.js"></script>
            <script src="./assets/js/bootstrap.bundle.min.js"></script>
            <script src="./assets/js/modernizr.min.js"></script>
            <script src="./assets/js/detect.js"></script>
            <script src="./assets/js/fastclick.js"></script>
            <script src="./assets/js/jquery.slimscroll.js"></script>
            <script src="./assets/js/jquery.blockUI.js"></script>
            <script src="./assets/js/waves.js"></script>
            <script src="./assets/js/jquery.nicescroll.js"></script>
            <script src="./assets/js/jquery.scrollTo.min.js"></script>

            <!-- App js -->
            <script src="./assets/js/app.js"></script>
            
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
	case 'inscription': $page= 'inscription';$title='SERVICE CRCI-inscription'; break;
	case 'login': $page= 'login';$title='SERVICE CRCI-Login'; break;
	case 'service': $page= 'service';$title='SERVICE CRCI-Service'; break;
	default : $page= 'ERROR';$title='SERVICE CRCI-Service'; break;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $title; ?></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <link rel="shortcut icon" href="assets/images/sqli-1.png">

        <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="./assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="./assets/css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        

    </head>

	
    <body class="fixed-left">
         <script type="text/javascript" src="assets/js/jqr.js"></script>
		 <!-- my js --
		<script src="js/js.js"></script> -->
		
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
		<?php  /////  inscription PAGE  /////  inscription PAGE  /////  inscription PAGE  /////  inscription PAGE  /////  inscription PAGE  /////
			if($page=='inscription'){
		?>

        <!-- Begin page -->
        <div class="accountbg">
            
            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                    
                                        <h3 class="text-center mt-0 m-b-15">
                                            <a class="logo logo-admin"><img src="assets/images/sqli-2.png" height="50" alt="logo"></a>
                                        </h3>
                    
                                        <h4 class="text-muted text-center font-18"><b>Register</b></h4>
                    
                                        <div class="p-3">
                                            <form class="form-horizontal m-t-20" method="POST" action="">
                                                
                                                 <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="text"  name="nom" id="insc_nom"  placeholder="Entrer votre Nom">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="text"  name="prenom" id="insc_prenom"  placeholder="Entrer votre Prénom">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="text" name="login" id="insc_login"  placeholder="Entrer le nom d'utilisateur">
                                                    </div>
                                                </div>
                    
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="password"  name="password" id="insc_pass"  placeholder="Entrer le mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                    </div>
                                                </div>
                    
                    
                                                <div class="form-group text-center row m-t-20" action="login.php">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" id="insc_butt" type="submit">Register</button>
                                                    </div>
                                                </div>
                    
                                                <div class="form-group m-t-10 mb-0 row">
                                                    <div class="col-12 m-t-20 text-center">
                                                        <a href="?page=login" class="text-muted">Avez-vous déjà un compte?</a>
                                                    </div>
                                                </div>
													
                                                <span id="messageRq"></span>
												<div id="message">
													<p id="letter" class="invalid">Une lettre <b>minuscule</b></p>
													<p id="capital" class="invalid">Une lettre <b>majuscule</b></p>
													<p id="number" class="invalid">un <b>nombre</b></p>
													<p id="symbole" class="invalid">Un <b>symbole</b></p>
													<p id="length" class="invalid">Minimum <b>8 caractères</b></p>
												</div>	
                                                <script type="text/javascript"></script>

                                            </form>
                                            <?php
                                                //include 'inscription.php';
                                            ?>
                                        </div>
                    
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
		<?php }elseif($page=='login'){ /////  LOGIN PAGE  /////  LOGIN PAGE  /////  LOGIN PAGE  /////  LOGIN PAGE  /////  LOGIN PAGE  /////?> 
			<div class="accountbg">
            
            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                
                                        <h3 class="text-center mt-0 m-b-15">
                                            <a class="logo logo-admin"><img src="assets/images/sqli-2.png" height="50" alt="logo"></a>
                                        </h3>
                
                                        <h4 class="text-muted text-center font-18"><b>Se connecter</b></h4>
                
                                        <div class="p-2">
                                            <form class="form-horizontal m-t-20" method="POST" action="">
                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="text" name="login" placeholder="login" id="loging_log">
                                                    </div>
                                                </div>
                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="password" name="password" placeholder="Password" id="password_log">
                                                    </div>
                                                </div>
                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="remembre">
                                                            <label class="custom-control-label" for="customCheck1" id="LableRemmBrme">Souviens moi</label>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="form-group text-center row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light"  name="login_butt" id="login_butt" type="submit">S'identifier</button>
                                                    </div>
                                                </div>
                
                                                <div class="form-group m-t-10 mb-0 row">
                                                    <div class="col-sm-5 m-t-20">
                                                        <a href="?page=inscription" class="text-muted"><i class="mdi mdi-account-circle"></i>Crée un compte</a>
                                                    </div>
                                                </div>
												<span id="messageRq"></span>
                                            </form>
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
		<?php }elseif($page=='ERROR'){  /////  ERROR 404 PAGE  /////  ERROR 404 PAGE PAGE  /////  ERROR 404 PAGE PAGE  /////  ERROR 404 PAGE PAGE  /////  ERROR 404 PAGE PAGE  /////
			header("Location:ERROR-404.php");
		}


         ?>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        <!-- jQuery  -->
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/js/modernizr.min.js"></script>
        <script src="./assets/js/detect.js"></script>
        <script src="./assets/js/fastclick.js"></script>
        <script src="./assets/js/jquery.slimscroll.js"></script>
        <script src="./assets/js/jquery.blockUI.js"></script>
        <script src="./assets/js/waves.js"></script>
        <script src="./assets/js/jquery.nicescroll.js"></script>
        <script src="./assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="./assets/js/app.js"></script>
		
		<!-- my js -->
		<script src="./js/js.js"></script>
			
    </body>
    
</html>
<?php 
	}
?>