<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['btn_save']))
{	//,idClasificacionSocial,idEstadoPersona,idGenero
	$stmt = $conn->prepare("INSERT INTO datospersonas( 	dctoidentidad,
														nombre,
														apePaterno,
														apeMaterno,
														fNacimiento,
														correo,
														telfMovil,
														telfFijo,
														ciudad,
														departamento,
														calle,
														carrera,
														casa,
														barrio,
														idTipoPersona,
														idClasificacionSocial,
														idEstadoPersona,
														idGenero,
														idEstatusMembresia,
														delete_status) 
							VALUES 
													 (:dctoidentidad,
													 :nombre,
													 :apePaterno,
													 :apeMaterno,
													 :fNacimiento,
													 :correo,
													 :telfMovil,
													 :telfFijo,
													 :ciudad,
													 :departamento,
													 :calle,
													 :carrera,
													 :casa,
													 :barrio,
													 :idTipoPersona,
													 :idClasificacionSocial,
													 :idEstadoPersona,
													 :idGenero,
													 1,
													 0)");//,,:idEstadoPersona,:idGenero
	$stmt->bindParam(':dctoidentidad', $_POST['dctoidentidad']);
	$stmt->bindParam(':nombre', $_POST['nombre']);
	$stmt->bindParam(':apePaterno', $_POST['apePaterno']);
	$stmt->bindParam(':apeMaterno', $_POST['apeMaterno']);
	$stmt->bindParam(':fNacimiento', $_POST['fNacimiento']);
	$stmt->bindParam(':correo', $_POST['correo']);
	$stmt->bindParam(':telfMovil', $_POST['telfMovil']);
	$stmt->bindParam(':telfFijo', $_POST['telfFijo']);
	$stmt->bindParam(':ciudad', $_POST['ciudad']);
	$stmt->bindParam(':departamento', $_POST['departamento']);
	$stmt->bindParam(':calle', $_POST['calle']);
	$stmt->bindParam(':carrera', $_POST['carrera']);
	$stmt->bindParam(':casa', $_POST['casa']);
	$stmt->bindParam(':barrio', $_POST['barrio']);
	$stmt->bindParam(':idTipoPersona', $_POST['idTipoPersona']);
	$stmt->bindParam(':idClasificacionSocial', $_POST['idClasificacionSocial']);
	$stmt->bindParam(':idEstadoPersona', $_POST['idEstadoPersona']);
	$stmt->bindParam(':idGenero', $_POST['idGenero']);

	// $stmt->bindParam(':short_name', $_POST['short_name']);
	// $stmt->bindParam(':added_date', date('Y-m-d'));	
	$stmt->execute();
	$_SESSION['reply'] = "003";
	header("location:../customers.php");
}
if(isset($_POST['btn_edit']))
{
	$stmt = $conn->prepare("UPDATE medicine_category SET name=:name,short_name=:short_name WHERE id=:id");
	$stmt->bindParam(':name', $_POST['name']);
	$stmt->bindParam(':short_name', $_POST['short_name']);
	$stmt->bindParam(':id', $_POST['id']);
	$stmt->execute();
	$_SESSION['reply'] = "004";
	header("location:../categories.php");
}
if(isset($_GET['id']))
{
	$stmt = $conn->prepare("DELETE FROM datospersonas WHERE id = :id");
	//$stmt = $conn->prepare("UPDATE medicine_category SET delete_status=1 WHERE id=:id");
	$stmt->bindParam(':id', $_GET['id']);
	$stmt->execute();
}


					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{

header("location:../");

}

?>