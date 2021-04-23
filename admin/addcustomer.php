<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');
include('header.php');
?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Agregar Persona</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Escritorio</a>
                                </li>
                                <li class="breadcrumb-item active">Agregar Persona
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Input Validation start -->
                <section class="input-validation">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="app/customers.php" method="post" enctype="multipart/form-data" novalidate>
                                            
                                            <!-- <div class="row row-cols-12">
                                                <div class="col ">
                                                    <div class="text-center">
                                                        <?php
                                                            if ($myvataor == null) { ?>
                                                            <img src="../assets/admin/images/portrait/small/avatar.jpg" alt="avatar" class="rounded float-left rounded-circle" style="border: 1px solid black;  border-radius:50px; width:50px; height:50px;">
                                                            <?php }else{
                                                            print ' <img  id="blah" style="border: 1px solid black;  border-radius:5px; width:50px; height:50px;" class="rounded float-center rounded-circle"  src="../assets/uploads/avatar/'.$myvataor.'" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><br><br>'; }
                                                        ?>
                                                        <input type="file"  onchange="readURL(this);" name="image" accept="image/*" required data-validation-required-message="Password is required">
                                                        <!-- <img src="../assets/admin/images/portrait/small/avatar.jpg" alt="Imagen de avatar" class="rounded float-left rounded-circle" style="border: 1px solid black;  border-radius:5px; width:150px; height:150px;"> ------
                                                    </div>
                                                </div>
                                            </div> -->
                                            <fieldset>
                                                <legend>Datos Esenciales</legend>  
                                                 <!--Primera Fila  -->
                                                <div class="row">
                                                    <div class="col-sm-3 form-group">
                                                        <h5>Identificación <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="number" name="cedula" class="form-control" title="Cedula" required data-validation-required-message="Ingresa el Numero de Cedula" autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <h5>Nombres <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="nombre" class="form-control" required data-validation-required-message="Ingresa el Nombre" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <h5>Apellido Paterno <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="apellidoPaterno" class="form-control" required data-validation-required-message="Ingresa tu Apellido Paterno" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <h5>Apellido Materno <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="apellidoMaterno" class="form-control" required data-validation-required-message="Ingresa tu Apellido Materno" >
                                                        </div>
                                                    </div>    
                                                </div>
                                                <!-- 2da Fila -->
                                                <div class="row ">
                                                    <div class="col-sm-3 form-group">
                                                        <h5>E-mail <span>*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control" required data-validation-required-message="Ingresa tu Correo">
                                                        </div>
                                                    </div>                                                
                                                    <div class="col-sm-3 form-group">
                                                        <h5>Telefono Celular <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="tel" name="telfmovil" class="form-control" required data-validation-required-message="Ingresa Telf Celular">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <h5>Telefono Fijo <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="tel" name="telfijo" class="form-control" required data-validation-required-message="Ingresa Telf Fijo">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <h5>Ciudad <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="ciudad" class="form-control" required data-validation-required-message="Digite la Ciudad">
                                                        </div>
                                                    </div>                                                    
                                                    <!-- 
                                                        pattern="[0-9]" -> para solo valores numericos
                                                        pattern="[A-za-z]+" -> para solo valores de texto


                                                     -->
                                                    <!-- TEXTAREA DE INF 
                                                        <div class="col form-group">
                                                        <h5>Info <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="info" class="form-control mb-1" required data-validation-required-message="Info is required" rows="10"></textarea>
                                                        </div>
                                                    </div> -->                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 form-group">
                                                        <h5>Departamento <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="departamento" class="form-control" required data-validation-required-message="Digite el Departamento">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <h5>Dirección</h5>
                                                        <div class="controls input-group">
                                                            <input type="number" name="calle" class="form-control col-sm-1" placeholder="Cll" >
                                                            <input type="number" name="calle" class="form-control col-sm-1" placeholder="Kra">
                                                            <input type="number" name="calle" class="form-control col-sm-1" placeholder="Casa">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- Botones -->
                                                <div class="text-center">
                                                    <button type="submit" name="btn_save" class="btn btn-secondary">Submit <i class="fas fa-check ml-1"></i></button>
                                                    <a href="customers.php" class="btn btn-danger">Cancel <i class="la la-close ml-1"></i></a>
                                                </div>
                                            </fieldset>  
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Input Validation end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <?php include 'footer.php'; ?>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#blah')
            .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
