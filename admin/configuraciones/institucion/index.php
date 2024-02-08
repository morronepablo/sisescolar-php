<?php
global $instituciones;
include ('../../../app/config.php');
include ('../../../admin/layout/parte1.php');

include ('../../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Listado de instituciones</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Instituciones registradas</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-outline-primary btn-sm"><i class="bi bi-plus-square"></i> Crear nueva institución</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro.</center></th>
                                    <th><center>Nombres de la institución</center></th>
                                    <th><center>Logo</center></th>
                                    <th><center>Dirección</center></th>
                                    <th><center>Teléfono</center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Correo electrónico</center></th>
                                    <th><center>Fecha de creación</center></th>
                                    <th><center>Estado</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_institucion = 0;
                                foreach ($instituciones as $institucion) {
                                    $id_config_institucion = $institucion['id_config_institucion'];
                                    $contador_institucion = $contador_institucion + 1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_institucion;?></td>
                                        <td><?=$institucion['nombre_institucion']?></td>
                                        <td>
                                            <?php
                                                if($institucion['logo'] != '') {
                                            ?>
                                                    <img src="<?=APP_URL."/public/images/configuracion/".$institucion['logo']?>" class="thumb thumbnail" width="50px">
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?=$institucion['direccion']?></td>
                                        <td><?=$institucion['telefono']?></td>
                                        <td><?=$institucion['celular']?></td>
                                        <td><?=$institucion['correo']?></td>
                                        <td><?=$institucion['fyh_creacion']?></td>
                                        <td>
                                            <center>
                                                <?php
                                                if($institucion['estado'] == '1') echo "Activo"; else echo "Inactivo";
                                                ?>
                                            </center>
                                        </td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id=<?=$id_config_institucion;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="edit.php?id=<?=$id_config_institucion;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                <form action="<?=APP_URL;?>/app/controllers/configuraciones/institucion/delete.php" onclick="preguntar<?=$id_config_institucion;?>(event)" method="post" id="miFormulario<?=$id_config_institucion;?>">
                                                    <input type="text" name="id_config_institucion" value="<?=$id_config_institucion;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<?=$id_config_institucion;?>(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: "Está usted seguro?",
                                                            text: "¿Desea eliminar este registro?",
                                                            icon: "question",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#a5161d",
                                                            cancelButtonColor: "#270a0a",
                                                            confirmButtonText: "Si, eliminar!",
                                                            cancelButtonText: "Cancelar"
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#miFormulario<?=$id_config_institucion;?>');
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
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

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 4,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Instituciones",
                "infoEmpty": "Mostrando 0 a 0 de 0 Instituciones",
                "infoFiltered": "(Filtrado de _MAX_ total Instituciones)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Instituciones",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": false, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                }, {
                    extend: 'csv'
                }, {
                    extend: 'excel'
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
