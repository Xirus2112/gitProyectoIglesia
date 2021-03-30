<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');
include('header.php');

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT dp.id,dp.nombre,dp.apellidoPaterno,dp.apellidoMaterno,dp.email,dp.role,dp.telefonoMovil,dp.telefonoFijo,dp.calle,dp.carrera,dp.casaNumero,de.departamento AS departamento,mu.municipio AS municipio,dp.codPostal,tp.nombre AS tipoPersona,cs.nombre AS clasificacionSocial,ec.nombre AS estadoCivil,ge.nombre AS genero,dp.fechaNacimiento,ep.nombre AS estado,dp.lugarNacimiento,dp.nacionalidad,dp.documentoIdentidad,dp.miembroDesde,dp.fechaConversionCristiana,dp.nombreIglesiaConversion,dp.bautizado,dp.iglesiaAnterior,dp.profesionTrabajo,dp.lugarTrabajo,dp.direccionTrabajo,dp.telefonoTrabajo,dp.avator
    FROM administradoriglesia.datospersonas dp 
	INNER JOIN administradoriglesia.departamentos de ON dp.idDepartamento=de.id_departamento
	INNER JOIN administradoriglesia.estadocivil ec ON dp.IdEstadoCivil=ec.idEstadoCivil
	INNER JOIN administradoriglesia.estadopersona ep ON dp.idEstadoPersona=ep.idEstado
	INNER JOIN administradoriglesia.genero ge ON dp.IdGenero=ge.idGenero
	INNER JOIN administradoriglesia.municipios mu ON dp.idMunicipio=mu.id_municipio
	INNER JOIN administradoriglesia.tipopersona tp ON dp.idTipoPersona=tp.idTipoPersona
	INNER JOIN administradoriglesia.clasificacionsocial cs ON dp.IdClasificacionSocial=cs.idClasificacion WHERE delete_status=0");
$stmt->execute();
$result = $stmt->fetchAll(); 
//print_r ($result['name']) ;
?>
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Manage</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Medicinals</a>
                                </li>
                                <li class="breadcrumb-item active">Manage
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="content-body">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                         <div class="col align-self-start">
                                            <h4 class="card-title"><a href="addcustomer.php" class="btn btn-info btn-sm">Añadir Persona<i class="fas fa-user-plus ml-1"></i></a></h4>
                                        </div>
                                        <div class="col align-self-end">
                                            <div class="btn-group" role="group" arial-label="Grupo de botones">
                                                <button type="button" class="btn btn-outline-info btn-sm">Boton 1</button>
                                                <button type="button" class="btn btn-outline-info btn-sm">Boton 2 </button>
                                                <button type="button" class="btn btn-outline-info btn-sm">Boton 3 </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <div class="content">
                <div class="card col-sm-3" >
                           
                        <div class="card-header mt-1"  style="background:#f8f8f9;">
                        <?php foreach ($result as $filas){ 
                            $nombreApe= $filas['nombre'] . " " . $filas['apellidoPaterno'] . " " . $filas['apellidoMaterno'];
                            $avatar=$filas['avator']; 
                            $whatsapp =  $filas['telefonoMovil']
                            ?> 
                                <?php
                                if ($avatar == null) { ?>
                                <img src="../assets/admin/images/portrait/small/avatar.jpg" alt="avatar"  class="rounded-circle mx-auto d-block img-fluid" width="200" height="200">

                                <?php }else{
                                    print ' <img  id="blah" class="rounded-circle mx-auto d-block img-fluid"  src="../assets/uploads/avatar/'.$avatar.'" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  width="200" height="200">'; }
                                ?>
                            <div>
                                <span class="badge badge-pill badge-info">
                                    <?php echo $filas['tipoPersona'];?>
                                </span>
                                <span class="badge badge-pill badge-success">
                                    <?php echo $filas['estado'];?>
                                </span>
                            </div>    
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-title"><strong><?php echo $nombreApe;?></strong></a><br>
                            <small><i class="fas fa-map-marker-alt">&nbsp;</i><?php echo $filas['calle'];?>,Num: <?php echo $filas['carrera'];?>,<br>
                            <small><?php echo $filas['departamento'];?>, <?php echo $filas['municipio'];?></small><br>
                            <small><i class="far fa-envelope">&nbsp;</i><?php echo $filas['email'];?></small><br>
                            <small><a href="https://api.whatsapp.com/send?phone=&text=Hola, quisiera conversar contigo &#128513;" target="_blank"><i class="fab fa-whatsapp">&nbsp;</i><?php echo $whatsapp;?></a></small><br>
                            <button type="button" class="btn btn-outline-info btn-sm"><i class="far fa-address-card mr-1"></i>Credenciales</button>
                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-user-minus mr-1"></i>Eliminar</button>
                            
                        </div>
                    <?php } ;?>
                    </div> 
                </div>
            </div>
        </div>
    </div>

<!-- END: Content-->
 
<?php include 'footer.php'; ?>
<script>
    $(document).ready(function(){

    $('.cancel-button').on('click',function(){        
        swal({
            title: "¿Estas seguro?",
            text: "¡de eliminar el registro!",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: false,
                },
                confirm: {
                    text: "Delete",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false
                }
            }
        })
        .then((isConfirm) => {
            if (isConfirm) {
                var id=this.id;
            $.ajax({
              url: "app/customers.php?id="+id,
              type: "GET",
              success: function(inputValue){
                swal("Eliminado!", "Tu registro ha sido elimando.", "success");
                setTimeout(function(){// wait for 5 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 2000); 
                }
            });
                
            } else {
                swal("Cancelado.", "Tu registro esta seguro!", "error");
            }
        });

    });   

});
</script>
