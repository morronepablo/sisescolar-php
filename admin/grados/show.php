<?php
global $gestiones, $niveles, $curso, $paralelo, $nivel, $turno, $fyh_creacion, $estado;

$id_grado = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/grados/datos_grado.php');

?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h1>Grado: <?=$curso." - ".$paralelo;?></h1>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Llene los datos</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nivel</label>
                                                    <p><?=$nivel;?> - <?=$turno;?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Curso</label>
                                                    <p><?=$curso;?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Paralelo</label>
                                                    <p><?=$paralelo;?></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Fecha y Hora Creación</label>
                                                    <p><?=$fyh_creacion;?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Estado</label>
                                                    <p>
                                                        <?php
                                                        if($estado == '1') echo "ACTIVO";
                                                        else echo "INACTIVO";
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?=APP_URL;?>/admin/grados" class="btn btn-outline-secondary">Volver</a>
                                        </div>
                                    </div>
                                </div>
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