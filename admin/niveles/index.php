<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/niveles/listado_niveles.php');
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
                <h1 style="font-family: Algeria;">Listado de Niveles</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Niveles Registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Crear Nuevo Nivel </a>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-sm table-striped table-hover table-bordered">
                                <thead>
                                    <tr style="text-align: center">
                                        <th><b>#</b></th>
                                        <th><b>Año Lectivo</b></th>
                                        <th><b>Nivel</b></th>
                                        <th><b>Jornada</b></th>
                                        <th><b>Estado</b></th>
                                        <th><b>Acciones</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_niveles = 0;
                                    foreach ($niveles as $nivel) {
                                        $id_nivel = $nivel['id_nivel'];
                                        $contador_niveles++;
                                    ?>
                                        <tr style="text-align: center">
                                            <td><?= $contador_niveles ?></td>
                                            <td><?= $nivel['anio_lectivo'] ?></td>
                                            <td>
                                                <?php
                                                $gradeNames = [
                                                    1 => 'Inicial',
                                                    2 => 'Basica',
                                                    3 => 'Bachillerato',
                                                ];
                                                echo $gradeNames[$nivel['nivel']] ?? 'No existe';
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $gradeNamesJornadas = [
                                                    1 => 'Matutina',
                                                    2 => 'Vespertina',
                                                    3 => 'Nocturna',
                                                ];
                                                echo $gradeNamesJornadas[$nivel['jornada']] ?? 'No existe';
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($nivel['estado'] == 1) : ?>
                                                    <button class="btn btn-success btn-sm">Activo</button>
                                                <?php else : ?>
                                                    <button class="btn btn-danger btn-sm">Inactivo</button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="show.php?id=<?= $id_nivel ?>" class="btn btn-sm btn-primary mx-1" title="Ver">
                                                        <i class="bi bi-eye" style="color: #fff"></i>
                                                    </a>
                                                    <a href="edit.php?id=<?= $id_nivel ?>" class="btn btn-sm btn-success mx-1" title="Editar">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="<?= APP_URL ?>/app/controllers/niveles/delete.php" method="POST" style="display: inline;" onclick="preguntar<?= $id_nivel ?>(event)" id="miFormulario<?= $id_nivel; ?>">
                                                        <input type="hidden" name="id_nivel" value="<?= $id_nivel ?>">
                                                        <button type="button" class="btn btn-sm btn-danger mx-1" title="Eliminar">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <script>
                                                    function preguntar<?= $id_nivel ?>(event) {
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
                                                                var form = $('#miFormulario<?= $id_nivel; ?>');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Niveles",
                "infoEmpty": "Mostrando 0 a 0 de 0 Niveles",
                "infoFiltered": "(Filtrado de _MAX_ total Niveles)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Niveles",
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