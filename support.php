<?php
session_start();

if(!isset($_SESSION["id"]) || (isset($_SESSION["id"]) && $_SESSION["grade"] == "0") ) {
    //die('Syed marahh conncte');
    header('location: index.php');
}
 
//echo substr(http_build_query($_GET),0,4);
//$_GET['page']='inscription';      

include("conn.php");
    function TEST_Val($value_her){
        if(!isset($value_her)||empty($value_her)||$value_her==''||$value_her==NULL){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    if(isset($_SESSION['prenom'])==TRUE&&isset($_SESSION['nom'])==TRUE&&isset($_SESSION['login'])==TRUE&&isset($_SESSION['id'])==TRUE&&isset($_SESSION['Connecte'])==TRUE&&isset($_SESSION['grade'])==TRUE && isset($_COOKIE['connect'])==TRUE&& isset($_COOKIE['connect_type'])==TRUE&& isset($_COOKIE['id'])==TRUE){
        $prenom=$_SESSION["prenom"];
        $nom=$_SESSION["nom"];
        $login=$_SESSION["login"];
        $id=$_SESSION["id"];
        $Connecte=$_SESSION["Connecte"];
        $grade=$_SESSION["grade"];
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
        $_SESSION["grade"] = NULL;
        setcookie('connect',NULL, NULL, '/');
        setcookie('id',NULL,NULL, '/');
        setcookie('connect_type',NULL,NULL, '/');
        setcookie('grade',NULL,NULL, '/');
    }
    if(TEST_Val($prenom)==TRUE&&TEST_Val($nom)==TRUE&&TEST_Val($login)==TRUE&&TEST_Val($id)==TRUE&&TEST_Val($Connecte)==TRUE){
?>
        <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
                    <title>SERVICE CRCI-Suport</title>
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

                        <div>
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
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-sm-12">                                        
                                             <h5 class="page-title text-center" style="color: pink">LES DEMANDES</h5>
                                             
                                            <span id="messageRq"></span>
                                        </div>                        
                                    </div>
                                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card m-b-30">
                                                <div class="card-body">                                            
                                                    
                                                    <h1 class="text-center">Voici les demandes que nous avons</h1>
                                                    <?php
                                                        try {
                                                            $statement = $conn->query ("SELECT  d.titre, u.Val_urgence, g.val_damande, c.val_categorie, d.description, d.piece, f.nom, f.id, s.statut, d.id

                                                             FROM `demande` d
                                                            left join urgence u on d.urgence = u.id 
                                                            left join type g  on d.type = g.id  
                                                            left join categorie c on c.id = d.categorie  
                                                            left join login f on f.id= d.demandeur  
                                                            /*left join login h on h.id= d.responsable*/
                                                            left join statut s on d.statut=s.id
                                                        

                                                        ");
                                                        //$statement->execute(); 
                                                            $results = $statement->fetchAll(PDO::FETCH_NUM  );                                             
                                                    ?>
                                                        <table class="table table-striped mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Titre</th>
                                                                    <th>Urgence</th>
                                                                    <th>Type</th>
                                                                    <th>Categorie</th>
                                                                    <th>Piéce</th>
                                                                    <th>Demandeur</th>
                                                                    <th>Plus de détail</th>
                                                                    <th>Statut</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($results as $key => $demande) { ?>
                                                            <tr>
                                                                <td><?=htmlspecialchars( $demande[0]) ?></td>
                                                                <td><?= $demande[1] ?></td>
                                                                <td><?= $demande[2] ?></td>
                                                                <td><?= $demande[3] ?></td>
                                                                <td><a href="fichiers/<?= $demande[5] ?>" target="_blank">Voir</a></td>
                                                                <td><a href="support-detail.php?demandes=<?= $demande[7] ?>" target="_blank"><?= $demande[6] ?> </td>
                                                                <td><a href="detail.php?demande=<?= $demande[9] ?>" target="_blank">Plus</a></td>
                                                                <td><?= $demande[8] ?></td>                                                        
                                                            </tr>
                                                            <?php

                                                        }
                                                         ?>
                                                        </tbody>
                                                        </table>
                                                        <?php

                                                        if (isset($_GET['id'])) {
                                                        $statement = $conn->query('SELECT id, titre, piece from demande where id='.$_GET['id']);
                                                        $demande = $statement->fetch();
                                                        //var_dump($demande);
                                                        }


                                                        } catch(Exception $e) {
                                                            echo $e->getMessage();
                                                        }?>                
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
                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/bootstrap.bundle.min.js"></script>
                <script src="assets/js/modernizr.min.js"></script>
                <script src="assets/js/detect.js"></script>
                <script src="assets/js/fastclick.js"></script>
                <script src="assets/js/jquery.slimscroll.js"></script>
                <script src="assets/js/jquery.blockUI.js"></script>
                <script src="assets/js/waves.js"></script>
                <script src="assets/js/jquery.nicescroll.js"></script>
                <script src="assets/js/jquery.scrollTo.min.js"></script>

                <!-- XEditable Plugin -->
                <script src="assets/plugins/moment/moment.js"></script>
                <script src="assets/plugins/x-editable/js/bootstrap-editable.min.js"></script>
                <script src="assets/pages/xeditable.js"></script>


                <!-- App js -->
                <script src="assets/js/app.js"></script>

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