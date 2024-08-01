<?php
if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo'])) {
    $mensaje = $_SESSION['mensaje'];
    $tipo = $_SESSION['tipo'];
    unset($_SESSION['mensaje']);
    unset($_SESSION['tipo']);
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: '<?= $tipo === 'success' ? 'success' : 'error'; ?>',
                title: '<?= ucfirst($tipo === 'success' ? '¡Éxito!' : '¡Error!'); ?>',
                text: '<?= $mensaje; ?>',
                showConfirmButton: false,
                timer: 3000 // Cambia el valor del timer según tus necesidades
            });
        });
    </script>
<?php
}
?>
