<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center rounded-top">
          <h3><i class="bi bi-person-circle"></i> Mi Perfil</h3>
        </div>
        <div class="card-body p-4">
          <div class="row">
            <div class="col-md-4 text-center border-end">
              <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
                   class="rounded-circle mb-3 border border-3 border-primary" width="130" alt="Avatar">
              <h5 class="fw-bold"><?php echo $admin->username; ?></h5>
              <p class="text-muted"><?php echo $admin->correo; ?></p>
              <span class="badge bg-dark"><?php echo ucfirst($admin->rol); ?></span>
            </div>

            <div class="col-md-8">
              <?php if($this->session->flashdata('msg')): ?>
                <div class="alert alert-info d-flex align-items-center">
                  <i class="bi bi-info-circle me-2"></i>
                  <?php echo $this->session->flashdata('msg'); ?>
                </div>
              <?php endif; ?>

              <h5 class="mb-3 text-primary"><i class="bi bi-lock"></i> Cambiar Contraseña</h5>
              <form method="post" action="<?php echo site_url('perfil/cambiar_password'); ?>">
                <div class="mb-3">
                  <label for="password_actual" class="form-label fw-bold">Contraseña Actual</label>
                  <input type="password" id="password_actual" name="password_actual" class="form-control form-control-lg" required>
                </div>
                <div class="mb-3">
                  <label for="password_nueva" class="form-label fw-bold">Nueva Contraseña</label>
                  <input type="password" id="password_nueva" name="password_nueva" class="form-control form-control-lg" required>
                </div>
                <div class="mb-3">
                  <label for="password_confirmar" class="form-label fw-bold">Confirmar Nueva Contraseña</label>
                  <input type="password" id="password_confirmar" name="password_confirmar" class="form-control form-control-lg" required>
                </div>
                <button type="submit" class="btn btn-success w-100 btn-lg mb-2">
                  <i class="bi bi-check-circle"></i> Actualizar Contraseña
                </button>
              </form>

              <form method="post" action="<?php echo site_url('perfil/eliminar_cuenta'); ?>">
                <button type="submit" class="btn btn-danger w-100 btn-lg"
                        onclick="return confirm('¿Seguro que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');">
                  <i class="bi bi-trash"></i> Eliminar Cuenta
                </button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
