<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Administrador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow">
          <div class="card-header bg-primary text-white text-center">
            <h4>Registrar Administrador</h4>
          </div>
          <div class="card-body">
            <?php if($this->session->flashdata('msg')): ?>
              <div class="alert alert-info">
                <?php echo $this->session->flashdata('msg'); ?>
              </div>
            <?php endif; ?>

            <form method="post" action="<?php echo site_url('registro/registrar'); ?>">
              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" id="correo" name="correo" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select id="rol" name="rol" class="form-select" required>
                  <option value="admin">Admin</option>
                  <option value="superadmin">Superadmin</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success w-100 mb-2">Registrar</button>
              <a href="<?php echo site_url('login'); ?>" class="btn btn-secondary w-100">
                Volver al Login
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
