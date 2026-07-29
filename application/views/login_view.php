<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gradient bg-light">

  <div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="col-md-5">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center rounded-top">
          <?php if($this->session->userdata('rol') == 'admin' || $this->session->userdata('rol') == 'superadmin'): ?>
            <h3><i class="bi bi-shield-lock"></i> Panel de Administración</h3>
          <?php else: ?>
            <h3><i class="bi bi-person-circle"></i> Acceso de Usuario</h3>
          <?php endif; ?>
        </div>
        <div class="card-body p-4">

          <?php if(!empty($error)): ?>
            <div class="alert alert-danger d-flex align-items-center">
              <i class="bi bi-exclamation-triangle-fill me-2"></i>
              <?php echo $error; ?>
            </div>
          <?php endif; ?>

          <form method="post" action="<?php echo site_url('login/auth'); ?>">
            <div class="mb-3">
              <label for="login" class="form-label fw-bold">
                <i class="bi bi-person"></i> Correo o Usuario
              </label>
              <input type="text" id="login" name="login" class="form-control form-control-lg" placeholder="Ingresa tu correo o usuario" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-bold">
                <i class="bi bi-key"></i> Contraseña
              </label>
              <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="btn btn-success w-100 btn-lg">
              <i class="bi bi-box-arrow-in-right"></i> Ingresar
            </button>
          </form>

          <?php if(!$this->session->userdata('rol') || $this->session->userdata('rol') == 'usuario'): ?>
            <div class="text-center mt-4">
              <small class="text-muted">¿No tienes cuenta? 
                <a href="<?php echo site_url('registro'); ?>" class="fw-bold text-decoration-none">Regístrate aquí</a>
              </small>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
