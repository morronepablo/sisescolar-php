<?php

global $nombre_rol;
$id_rol = $_GET['id'];

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/roles/datos_del_rol.php');
?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h1>Editar el rol: <?=$nombre_rol;?></h1>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title">Datos registrados</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?=APP_URL;?>/app/controllers/roles/update.php" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nombre del rol</label>
                                                <input type="hidden" name="id_rol" value="<?=$id_rol;?>">
                                                <input type="text" class="form-control" name="nombre_rol" value="<?=$nombre_rol;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-success">Actualizar</button>
                                                <a href="<?=APP_URL;?>/admin/roles" class="btn btn-outline-secondary">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');
?>