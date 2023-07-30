<?php 

include('lib/conexao.php');
include('lib/protect.php');
protect(0);

if(!isset($_SESSION))
        session_start();


$pagina = "inicial.php";
if(isset($_GET['p'])) {
    $pagina = $_GET['p'] . ".php";
}

$id_usuario = $_SESSION['usuario'];
$sql_query_admin = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id_usuario'") or die($mysqli->error);
$dados_usuario = $sql_query_admin->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Almoxarifado</title>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content="flat ui, admin  Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
    
    <div class="theme-loader">
        <div class="ball-scale">
            
        </div>
    </div>
    
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="index.php">
                            <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" width = 100px; height = 100px; />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            
                            
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <span><?php echo $dados_usuario['nome']; ?></span>
                                    
                                </a>
                                
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <?php if(!isset($_SESSION['admin']) || !$_SESSION['admin']) { ?>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Página Inicial</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                              

                                <li class="">
                                    <a href="index.php?p=estoque">
                                        <span class="pcoded-micon"><i class="ti-package"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Itens no Estoque</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="index.php?p=relatorio">
                                        <span class="pcoded-micon"><i class="ti-trash"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Logs de Exclusão</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="logout.php">
                                        <span class="pcoded-micon"><i class="ti-shift-left"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Sair</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <?php } else { ?>    
                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">

                                <li class="">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Página Inicial</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="index.php?p=funcionarios">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Funcionarios</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                
                                <li class="">
                                    <a href="index.php?p=estoque">
                                        <span class="pcoded-micon"><i class="ti-package"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Itens no Estoque</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="index.php?p=relatorio">
                                        <span class="pcoded-micon"><i class="ti-trash"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Logs de Exclusão</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="logout.php">
                                        <span class="pcoded-micon"><i class="ti-shift-left"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Sair</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <?php }  ?>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">
                                    <?php include('pages/' . $pagina); ?>
                                </div>
                            </div>
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>

<script type="text/javascript" src="assets/js/classie/classie.js"></script>

<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
