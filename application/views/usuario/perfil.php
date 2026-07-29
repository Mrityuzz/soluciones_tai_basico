<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card border-0 shadow-lg">
        <div class="row g-0">
          
          <div class="col-md-4 bg-primary text-white d-flex flex-column justify-content-center align-items-center rounded-start">
            <i class="bi bi-person-circle display-1 mb-3"></i>
            <h4 class="fw-bold">Mi Perfil</h4>
            <p class="text-light">Actualiza tu información personal</p>
          </div>

          <div class="col-md-8">
            <div class="card-body p-4">
              
              <?php if(!empty($msg)): ?>
                <div class="alert alert-info d-flex align-items-center">
                  <i class="bi bi-info-circle me-2"></i>
                  <?php echo $msg; ?>
                </div>
              <?php endif; ?>

              <?php if(!empty($usuario)): ?>
              <form method="post" action="<?php echo site_url('usuario/actualizar'); ?>">
                
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">
                      <i class="bi bi-person"></i> Nombre
                    </label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                           value="<?php echo htmlspecialchars($usuario->us_nombre, ENT_QUOTES, 'UTF-8'); ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="apellidos" class="form-label fw-bold">
                      <i class="bi bi-person-lines-fill"></i> Apellidos
                    </label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control"
                           value="<?php echo htmlspecialchars($usuario->us_apellidos, ENT_QUOTES, 'UTF-8'); ?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="correo" class="form-label fw-bold">
                      <i class="bi bi-envelope"></i> Correo
                    </label>
                    <input type="email" id="correo" name="correo" class="form-control"
                           value="<?php echo htmlspecialchars($usuario->us_correo, ENT_QUOTES, 'UTF-8'); ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="telefono" class="form-label fw-bold">
                      <i class="bi bi-telephone"></i> Teléfono
                    </label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                           value="<?php echo htmlspecialchars($usuario->us_telefono, ENT_QUOTES, 'UTF-8'); ?>">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label fw-bold">
                    <i class="bi bi-key"></i> Nueva Contraseña
                  </label>
                  <input type="password" id="password" name="password" class="form-control">
                  <small class="text-muted">Déjalo vacío si no quieres cambiarla</small>
                </div>

                <div class="d-grid">
                  <button type="submit" class="btn btn-success btn-lg">
                    <i class="bi bi-check-circle"></i> Guardar cambios
                  </button>
                </div>
              </form>
              <?php else: ?>
                <div class="alert alert-warning">
                  No se encontraron datos del usuario.
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
