<?php $this->load->view('layout/header'); ?>

<h1>Editar Usuario</h1>

<form method="post" action="<?php echo site_url('usuarios/actualizar/'.$usuario->us_id); ?>" class="mt-3">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $usuario->us_nombre; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" value="<?php echo $usuario->us_apellidos; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" value="<?php echo $usuario->us_correo; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" value="<?php echo $usuario->us_telefono; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nueva Contraseña (opcional)</label>
        <input type="password" name="password" class="form-control">
        <small class="text-muted">Déjalo vacío si no deseas cambiar la contraseña.</small>
    </div>

    <!-- Selector de algoritmo -->
    <div class="mb-3">
        <label class="form-label">Algoritmo de cifrado</label>
        <select name="algoritmo" class="form-control">
            <option value="">-- Selecciona si cambias contraseña --</option>
            <option value="bcrypt">bcrypt</option>
            <option value="sha256">sha256</option>
            <option value="sha1">sha1</option>
            <option value="md5">md5</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Guardar cambios</button>
    <a href="<?php echo site_url('usuarios'); ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?php $this->load->view('layout/footer'); ?>
