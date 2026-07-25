<?php $this->load->view('layout/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Agregar Usuario</h2>

    <form method="post" action="<?php echo site_url('usuarios/agregar'); ?>">
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

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <!-- Selector de algoritmo -->
        <div class="mb-3">
            <label class="form-label">Algoritmo de cifrado</label>
            <select name="algoritmo" class="form-select">
                <option value="bcrypt">bcrypt</option>
                <option value="sha256">sha256</option>
                <option value="sha1">sha1</option>
                <option value="md5">md5</option>
            </select>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="<?php echo site_url('usuarios'); ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php $this->load->view('layout/footer'); ?>
