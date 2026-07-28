<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
          <h3><i class="bi bi-person-circle"></i> Mi Perfil</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <!-- Columna izquierda: avatar y datos -->
            <div class="col-md-4 text-center border-end">
              <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
                   class="rounded-circle mb-3" width="120" alt="Avatar">
              <h5 class="fw-bold"><?php echo $admin->username; ?></h5>
              <p class="text-muted"><?php echo $admin->correo; ?></p>
              <span class="badge bg-dark"><?php echo ucfirst($admin->rol); ?></span>
            </div>

            <!-- Columna derecha: formulario -->
            <div class="col-md-8">
              <?php if($this->session->flashdata('msg')): ?>
                <div class="alert alert-info">
                  <?php echo $this->session->flashdata('msg'); ?>
                </div>
              <?php endif; ?>

              <h5 class="mb-3"><i class="bi bi-lock"></i> Cambiar Contraseña</h5>
              <form method="post" action="<?php echo site_url('perfil/cambiar_password'); ?>">
                <div class="mb-3">
                  <label for="password_actual" class="form-label">Contraseña Actual</label>
                  <input type="password" id="password_actual" name="password_actual" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="password_nueva" class="form-label">Nueva Contraseña</label>
                  <input type="password" id="password_nueva" name="password_nueva" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="password_confirmar" class="form-label">Confirmar Nueva Contraseña</label>
                  <input type="password" id="password_confirmar" name="password_confirmar" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Actualizar Contraseña</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
