<?php $this->load->view('layout/header'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Lista de Usuarios</h2>

    <?php if(!empty($msg)): ?>
        <div class="alert alert-info"><?php echo $msg; ?></div>
    <?php endif; ?>

    <!-- Acciones principales -->
    <div class="row mb-3">
        <div class="col-md-4">
            <a href="<?php echo site_url('usuarios/nuevo'); ?>" class="btn btn-primary w-100">
                <i class="bi bi-person-plus"></i> Agregar Usuario
            </a>
        </div>
        <div class="col-md-4">
            <form method="post" action="<?php echo site_url('usuarios/export_excel'); ?>">
                <input type="hidden" name="selected_ids" id="selected_ids_excel">
                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-file-earmark-excel"></i> Exportar a Excel
                </button>
            </form>
        </div>
        <div class="col-md-4">
            <form method="post" action="<?php echo site_url('usuarios/export_pdf'); ?>">
                <input type="hidden" name="selected_ids" id="selected_ids_pdf">
                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-file-earmark-pdf"></i> Exportar a PDF
                </button>
            </form>
        </div>
    </div>

    <!-- Tabla de usuarios -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <table class="table table-hover" id="usuarios_table">
                <thead class="table-dark">
                    <tr>
                        <th><input type="checkbox" id="select_all"></th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $u): ?>
                        <tr>
                            <td><input type="checkbox" class="row_checkbox" value="<?php echo $u->us_id; ?>"></td>
                            <td><?php echo $u->us_id; ?></td>
                            <td><?php echo $u->us_nombre; ?></td>
                            <td><?php echo $u->us_apellidos; ?></td>
                            <td><?php echo $u->us_correo; ?></td>
                            <td><?php echo $u->us_telefono; ?></td>
                            <td>
                                <a href="<?php echo site_url('usuarios/editar/'.$u->us_id); ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <a href="<?php echo site_url('usuarios/borrar/'.$u->us_id); ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Borrar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bloque separado para importación -->
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <i class="bi bi-upload"></i> Importar Usuarios
        </div>
        <div class="card-body">
            <a href="<?php echo site_url('usuarios/plantilla_excel'); ?>" class="btn btn-info mb-3">
                <i class="bi bi-download"></i> Descargar Plantilla Excel
            </a>
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('usuarios/import_excel'); ?>">
                <div class="mb-3">
                    <input type="file" name="archivo_excel" accept=".xlsx,.xls" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-cloud-upload"></i> Importar
                </button>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>

<!-- Script para controlar el checkbox "seleccionar todos" y mandar IDs -->
<script>
    document.getElementById('select_all').addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('.row_checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });

    function getSelectedIds() {
        let ids = [];
        document.querySelectorAll('.row_checkbox:checked').forEach(cb => ids.push(cb.value));
        return ids.join(',');
    }

    document.querySelector('form[action$="export_excel"]').addEventListener('submit', function(e) {
        let ids = getSelectedIds();
        if (!ids) {
            alert('Debes seleccionar al menos un usuario para exportar.');
            e.preventDefault(); 
        } else {
            document.getElementById('selected_ids_excel').value = ids;
        }
    });

    document.querySelector('form[action$="export_pdf"]').addEventListener('submit', function(e) {
        let ids = getSelectedIds();
        if (!ids) {
            alert('Debes seleccionar al menos un usuario para exportar.');
            e.preventDefault(); 
        } else {
            document.getElementById('selected_ids_pdf').value = ids;
        }
    });
</script>
