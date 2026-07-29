<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : 'Panel de Usuarios'; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="<?php echo site_url('usuarios'); ?>">
            <i class="bi bi-people-fill"></i> Panel de Usuarios
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPanel" aria-controls="navbarPanel" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarPanel">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="<?php echo site_url('usuarios'); ?>">
                        <i class="bi bi-house-door"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="<?php echo site_url('usuarios/nuevo'); ?>">
                        <i class="bi bi-person-plus"></i> Nuevo Usuario
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="<?php echo site_url('usuarios/plantilla_excel'); ?>">
                        <i class="bi bi-download"></i> Plantilla Excel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="<?php echo site_url('perfil'); ?>">
                        <i class="bi bi-person-circle"></i> Perfil
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
