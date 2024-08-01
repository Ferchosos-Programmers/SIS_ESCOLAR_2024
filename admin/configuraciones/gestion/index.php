<?php
include('../../../app/config.php');
include('../../../admin/layout/header.php');
include('../../../app/controllers/configuraciones/gestiones/listado_gestiones.php');
?>

<style>
    .content-wrapper {
        font-family: algeria;
    }
</style>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1 style="font-family: Algeria;">Listado de Año Lectivo</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Años Lectivos Registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Crear Nuevo Año Lectivo</a>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-sm table-striped table-hover table-bordered">
                                <thead>
                                    <tr style="text-align: center">
                                        <th><b>#</b></th>
                                        <th><b>Nombre del Año Lectivo</b></th>
                                        <th><b>Fecha de Creacion</b></th>
                                        <th><b>Estado</b></th>
                                        <th><b>Acciones</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_gestiones = 0;
                                    foreach ($gestiones as $gestion) {
                                        $id_gestion = $gestion['id_gestion'];
                                        $contador_gestiones++;
                                    ?>
                                        <tr style="text-align: center">
                                            <td><?= $contador_gestiones ?></td>
                                            <td><?= $gestion['anio_lectivo'] ?></td>
                                            <td><?= $gestion['fyh_creacion'] ?></td>
                                            <td>
                                                <?php if ($gestion['estado'] == 1) : ?>
                                                    <button class="btn btn-success btn-sm">Activo</button>
                                                <?php else : ?>
                                                    <button class="btn btn-danger btn-sm">Inactivo</button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="show.php?id=<?= $id_gestion ?>" class="btn btn-sm btn-primary mx-1" title="Ver">
                                                        <i class="bi bi-eye" style="color: #fff"></i>
                                                    </a>
                                                    <a href="edit.php?id=<?= $id_gestion ?>" class="btn btn-sm btn-success mx-1" title="Editar">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <!-- <form action="<?= APP_URL ?>/app/controllers/configuraciones/instituciones/delete.php" method="POST" style="display: inline;" onclick="preguntar<?= $id_gestion ?>(event)" id="miFormulario<?= $id_gestion; ?>">
                                                        <input type="hidden" name="id_gestion" value="<?= $id_gestion ?>">
                                                        <button type="button" class="btn btn-sm btn-danger mx-1" title="Eliminar">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form> -->
                                                </div>
                                                <script>
                                                    function preguntar<?= $id_config_institucion ?>(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: "<span style='font-family: Algeria;'>¿Está seguro?</span>",
                                                            html: "<span style='font-family: Algeria;'>¿Desea eliminar este registro?</span>",
                                                            icon: "question",
                                                            showCancelButton: true,
                                                            confirmButtonText: "<span style='font-family: Algeria;'>Eliminar</span>",
                                                            confirmButtonColor: "#3085d6",
                                                            cancelButtonColor: "#d33",
                                                            cancelButtonText: "<span style='font-family: Algeria;'>Cancelar</span>",
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#miFormulario<?= $id_config_institucion; ?>');
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script>
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
        </div>
    </div>
</div>

<?php
include('../../../admin/layout/footer.php');
include('../../../layout/mensajes.php');
?>

<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Años Lectivos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Años Lectivos",
                "infoFiltered": "(Filtrado de _MAX_ total Años Lectivos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Años Lectivos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                extend: 'collection',
                text: 'Reportes',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy'
                }, {
                    extend: 'pdf'
                }, {
                    extend: 'csv'
                }, {
                    extend: 'excel'
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }]
            }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>