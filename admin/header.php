
<?php
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
try 
    {   
        $stmt = $conn->prepare("SELECT * FROM settings");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $title=$result['title'];
        $footer=$result['footer'];
        $fevicon=$result['fevicon'];
        $logo=$result['logo'];
                          
    }catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    } 
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title><?=$title?></title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/uploads/settings/<?=$fevicon?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/selects/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap-extended.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/admin/css/colors.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/colors/palette-gradient.css">
    <!-- END: Page CSS-->

    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/extensions/sweetalert.css">
    
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="modern admin logo" src="../assets/uploads/settings/<?=$logo?>">
                            <h3 class="brand-text">Sistema de Gestion I.A.U.N.J</h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fas fa-bars" style="font-size: 18px;"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="fas fa-expand" style="font-size: 18px;"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="fas fa-search" style="font-size: 18px;"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Modern...">
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700"><?php echo $myemail; ?></span><span class="avatar avatar-online">
                            <?php
                        if ($myvataor == null) { ?>
                        <img src="../assets/admin/images/portrait/small/avatar.jpg" alt="avatar"><i></i>
                        <?php }else{

                        print ' <img  class="img-crop" src="../assets/uploads/avatar/'.$myvataor.'" alt="avatar" >';
                        }
                        ?></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="account.php">
                                    <i class="ft-user"></i> Mi Perfil
                                </a>
                                <a class="dropdown-item" href="account.php">
                                    <i class="la la-home"></i> Configuración Iglesia
                                </a>
                            <div class="dropdown-divider">
                            </div>
                                <a class="dropdown-item" href="../logout.php">
                                    <i class="ft-power"></i> Cerrar Sesión
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->

    <div class=" header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav " id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item "><a class="dropdown-toggle nav-link" href="index.php"><i class="fas fa-laptop-house" style="font-size: 18px;"></i><span>Escritorio</span></a>
                </li>
                <!-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="la la-medkit"></i><span>Medicinas</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="manage.php" data-toggle=""><i class="la la-edit"></i><span>Manage</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="manage.php?out=1" data-toggle=""><i class="la la-archive"></i><span>Out Stock</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="manage.php?expired=1" data-toggle=""><i class="la la-exclamation-circle"></i><span>Expired</span></a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="nav-item"><a class="dropdown-toggle nav-link" href="pos.php"><i class="la la-money"></i><span>POS</span></a></li> -->
                <!-- <li class="nav-item"><a class="dropdown-toggle nav-link" href="sales.php"><i class="la la-rupee"></i><span>Ventas</span></a></li> -->
                <!-- <li class="nav-item"><a class="dropdown-toggle nav-link" href="categories.php"><i class="la la-tags"></i><span>Categorias</span></a></li> -->
                <!-- <li class="nav-item"><a class="dropdown-toggle nav-link" href="suppliers.php"><i class="la la-truck"></i><span>Proveedores</span></a></li> -->
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="customers.php"><i class="fas fa-user-friends" style="font-size: 18px;"></i><span>Personas</span></a></li>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="users.php"><i class="fas fa-user-tie" style="font-size: 18px;"></i><span>Usuarios</span></a>
                </li>
                <!-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="fas fa-file-contract" style="font-size: 18px;"></i><span>Reportes</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="sales_report.php" data-toggle=""><i class="fas fa-file-contract"></i><span>Sales Report</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="purchase_report.php" data-toggle=""><i class="la la-archive"></i><span>Purchase Report</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="customer_report.php" data-toggle=""><i class="la la-group"></i><span>Customer Report</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="purchase_report.php?expired=1" data-toggle=""><i class="la la-exclamation-circle"></i><span>Purchase Expiry Report</span></a>
                        </li>
                    </ul>
                </li> -->
                <?php if($_SESSION['role']=='admin'){ ?>
                <li class="nav-item"><a class="dropdown-toggle nav-link" href="settings.php"><i class="fas fa-cogs" style="font-size: 18px;"></i><span>Config</span></a>
                </li>
                <?php } ?>

            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>