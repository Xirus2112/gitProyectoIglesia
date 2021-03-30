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
            <div class="content-header row mb-1">
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
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">                                    
                                    <h4 class="card-title"><a href="addcustomer.php" class="btn btn-primary "><i class="la la-plus"></i>Añadir Cliente</a></h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">                                        
                                        <?php require_once('../assets/constants/check-reply.php') ;?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                <thead>
                                                    <tr>
                                                        <th>Foto</th>
                                                        <th>Nombre</th>
                                                        <th>Correo</th>
                                                        <th>Tfno Móvil</th>
                                                        <th>Tfno Fijo</th>
                                                        <th>Dirección</th>
                                                        <th>Ciudad</th>
                                                        <th>Cargo</th>
                                                        <th>Estado</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i=1;
                                                    foreach ($result as $value) { 
                                                        $nombreApe= $value['nombre'] . " " . $value['apellidoPaterno'] . " " . $value['apellidoMaterno'];
                                                        $direccion= "Calle " . $value['calle'] . " #" . $value['carrera'] . " - " . $value['casaNumero'];
                                                        ?>
                                                    
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$nombreApe?></td>
                                                        <td><?=$value['email']?></td>
                                                        <td><?=$value['telefonoMovil']?></td>
                                                        <td><?=$value['telefonoFijo']?></td>
                                                        <td><?=$direccion?></td>
                                                        <td><?=$value['municipio']?></td>
                                                        <td><?=$value['tipoPersona']?></td>
                                                        <td><?=$value['estado']?></td>
                                                        <td>
                                                            <a title="Edit" href="editcustomer.php?id=<?=$value['id']?>" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-edit"></i></a>
                                                            <button type="button" class="btn btn-icon btn-danger mr-1 mb-1 cancel-button" id="<?=$value['id']?>"><i class="la la-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php $i++; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- DOM - jQuery events table -->
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
