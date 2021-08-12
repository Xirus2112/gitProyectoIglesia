<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');
include('header.php');
?>
<?php 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
$stmt = $conn->prepare("SELECT * FROM datospersonas WHERE id='".$_GET['id']."'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// $stmt = $conn->prepare("SELECT * FROM groups WHERE name != 'admin'");
// $stmt->execute();
// $groups = $stmt->fetchAll();

?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Editar Miembros</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a>
                                </li>
                                <li class="breadcrumb-item active">Editar Miembros
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
                                    <form class="form-horizontal" action="app/customers.php" method="post"
                                        enctype="multipart/form-data" novalidate>

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
                                                        <input type="number" name="dctoidentidad" class="form-control"
                                                            title="Cedula" required
                                                            data-validation-required-message="Ingresa el Numero de Cedula"
                                                            placeholder="Digite la Identificación" autofocus value="<?=$result['dctoIdentidad']?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <h5>Nombres <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="nombre" class="form-control" required
                                                            data-validation-required-message="Ingresa el Nombre"
                                                            placeholder="Digite los Nombres" value="<?=$result['nombre']?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <h5>Apellido Paterno <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="apePaterno" class="form-control"
                                                            required
                                                            data-validation-required-message="Ingresa tu Apellido Paterno"
                                                            placeholder="Digite el Apellido Paterno" value="<?=$result['apePaterno']?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <h5>Apellido Materno <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="apeMaterno" class="form-control"
                                                            required
                                                            data-validation-required-message="Ingresa tu Apellido Materno"
                                                            placeholder="Digite el Apellido Materno" value="<?=$result['apeMaterno']?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-sm-3 form-group">
                                                    <h5>Fecha Nacimiento <span>*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="fnacimiento" class="form-control"
                                                            required
                                                            data-validation-required-message="Ingresa tu Fecha de Nacimiento" value="<?=$result['fNacimiento']?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <h5>Correo<span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="correo" class="form-control" required
                                                            data-validation-required-message="Ingresa el correo"
                                                            placeholder="Digite el Correo" value="<?=$result['correo']?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <h5>Telefono Celular <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" name="telfMovil" class="form-control"
                                                            required
                                                            data-validation-required-message="Ingresa Telf Celular"
                                                            placeholder="Digite el Télefono Celular" value="<?=$result['telfMovil']?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <h5>Telefono Fijo <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" name="telfFijo" class="form-control"
                                                            required
                                                            data-validation-required-message="Ingresa Telf Fijo"
                                                            placeholder="Digite el Télefono Fijo" value="<?=$result['telfFijo']?>">
                                                    </div>
                                                </div>

                                                <!-- 
                                                        pattern="[0-9]" -> para solo valores numericos
                                                        pattern="[A-za-z]+" -> para solo valores de texto
                                                    TEXTAREA DE INF 
                                                        <div class="col form-group">
                                                        <h5>Info <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="info" class="form-control mb-1" required data-validation-required-message="Info is required" rows="10"></textarea>
                                                        </div>
                                                    </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <h5>Ciudad <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="ciudad" class="form-control" required
                                                            data-validation-required-message="Digite la Ciudad"
                                                            placeholder="Digite la Ciudad" value="<?=$result['ciudad']?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <h5>Departamento <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="departamento" class="form-control"
                                                            required
                                                            data-validation-required-message="Digite el Departamento"
                                                            placeholder="Digite el Departamento" value="<?=$result['departamento']?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <h5>Dirección</h5>
                                                    <div class="controls input-group">
                                                        <input type="text" name="calle" class="form-control "
                                                            placeholder="Calle" value="<?=$result['calle']?>">
                                                        <input type="text" name="carrera" class="form-control "
                                                            placeholder="Carrera" value="<?=$result['carrera']?>">
                                                        <input type="text" name="casa" class="form-control "
                                                            placeholder="Casa" value="<?=$result['casa']?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <h5>Barrio <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="barrio" class="form-control" required
                                                            data-validation-required-message="Digite el barrio"
                                                            placeholder="Digite el Barrio" value="<?=$result['barrio']?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <!-- TIPO PERSONA-->
                                                    <h5>Tipo Persona<span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <select name="idTipoPersona" class="form-group">
                                                            <option>Tipo de Persona P</option>
                                                            <?php 
                                                                    // TODO Tabla TipoPersona
                                                                    $tiporPersonaSql= $conn->prepare("");
                                                                    $tiporPersonaSql->execute();
                                                                    $resultTiporPersona= $tiporPersonaSql->fetchAll();
                                                                        foreach ($resultTiporPersona as $tiporPersona) { ?>
                                                            <option value="<?=$tiporPersona['id']?>"><?=$tiporPersona['description']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <!-- CLASIFICACION SOCIAL-->
                                                    <h5>Clasificación Social <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <select name="idClasificacionSocial" class="form-group">
                                                            <!-- <option>Clasificación Social</option> -->
                                                            <?php 
                                                                    // TODO Tabla ClasificacionSocial
                                                                    $clasificacionSql= $conn->prepare("");
                                                                    $clasificacionSql->execute();
                                                                    $resultClasificacion= $clasificacionSql->fetchAll();
                                                                        foreach ($resultClasificacion as $clasificacion) { ?>
                                                            <option value="<?=$clasificacion['id']?>">
                                                                <?=$clasificacion['description']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <!-- ESTADO PERSONA-->
                                                    <h5>Estado Persona <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <select name="idEstadoPersona" class="form-group">
                                                            <!-- <option>Estado de la Persona</option> -->
                                                            <?php 
                                                                    // TODO Tabla EstadoPersona
                                                                    $estadorPersonaSql= $conn->prepare("");
                                                                    $estadorPersonaSql->execute();
                                                                    $resultEstadorPersona= $estadorPersonaSql->fetchAll();
                                                                        foreach ($resultEstadorPersona as $estadoPersona) { ?>
                                                            <option value="<?=$estadoPersona['id']?>">
                                                                <?=$estadoPersona['descripcion']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <!-- GENERO -->
                                                    <div class="form-group">
                                                        <h5>Genero <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <select name="idGenero" class="form-group">
                                                                <!-- <option>Género</option> -->
                                                                <?php 
                                                                    // TODO Tabla Genero
                                                                    $generoSql= $conn->prepare("SELECT * FROM genero");
                                                                    $generoSql->execute();
                                                                    $resultGenero= $generoSql->fetchAll();
                                                                        foreach ($resultGenero as $genero) { ?>
                                                                <option value="<?=$genero['id']?>"><?=$genero['description']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Botones -->
                                        <div class="text-center ">
                                            <button type="submit" name="btn_save" class="btn btn-success">Guardar<i
                                                    class="fas fa-check ml-1"></i></button>
                                            <a href="customers.php" class="btn btn-danger">Cancel <i
                                                    class="la la-close ml-1"></i></a>
                                        </div>
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
