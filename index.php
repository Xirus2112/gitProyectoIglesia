<?php
session_start();
require_once('assets/constants/config.php');
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
        $login_image=$result['login_image'];
          //prueba                
    }catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$title?></title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/uploads/settings/<?=$fevicon?>">
 <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    
    <!-- css files -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- //css files -->
    
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- //google fonts -->
    <style>
        .alert-warning {
    border-color: #FF9149!important;
    background-color: #FFBC90!important;
    color: #963B00!important;
}
.alert {
    position: relative;
}
.mb-2, .my-2 {
    margin-bottom: 1.5rem!important;
}
.alert {
    padding: .75rem 1rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
    </style>
</head>
<body>

<div class="signupform">
    <div class="container">
        <!-- main content -->
        <div class="agile_info">
            <div class="w3l_form">
                <div class="left_grid_info">
                    <h1>Miembros de <strong>I.A.U.N.J</strong> </h1>
 
                    <?php if($login_image!=''){ ?>
                        <img  src="assets/uploads/settings/<?=$login_image?>" alt="" />
                    <?php }else{ ?>
                    <img src="assets/images/image.jpg" alt="" />
                    <?php } ?>
                </div>
            </div>
            <div class="w3_info">
                <h2>Ingrese a su cuenta</h2>
                <p>Ingrese sus datos para iniciar sesi??n.</p>
                <?php require_once('assets/constants/check-reply.php'); ?>
                <form action="assets/app/auth.php" method="POST" autocomplete="OFF">
                    <label>Email</label>
                    <div class="input-group">
                        <span class="fa fa-envelope" aria-hidden="true"></span>
                        <input type="email" name="email" placeholder="Escribe Tu Correo" required="" autofocus="on"> 
                    </div>
                    <label>Contrase??a</label>
                    <div class="input-group">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="password" placeholder="Escribe tu contrase??a" required="">
                    </div>                     
                        <button class="btn btn-danger btn-block" type="submit">Iniciar Sesi??n</button >                
                </form>
            </div>
        </div>
        <!-- //main content -->
    </div>
    <!-- footer -->
    <div class="footer">
        <p>&copy; <?php echo date('Y'); ?> Formulario de inicio de sesi??n empresarial. Todos los derechos Reservados | Creado por <b>Carlos A. M.</b></p>
    </div>
    <!-- footer -->
</div>
    
</body>
</html>