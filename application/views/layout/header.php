<!DOCTYPE html>
<html>
<head>
    <title>Panel de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo site_url('usuarios'); ?>">Panel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('usuarios'); ?>">Lista</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('usuarios/nuevo'); ?>">Agregar</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
