<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : 'Perfil de Usuario'; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-light bg-primary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="<?php echo site_url('usuario/perfil'); ?>">
            <i class="bi bi-person-circle"></i> Perfil
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUsuario" aria-controls="navbarUsuario" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarUsuario">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="<?php echo site_url('usuario/perfil'); ?>">
                        <i class="bi bi-person"></i> Mi Perfil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fw-bold" href="<?php echo site_url('login/logout'); ?>">
                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
