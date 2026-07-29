<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Administrador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gradient bg-light">

  <div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="col-md-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-success text-white text-center rounded-top">
          <h3><i class="bi bi-person-plus"></i> Crear Administrador</h3>
        </div>
        <div class="card-body p-4">

          <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-info d-flex align-items-center">
              <i class="bi bi-info-circle me-2"></i>
              <?php echo $this->session->flashdata('msg'); ?>
            </div>
          <?php endif; ?>

          <form method="post" action="<?php echo site_url('registro/registrar'); ?>">
            <div class="mb-3">
              <label for="username" class="form-label fw-bold">
                <i class="bi bi-person"></i> Nombre de Usuario
              </label>
              <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="admin" required>
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label fw-bold">
                <i class="bi bi-envelope"></i> Correo
              </label>
              <input type="email" id="correo" name="correo" class="form-control form-control-lg" placeholder="ejemplo@correo.com" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-bold">
                <i class="bi bi-key"></i> Contraseña
              </label>
              <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="********" required>
            </div>
            <div class="mb-3">
              <label for="rol" class="form-label fw-bold">
                <i class="bi bi-shield-lock"></i> Rol
              </label>
              <select id="rol" name="rol" class="form-select form-select-lg" required>
                <option value="admin">Admin</option>
                <option value="superadmin">Superadmin</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success w-100 btn-lg mb-2">
              <i class="bi bi-check-circle"></i> Registrar
            </button>
            <a href="<?php echo site_url('login'); ?>" class="btn btn-secondary w-100 btn-lg">
              <i class="bi bi-box-arrow-left"></i> Volver al Login
            </a>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
