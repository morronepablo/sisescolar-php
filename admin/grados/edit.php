<?php
global $gestiones, $niveles, $curso, $nivel_id, $paralelo;

$id_grado = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/grados/datos_grado.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');

?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h1>Modificación grado: <?=$curso;?></h1>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title">Llene los datos</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?=APP_URL;?>/app/controllers/grados/update.php" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nivel</label>
                                                <input type="text" name="id_grado" value="<?=$id_grado;?>" hidden>
                                                <select name="nivel_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($niveles as $nivele) {
                                                        ?>
                                                        <option value="<?=$nivele['id_nivel'];?>"<?=$nivel_id==$nivele['id_nivel'] ? 'selected' : ''?>><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
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
                                                    <option value="INICIAL - 1"<?=$curso=='INICIAL - 1' ? 'selected' : ''?>>INICIAL - 1</option>
                                                    <option value="INICIAL - 2"<?=$curso=='INICIAL - 2' ? 'selected' : ''?>>INICIAL - 2</option>
                                                    <option value="PRIMARIO - 1"<?=$curso=='PRIMARIO - 1' ? 'selected' : ''?>>PRIMARIO - 1</option>
                                                    <option value="PRIMARIO - 2"<?=$curso=='PRIMARIO - 2' ? 'selected' : ''?>>PRIMARIO - 2</option>
                                                    <option value="PRIMARIO - 3"<?=$curso=='PRIMARIO - 3' ? 'selected' : ''?>>PRIMARIO - 3</option>
                                                    <option value="PRIMARIO - 4"<?=$curso=='PRIMARIO - 4' ? 'selected' : ''?>>PRIMARIO - 4</option>
                                                    <option value="PRIMARIO - 5"<?=$curso=='PRIMARIO - 5' ? 'selected' : ''?>>PRIMARIO - 5</option>
                                                    <option value="PRIMARIO - 6"<?=$curso=='PRIMARIO - 6' ? 'selected' : ''?>>PRIMARIO - 6</option>
                                                    <option value="SECUNDARIO - 1"<?=$curso=='SECUNDARIO - 1' ? 'selected' : ''?>>SECUNDARIO - 1</option>
                                                    <option value="SECUNDARIO - 2"<?=$curso=='SECUNDARIO - 2' ? 'selected' : ''?>>SECUNDARIO - 2</option>
                                                    <option value="SECUNDARIO - 3"<?=$curso=='SECUNDARIO - 3' ? 'selected' : ''?>>SECUNDARIO - 3</option>
                                                    <option value="SECUNDARIO - 4"<?=$curso=='SECUNDARIO - 4' ? 'selected' : ''?>>SECUNDARIO - 4</option>
                                                    <option value="SECUNDARIO - 5"<?=$curso=='SECUNDARIO - 5' ? 'selected' : ''?>>SECUNDARIO - 5</option>
                                                    <option value="SECUNDARIO - 6"<?=$curso=='SECUNDARIO - 6' ? 'selected' : ''?>>SECUNDARIO - 6</option>
                                                    <option value="TERCIARIO - 1"<?=$curso=='TERCIARIO - 1' ? 'selected' : ''?>>TERCIARIO - 1</option>
                                                    <option value="TERCIARIO - 2"<?=$curso=='TERCIARIO - 2' ? 'selected' : ''?>>TERCIARIO - 2</option>
                                                    <option value="TERCIARIO - 3"<?=$curso=='TERCIARIO - 3' ? 'selected' : ''?>>TERCIARIO - 3</option>
                                                    <option value="TERCIARIO - 4"<?=$curso=='TERCIARIO - 4' ? 'selected' : ''?>>TERCIARIO - 4</option>
                                                    <option value="TERCIARIO - 5"<?=$curso=='TERCIARIO - 5' ? 'selected' : ''?>>TERCIARIO - 5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Paralelo</label>
                                                <select name="paralelo" id="" class="form-control">
                                                    <option value="A"<?=$paralelo=='A' ? 'selected' : ''?>>A</option>
                                                    <option value="B"<?=$paralelo=='B' ? 'selected' : ''?>>B</option>
                                                    <option value="C"<?=$paralelo=='C' ? 'selected' : ''?>>C</option>
                                                    <option value="D"<?=$paralelo=='D' ? 'selected' : ''?>>D</option>
                                                    <option value="D"<?=$paralelo=='E' ? 'selected' : ''?>>D</option>
                                                    <option value="F"<?=$paralelo=='F' ? 'selected' : ''?>>F</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-success">Actualizar</button>
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