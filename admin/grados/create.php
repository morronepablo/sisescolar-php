<?php
global $gestiones, $niveles;
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/niveles/listado_de_niveles.php');

?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h1>Registro de nuevo grado</h1>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Llene los datos</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?=APP_URL;?>/app/controllers/grados/create.php" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nivel</label>
                                                <select name="nivel_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($niveles as $nivele) {
                                                            ?>
                                                            <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
                                                            <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Curso</label>
                                                <select name="curso" id="" class="form-control">
                                                    <option value="INICIAL - 1">INICIAL - 1</option>
                                                    <option value="INICIAL - 2">INICIAL - 2</option>
                                                    <option value="PRIMARIO - 1">PRIMARIO - 1</option>
                                                    <option value="PRIMARIO - 2">PRIMARIO - 2</option>
                                                    <option value="PRIMARIO - 3">PRIMARIO - 3</option>
                                                    <option value="PRIMARIO - 4">PRIMARIO - 4</option>
                                                    <option value="PRIMARIO - 5">PRIMARIO - 5</option>
                                                    <option value="PRIMARIO - 6">PRIMARIO - 6</option>
                                                    <option value="SECUNDARIO - 1">SECUNDARIO - 1</option>
                                                    <option value="SECUNDARIO - 2">SECUNDARIO - 2</option>
                                                    <option value="SECUNDARIO - 3">SECUNDARIO - 3</option>
                                                    <option value="SECUNDARIO - 4">SECUNDARIO - 4</option>
                                                    <option value="SECUNDARIO - 5">SECUNDARIO - 5</option>
                                                    <option value="SECUNDARIO - 6">SECUNDARIO - 6</option>
                                                    <option value="TERCIARIO - 1">TERCIARIO - 1</option>
                                                    <option value="TERCIARIO - 2">TERCIARIO - 2</option>
                                                    <option value="TERCIARIO - 3">TERCIARIO - 3</option>
                                                    <option value="TERCIARIO - 4">TERCIARIO - 4</option>
                                                    <option value="TERCIARIO - 5">TERCIARIO - 5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Paralelo</label>
                                                <select name="paralelo" id="" class="form-control">
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="D">D</option>
                                                    <option value="F">F</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-primary">Registrar</button>
                                                <a href="<?=APP_URL;?>/admin/grados" class="btn btn-outline-secondary">Cancelar</a>
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