<?php $this->load->view('layout/header'); ?>

<h1>Agregar Usuario</h1>

<form method="post" action="<?php echo site_url('usuarios/agregar'); ?>" class="mt-3">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="<?php echo site_url('usuarios'); ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?php $this->load->view('layout/footer'); ?>
