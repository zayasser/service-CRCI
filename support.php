<?php
include("conn.php");
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
                                            // echo'<font color="white"> Bonjour  </font>'; echo '<font color="red">'.$_SESSION['prenom']." ".$_SESSION['nom'] . '</font>';            
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
                                            
                                            <p class="text-center">Voici les demandes que nous avons</p>
            
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Urgence</th>
                                                    <th>Type</th>
                                                    <th>Categorie</th>
                                                    <th>Description</th>
                                                    <th>Piéce</th>
                                                    <th>Demandeur</th>
                                                    <th>Responsable</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Simple Text Field</td>
                                                    <td>
                                                        <a>superuser</a>
                                                    </td>
                                                    <td>hola</td>
                                                </tr>
                                                <tr>
                                                    <td>Empty text field, required</td>
                                                    <td>
                                                        <a ></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Select, local array, </td>
                                                    <td>
                                                        <a ></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Select, error while loading</td>
                                                    <td>
                                                        <a >Active</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Combodate</td>
                                                    <td>
                                                        <a ></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Textarea, buttons below. r</td>
                                                    <td>
                                                        <a >awesome user!</a>
                                                    </td>
                                                </tr>            
                                                </tbody>
                                            </table>            
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

    </body>
</html>