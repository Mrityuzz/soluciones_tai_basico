<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow">
          <div class="card-header bg-dark text-white text-center">
            <h4>Inicio de Sesión Admin</h4>
          </div>
          <div class="card-body">
            <?php if(!empty($error)): ?>
              <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="post" action="<?php echo site_url('login/auth'); ?>">
              <div class="mb-3">
                <label for="correo">Correo</label>
                <input type="email" id="correo" name="correo" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>

            <div class="text-center mt-3">
              <small>¿No tienes cuenta? 
                <a href="<?php echo site_url('registro'); ?>">Regístrate aquí</a>
              </small>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
