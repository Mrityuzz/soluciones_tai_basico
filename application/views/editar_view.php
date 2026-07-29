<?php $this->load->view('layout/header'); ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-warning text-dark text-center rounded-top">
          <h3><i class="bi bi-pencil-square"></i> Editar Usuario</h3>
        </div>
        <div class="card-body p-4">

          <form method="post" action="<?php echo site_url('usuarios/actualizar/'.$usuario->us_id); ?>">
            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-person"></i> Nombre</label>
              <input type="text" name="nombre" value="<?php echo $usuario->us_nombre; ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-person-badge"></i> Apellidos</label>
              <input type="text" name="apellidos" value="<?php echo $usuario->us_apellidos; ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-envelope"></i> Correo</label>
              <input type="email" name="correo" value="<?php echo $usuario->us_correo; ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-telephone"></i> Teléfono</label>
              <input type="text" name="telefono" value="<?php echo $usuario->us_telefono; ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-key"></i> Nueva Contraseña (opcional)</label>
              <input type="password" name="password" class="form-control form-control-lg">
              <small class="text-muted">Déjalo vacío si no deseas cambiar la contraseña.</small>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-shield-lock"></i> Algoritmo de cifrado</label>
              <select name="algoritmo" class="form-select form-select-lg">
                <option value="">-- Selecciona si cambias contraseña --</option>
                <option value="bcrypt">bcrypt (recomendado)</option>
                <option value="sha256">sha256</option>
                <option value="sha1">sha1</option>
                <option value="md5">md5</option>
              </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
              <button type="submit" class="btn btn-success btn-lg">
                <i class="bi bi-check-circle"></i> Guardar cambios
              </button>
              <a href="<?php echo site_url('usuarios'); ?>" class="btn btn-secondary btn-lg">
                <i class="bi bi-x-circle"></i> Cancelar
              </a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('layout/footer'); ?>
