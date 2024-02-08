<?php
global $gestion, $estado;
$id_gestion = $_GET['id'];

include ('../../../app/config.php');
include ('../../../admin/layout/parte1.php');
include ('../../../app/controllers/configuraciones/gestion/datos_gestion.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Modificación de: <?=$gestion?></h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/configuraciones/gestion/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Gestión educativa</label>
                                            <input type="text" name="id_gestion" value="<?=$id_gestion;?>" hidden>
                                            <input type="text" name="gestion" value="<?=$gestion;?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <select name="estado" id="" class="form-control">
                                                <?php
                                                    if($estado == '1') {
                                                ?>
                                                        <option value="1" selected="selected">ACTIVO</option>
                                                        <option value="0">INACTIVO</option>
                                                <?php
                                                    }else{
                                                ?>
                                                <option value="1">ACTIVO</option>
                                                <option value="0" selected="selected">INACTIVO</option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/configuraciones/gestion" class="btn btn-outline-secondary">Cancelar</a>
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

include ('../../../admin/layout/parte2.php');
include ('../../../layout/mensajes.php');
?>
