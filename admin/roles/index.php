<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/roles/listado_roles.php');
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
                <h1 style="font-family: Algeria;">Listado de Roles</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Roles Registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Crear Nuevo Rol</a>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-sm table-striped table-hover table-bordered">
                                <thead>
                                    <tr style="text-align: center">
                                        <th><b>#</b></th>
                                        <th><b>Nombre del Rol</b></th>
                                        <th><b>Acciones</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_rol = 0;
                                    foreach ($roles as $rol) {
                                        $id_rol = $rol['id_rol'];
                                        $contador_rol++;
                                    ?>
                                        <tr style="text-align: center">
                                            <td><?= $contador_rol ?></td>
                                            <td><?= $rol['nombre_rol'] ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="show.php?id=<?= $id_rol ?>" class="btn btn-sm btn-primary mx-1" title="Ver">
                                                        <i class="bi bi-eye" style="color: #fff"></i>
                                                    </a>
                                                    <a href="edit.php?id=<?= $id_rol ?>" class="btn btn-sm btn-success mx-1" title="Editar">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="<?= APP_URL ?>/app/controllers/roles/delete.php" method="POST" style="display: inline;" onclick="preguntar<?= $id_rol ?>(event)" id="miFormulario<?= $id_rol; ?>">
                                                        <input type="hidden" name="id_rol" value="<?= $id_rol ?>">
                                                        <button type="button" class="btn btn-sm btn-danger mx-1" title="Eliminar">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <script>
                                                    function preguntar<?= $id_rol ?>(event) {
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
                                                                var form = $('#miFormulario<?= $id_rol; ?>');
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
include('../../admin/layout/footer.php');
include('../../layout/mensajes.php');
?>

<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Roles)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Roles",
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