<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');
include('header.php');

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM groups WHERE name != 'admin'");
$stmt->execute();
$result = $stmt->fetchAll(); 

?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row mb-1">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Add User</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Add User
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
                                    <form class="form-horizontal" action="app/users.php" method="post"
                                        enctype="multipart/form-data" novalidate>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <h5>Correo <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control mb-1"
                                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required
                                                            data-validation-required-message="Email is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <h5>Rol a agregar <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <select class="form-group" name="group_id">
                                                            <?php foreach ($result as $value) { ?>
                                                            <option value="<?=$value['id']?>"><?=$value['name']?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <h5>Constraseña <span class="required">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="password" class="form-control mb-1"
                                                            minlength="5" maxlength="15" required
                                                            data-validation-required-message="Password is required">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" name="btn_save" class="btn btn-success">Guardar
                                                        <i class="la la-thumbs-o-up position-right"></i></button>
                                                    <a href="users.php" class="btn btn-danger">Cancelar <i
                                                            class="la la-close position-right"></i></a>
                                                </div>
                                            </div>
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