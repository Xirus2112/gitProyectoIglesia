<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');
include('header.php');

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT  dp.id,dp.nombre,dp.apePaterno,dp.apeMaterno,dp.correo,dp.telfMovil,dp.telfFijo,dp.calle,dp.carrera,dp.casa,dp.departamento AS departamento,dp.ciudad AS municipio,dp.barrio,tp.description AS tipopersona,
                                cs.description AS clasificacionSocial,ec.description AS estadoCivil,ge.description AS genero,dp.fNacimiento,ep.id AS estado,dp.documentoIdentidad,dp.fingresoiglesia,dp.fConversion,dp.nombreIglesiaConversion,dp.esbautizado,
                                dp.nombreiglesiaAnterior,dp.profesion,dp.direccionTrabajo,dp.direccionTrabajo,dp.telfTrabajo,dp.avatar,ep.description
                        FROM administradoriglesia.datospersonas dp 
                            INNER JOIN administradoriglesia.estadocivil ec ON dp.IdEstadoCivil=ec.id
                            INNER JOIN administradoriglesia.estatusmembresia ep ON dp.idEstatusmembresia=ep.id
                            INNER JOIN administradoriglesia.genero ge ON dp.IdGenero=ge.id
                            INNER JOIN administradoriglesia.tipopersona tp ON dp.idTipoPersona=tp.id
                            INNER JOIN administradoriglesia.clasificacionsocial cs ON dp.IdClasificacionSocial=cs.id
                        WHERE delete_status=0");
$stmt->execute();
$result = $stmt->fetchAll(); 
//print_r ($result['name']) ;
?>
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Personas</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="customers.php">Personas</a>
                                <!-- </li>
                                <li class="breadcrumb-item active">Manage
                                </li> -->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row ">
                    <div class="card col-sm-12">
                        <div class="card-header">
                            <a href="addcustomer.php" class="btn btn-info btn-sm">Añadir Cliente <i class="fas fa-user-plus"></i></a>
                            <div class="btn-group pull-right">
                                <a href="index.php" ><button type="button" class="btn btn-info btn-sm "><i class="fas fa-user-cog"></i> Administrar Usuario</button></a>
                                <button type="button" class="btn btn-info btn-sm"><i class="fas fa-chart-line"></i> Reportes</button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">Exportar</button>
                                    <div class="dropdown-menu">
                                        <a href="pdf.php" target="_blank" class="dropdown-item"><i class="fas fa-file-pdf "></i> PDF</a>
                                        <a href="excel.php" target="_blank" class="dropdown-item"><i class="far fa-file-excel"></i> Excel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <!-- <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="addcustomer.php" class="btn btn-danger "><i class="la la-plus"></i>Añadir Cliente</a>
                                
                                    

                                    <a href="excel.php" target="_blank" class="btn btn-danger"><i class="far fa-file-excel"></i> Excel</a>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">                                    
                                    
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div
                                </div>> -->
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">                                        
                                        <?php require_once('../assets/constants/check-reply.php') ;?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="example"><!--dom-jQuery-events-->
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
                                                        $avatar=$value['avatar']; 
                                                        $nombreApe= $value['nombre'] . " " . $value['apePaterno'] . " " . $value['apeMaterno'];
                                                        $direccion= "Calle " . $value['calle'] . " #" . $value['carrera'] . " - " . $value['casa'];
                                                        $idEstado = $value['estado'];
                                                        //$estado= $value['estado'];
                                                        ?>
                                                        
                                                    <tr>
                                                        <td><?php
                                                            if ($avatar == null) { ?>
                                                                <img src="../assets/admin/images/portrait/small/avatar.jpg" alt="avatar"  class="rounded-circle mx-auto d-block img-fluid" width="175" height="175">
                                                            <?php }else{
                                                                print ' <img  id="blah" class="rounded-circle mx-auto d-block img-fluid"  src="../assets/uploads/avatar/'.$avatar.'" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" width="175" height="175">'; }
                                                            ?></td>
                                                        <td><?=$nombreApe?></td>
                                                        <td><?=$value['correo']?></td>
                                                        <td><?=$value['telfMovil']?></td>
                                                        <td><?=$value['telfFijo']?></td>
                                                        <td><?=$direccion?></td>
                                                        <td><?=$value['departamento']?></td>
                                                        <td><?=$value['profesion']?></td>
                                                        <td><?php if ($idEstado < '2'):?>
                                                                <span class="badge bg-success">Activo</span>
                                                            <?php elseif ($idEstado == '2'):?>
                                                                <span class="badge bg-danger">Inactivo</span>
                                                            <?php else :?>
                                                                <span class="badge bg-warning">En Observación</span>
                                                            <?php endif;?>
                                                        </td>
                                                        <td>
                                                            <a title="Editar" href="editcustomer.php?id=<?=$value['id']?>" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-edit"></i></a>
                                                            <button type="button" class="btn btn-icon btn-danger mr-1 mb-1 cancel-button" id="<?=$value['id']?>" title="Eliminar"><i class="la la-trash"></i></button>
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
    
        $('#example').DataTable({
            responsive: true,
            language:{
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "1": "Mostrar 1 fila",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "notBetween": "No entre",
                "notEmpty": "No Vacio",
                "not": "Diferente de"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "notBetween": "No entre",
                "notEmpty": "No vacío",
                "not": "Diferente de"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con",
                "not": "Diferente de"
            },
            "array": {
                "not": "Diferente de",
                "equals": "Igual",
                "empty": "Vacío",
                "contains": "Contiene",
                "notEmpty": "No Vacío",
                "without": "Sin"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d"
    },
    "select": {
        "1": "%d fila seleccionada",
        "_": "%d filas seleccionadas",
        "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        }
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "am",
            "pm"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
    },
    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
}
        });
    
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
