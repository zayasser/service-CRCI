<?php
session_start();

if(!isset($_SESSION["id"]) || (isset($_SESSION["id"]) && $_SESSION["grade"] == "0") ) {
    
    header('location: index.php');
}
 


include("conn.php");   

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
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
            <title>SERVICE CRCI-Demande</title>
            <meta content="Admin Dashboard" name="description" />
            <meta content="ThemeDesign" name="author" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />

            <link rel="shortcut icon" href="assets/images/sqli-1.png">

            <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
            <link href="assets/css/style.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>


           

            
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
                                    <a class="logo" href="support.php"><img src="assets/images/sqli-2.png" height="40" alt="logo"></a>
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
                                            <a class="dropdown-item" href="#" type="button" id="Deconnect"><i class="mdi mdi-logout m-r-5 text-muted" ></i> Déconnécter</a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </nav>

                        </div>
                        <!-- Top Bar End -->
                        <div class="page-content-wrapper ">
                            <?php
                                    if(isset($_GET)){
                                        if(isset($_GET['demande']) && is_numeric($_GET['demande'])){

                                            $getvaleur = $_GET['demande'];
                                        }else{
                                            die("error get");
                                        }
                                    }else{
                                        die("error get");
                                    }
                                    
                                try {
                                    $statement = $conn->query ("SELECT  d.titre, u.Val_urgence, g.val_damande, c.val_categorie, d.description, d.piece, s.statut, d.demandeur,d.statut


                                            FROM `demande` d
                                            left join urgence u on d.urgence = u.id 
                                            left join type g  on d.type = g.id  
                                            left join categorie c on c.id = d.categorie  
                                             
                                            left join statut s on d.statut=s.id
                                            left join login f on f.id= d.demandeur
                                           
                                            WHERE d.id ='".$getvaleur."'

                                      ");


                                   // $statement = $conn->query ("SELECT * FROM `demande` WHERE `demandeur`='".$getvaleur."'");
                                    $results = $statement->fetchAll(PDO::FETCH_NUM  );
                                    //var_dump($results);
                                    if($results[0][8] == '1'){
                                        $queryrr ="UPDATE `demande` SET `statut` = 2 WHERE `demande`.`id` = $getvaleur;";
                                        $statementss = $conn->query($queryrr);
                                        $statementss->execute();                      
                                    }
                                    $statement2 = $conn->query ("SELECT * FROM `login` WHERE `id`='".$results[0][7]."'");
                                    $results2 = $statement2->fetchAll(PDO::FETCH_NUM  );
                                    //var_dump($results2);
                                    $statement->execute(); 
                                    
                            ?>
                                
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12">                                        
                                        <h5 class="page-title text-center" style="color: blue"> Voici la demande de : <?php foreach ($results2 as $key => $demande2) { echo $demande2[1].' '.$demande2[2];}?> <?php foreach ($results as $key => $demande) { ?> </h5>
                                        <span id="messageRq"></span>
                                    </div>
                                </div>
                                <!-- end row -->   
                                <!-- Button trigger modal -->
                               

                                                         
                                    <div class="row">
                                        <form class="col-12" style="border: 0" action="?demandeur=<?=$getvaleur?>" id="formupdate" type="POST">
                                            <div class="card m-b-30">
                                                <div class="card-body">           
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label">Titre</label>
                                                        <div class="col-sm-10">
                                                            <p class="form-control"><?=htmlspecialchars($demande[0])?></p>
                                                        </div>
                                                    </div>        
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Niveau d’urgence </label>
                                                        <div class="col-sm-10">
                                                           <p class="form-control"><?=$demande[1]?></p> 
                                                        </div>
                                                    </div> 
                                                     <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Type</label>
                                                        <div class="col-sm-10">
                                                            <p class="form-control"><?= $demande[2]?></p>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Catégorie</label>
                                                        <div class="col-sm-10">
                                                            <p class="form-control"><?= $demande[3] ?></p>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Description détaillée de la demande</label>
                                                        <div class="col-sm-10">
                                                            <p class="form-control"><?=  htmlspecialchars($demande[4])?></p>
                                                        </div>


                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Pièce(s) jointe(s) (img/pdf/word) </label>
                                                        <div class="col-sm-10">                                                            
                                                            <a href="fichiers/<?= $demande[5] ?>" target="_blank">Voir</a>                                                   
                                                        </div>
                                                    </div>

                                                    <div class=" form-group row ">
                                                        <label class="col-sm-2 col-form-label">Statuts</label>
                                                        <div class="col-sm-10" >
                                                            <select class="" id="statut_select" name="statut">
                                                                <option style="color: blue" value ="0" selected><?= $demande[6] ?></option>
                                                                <option value="1">Nouveau</option>
                                                                <option value="2">En cours</option>
                                                                <option value="3">En attente </option>
                                                                <option value="4">Résolu </option>
                                                                <option value="5">Clos </option>                                                                
                                                            </select>
                                                            <button class="btn btn-primary waves-effect waves-light" name="envoyer" id="modi_butt" type="submit">Modifier</button>
                                                             <!-- Button trigger modal -->
                                                            <button type="button" style="float:right" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FromDescription">Repondre</button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="FromDescription" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable" style="min-width: 500px;">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" id="messagedesc">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">Discussion</h5>
                                                                        </div>
                                                                        <div class="modal-body" id="eeeee">
                                                                            <div id="chat" >
                                                                                <ul class="description" id="chaat">
                                                                                    <?php
                                                                                    $getvaleur = $_GET['demande'];
                                                                                    $message = $conn->query ("SELECT description, heure, nom,  prenom
                                                                                        FROM description d 
                                                                                        left join login l on l.id = d.envoyeur WHERE id_demande = $getvaleur
                                                                                        "
                                                                                        );
                                                                                    $resultsss = $message->fetchAll(PDO::FETCH_NUM  );
                                                                                    $message->execute();
                                                                                    //print_r($resultsss);
                                                                                    foreach ($resultsss as $key => $value) 
                                                                                    {


                                                                                    ?>
                                                                                    <li class="description"><?=$value[1]?> : <?=$value[2]?> <?=$value[3]?><br>=><?=$value[0]?></li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                      <input style="width: 100%" type="text" name="description" id="description" placeholder="Entrez votre message :" >
                                                                                      <input style="width: 100%" type="hidden" name="ss" id="demande_id" value="<?=$getvaleur?>" >
                                                                                    </div>
                                                                                    <div class="col-4 float-end" style="padding: 0">
                                                                                        <input type="button" class="btn btn-primary float-end" value="Envoyer" name="bout" id="bout"></input>
                                                                                        <button  type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Fermer</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                            <?php 

                                                            if (isset($_GET['id'])) {
                                                            $statut=$_POST["statut"];


                                                            $sql="UPDATE `demande` SET `statut` = '' WHERE `demande`.id=".$_GET['id'];
                                                            

                                                            $data = array($statut);
                                                            $query=$conn->prepare($sql);
                                                            if($query->execute($data)){
                                                                echo "khdeem";
                                                            }else{
                                                                echo "madakhlooooooch";
                                                            }

                                                            }?>
                                                        </div>
                                                    </div>  
                                                    

                                                                                                        
                                                    <?php }
                                                    }catch(Exception $e) {
                                                        echo $e->getMessage();
                                                    }?>  
                                                </div>
                                            </div>

                                        </form> <!-- end col -->
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
        <script src="./js/update.js"></script>
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

}?>