<?php $this->load->view('layout/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista de Usuarios</h1>
    <a href="<?php echo site_url('usuarios/nuevo'); ?>" class="btn btn-primary">Agregar Usuario</a>
</div>

<?php if(!empty($msg)): ?>
    <div class="alert alert-info"><?php echo $msg; ?></div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Apellidos</th><th>Correo</th><th>Teléfono</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($usuarios as $u): ?>
        <tr>
            <td><?php echo $u->us_id; ?></td>
            <td><?php echo $u->us_nombre; ?></td>
            <td><?php echo $u->us_apellidos; ?></td>
            <td><?php echo $u->us_correo; ?></td>
            <td><?php echo $u->us_telefono; ?></td>
            <td>
                <a href="<?php echo site_url('usuarios/editar/'.$u->us_id); ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="<?php echo site_url('usuarios/borrar/'.$u->us_id); ?>" class="btn btn-danger btn-sm">Borrar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php $this->load->view('layout/footer'); ?>
