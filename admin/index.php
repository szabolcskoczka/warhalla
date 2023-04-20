<?php
ob_start();
session_start();
if(!isset($_SESSION['login'],$_SESSION['id'],$_SESSION['email'])){
    header("location:login.php");
    return;    
}
if(!isset($_REQUEST['page'])){
    $_REQUEST['page']="start";
}
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Admin oldal</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Alapoldal</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                   
                    <span>Festékek</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?page=festekek">Festékek</a>
                        <a class="collapse-item" href="index.php?page=festekek-fajta">Fajta</a>
                        <a class="collapse-item" href="index.php?page=festekek-felulet">Felület</a>
                        <a class="collapse-item" href="index.php?page=festekek-meret">Méret</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <span>Modellek</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?page=modellek">Modellek</a>
                        <a class="collapse-item" href="index.php?page=modellek-frakcio">Modell frakció</a>
                        <a class="collapse-item" href="index.php?page=modellek-jatek-tipusa">Modell játékának típusa</a>
                        <a class="collapse-item" href="index.php?page=modellek-anyaga">Modell anyaga</a>
                        <a class="collapse-item" href="index.php?page=modellek-kategoriaja">Modell kategóriája</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetilities"
                    aria-expanded="true" aria-controls="collapsetilities">
                    
                    <span>Felhasználók</span>
                </a>
                <div id="collapsetilities" class="collapse" aria-labelledby="headingtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?page=felhasznalok">Felhasználók</a>
                        <a class="collapse-item" href="index.php?page=admin_fiokok">Admin fiókok</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    if(isset($_SESSION["id"])){
                                        echo $_SESSION["login"];
                                    }
                                    ?>
                                </span>
                                
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Warhalla adminisztrációs felület</h1>
                    </div>
                    <div class="p-2">
                        <?php
                            switch($_REQUEST['page']){
                                case "festekek":
                                    echo'<h1>Festékek</h1>';
                                    include "festekek.php";
                                    break;
                                case "festekek-fajta":
                                    echo'<h1>Festékek fajtája</h1>';
                                    include "festekek_fajtaja.php";
                                    break;
                                case "festekek-felulet":
                                    echo'<h1>Festékek felülete</h1>';
                                    include "festekek_felulete.php";
                                    break;
                                case "festekek-meret":
                                    echo'<h1>Festékek mérete</h1>';
                                    include "festekek_merete.php";
                                    break;
                                case "modellek":
                                    echo'<h1>Modellek</h1>';
                                    include "modell.php";
                                    break;
                                case "modellek-frakcio":
                                    echo'<h1>Modellek frakciója</h1>';
                                    include "frakciok.php";
                                    break;
                                case "modellek-jatek-tipusa":
                                    echo'<h1>Modellek játék típusa</h1>';
                                    include "modell_jatek_tipusa.php";
                                    break;
                                case "modellek-anyaga":
                                    echo'<h1>Modellek anyaga</h1>';
                                    include "modell_anyaga.php";
                                    break;
                                case "modellek-kategoriaja":
                                    echo'<h1>Modellek kategóriája</h1>';
                                    include "modell_kategoriaja.php";
                                    break;
                                case "felhasznalok":
                                    echo'<h1>Felhasználók</h1>';
                                    include "felhasznalok.php";
                                    break;
                                case "admin_fiokok":
                                    echo'<h1>Admin fiókok</h1>';
                                    include "admin_fiokok.php";
                                    break;
                                default:
                                    echo'<h1>Válasszon a menüpontok közül</h1>';
                                    break;
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Warhalla 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ki szeretne lépni?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Kattintson a kijelentkezésre, ha kiszeretne jelentkezni.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Mégsem</button>
                    <a class="btn btn-primary" href="logout.php">Kijelentkezés</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<?php
  // Close the database connection
  mysqli_close($conn);
?>
</body>

</html>
<?php
ob_end_flush();
?>