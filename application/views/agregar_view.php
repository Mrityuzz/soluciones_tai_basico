<?php $this->load->view('layout/header'); ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-success text-white text-center rounded-top">
          <h3><i class="bi bi-person-plus"></i> Agregar Usuario</h3>
        </div>
        <div class="card-body p-4">

          <form method="post" action="<?php echo site_url('usuarios/agregar'); ?>">
            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-person"></i> Nombre</label>
              <input type="text" name="nombre" class="form-control form-control-lg" placeholder="Nombre" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-person-badge"></i> Apellidos</label>
              <input type="text" name="apellidos" class="form-control form-control-lg" placeholder="Apellidos" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-envelope"></i> Correo</label>
              <input type="email" name="correo" class="form-control form-control-lg" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-telephone"></i> Teléfono</label>
              <input type="text" name="telefono" class="form-control form-control-lg" placeholder="(000) 000-0000" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-key"></i> Contraseña</label>
              <input type="password" name="password" class="form-control form-control-lg" placeholder="********" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold"><i class="bi bi-shield-lock"></i> Algoritmo de cifrado</label>
              <select name="algoritmo" class="form-select form-select-lg">
                <option value="bcrypt">bcrypt (recomendado)</option>
                <option value="sha256">sha256</option>
                <option value="sha1">sha1</option>
                <option value="md5">md5</option>
              </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
              <button type="submit" class="btn btn-success btn-lg">
                <i class="bi bi-check-circle"></i> Guardar
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
