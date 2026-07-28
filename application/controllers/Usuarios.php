<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library('session'); 
        $this->load->library('excel'); 
        $this->load->library('pdf'); 

        if (!$this->session->userdata('admin_logged')) {
            redirect('login');
        }
    }

    public function index() {
        $data['usuarios'] = $this->Usuario_model->obtener_todos();
        $data['msg'] = $this->session->flashdata('msg'); 
        $this->load->view('usuarios_view', $data);
    }

    public function nuevo() {
        $this->load->view('agregar_view');
    }

    public function agregar() {
        $data = array(
            'us_nombre'   => $this->input->post('nombre'),
            'us_apellidos'=> $this->input->post('apellidos'),
            'us_correo'   => $this->input->post('correo'),
            'us_telefono' => $this->input->post('telefono'),
            'us_password' => $this->input->post('password') 
        );

        $algoritmo = $this->input->post('algoritmo') ? $this->input->post('algoritmo') : 'bcrypt';

        if ($this->Usuario_model->insertar($data, $algoritmo)) {
            $this->session->set_flashdata('msg', 'Usuario agregado correctamente');
        } else {
            $this->session->set_flashdata('msg', 'Error: el correo ya existe');
        }

        redirect('usuarios'); 
    }

    // Borrar usuario
    public function borrar($id) {
        $this->Usuario_model->borrar($id);
        $this->session->set_flashdata('msg', 'Usuario eliminado');
        redirect('usuarios'); 
    }

    // Editar usuario
    public function editar($id) {
        $data['usuario'] = $this->Usuario_model->get_usuario($id);
        $this->load->view('editar_view', $data);
    }

    // Actualizar usuario (con opción de cambiar contraseña)
    public function actualizar($id) {
        $data = array(
            'us_nombre'   => $this->input->post('nombre'),
            'us_apellidos'=> $this->input->post('apellidos'),
            'us_correo'   => $this->input->post('correo'),
            'us_telefono' => $this->input->post('telefono')
        );

        if ($this->input->post('password')) {
            $data['us_password'] = $this->input->post('password');
            $algoritmo = $this->input->post('algoritmo') ? $this->input->post('algoritmo') : 'bcrypt';
            $this->Usuario_model->actualizar($id, $data, $algoritmo);
        } else {
            $this->Usuario_model->actualizar($id, $data);
        }

        $this->session->set_flashdata('msg', 'Usuario actualizado');
        redirect('usuarios'); 
    }
    // Exportar usuarios a Excel 
    public function export_excel() {
        $ids = $this->input->post('selected_ids');

        if (empty($ids)) {
            $this->session->set_flashdata('msg', 'No se exportó nada porque no seleccionaste ningún usuario.');
            redirect('usuarios');
            return;
        }

        $ids_array = explode(',', $ids);
        $usuarios = $this->Usuario_model->obtener_por_ids($ids_array);

        $sheet = $this->excel->setActiveSheetIndex(0);

        // Título
        $sheet->mergeCells('A1:E1');
        $sheet->setCellValue('A1', 'Lista de Usuarios');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        // Encabezados
        $sheet->setCellValue('A2', 'ID')
              ->setCellValue('B2', 'Nombre')
              ->setCellValue('C2', 'Apellidos')
              ->setCellValue('D2', 'Correo')
              ->setCellValue('E2', 'Teléfono');

        $sheet->getStyle('A2:E2')->getFont()->setBold(true);
        $sheet->getStyle('A2:E2')->getFill()
              ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
              ->getStartColor()->setRGB('DDDDDD');

        // Datos
        $row = 3;
        foreach ($usuarios as $u) {
            $sheet->setCellValue('A'.$row, $u->us_id)
                  ->setCellValue('B'.$row, $u->us_nombre)
                  ->setCellValue('C'.$row, $u->us_apellidos)
                  ->setCellValue('D'.$row, $u->us_correo)
                  ->setCellValue('E'.$row, $u->us_telefono);
            $row++;
        }

        
        $sheet->getStyle('A2:E'.($row-1))->applyFromArray([
            'borders' => [
                'allborders' => ['style' => PHPExcel_Style_Border::BORDER_THIN]
            ]
        ]);

        
        foreach(range('A','E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="usuarios.xls"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $writer->save('php://output');
    }

    
    public function export_pdf() {
        $ids = $this->input->post('selected_ids');

        if (empty($ids)) {
            $this->session->set_flashdata('msg', 'No se exportó nada porque no seleccionaste ningún usuario.');
            redirect('usuarios');
            return;
        }

        $ids_array = explode(',', $ids);
        $usuarios = $this->Usuario_model->obtener_por_ids($ids_array);

        $pdf = new Pdf();
        $pdf->AddPage();

        // Título
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Lista de Usuarios', 0, 1, 'C');

        // Encabezados
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(20, 10, 'ID', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Nombre', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Apellidos', 1, 0, 'C', true);
        $pdf->Cell(60, 10, 'Correo', 1, 0, 'C', true);
        $pdf->Cell(30, 10, 'Teléfono', 1, 1, 'C', true);

        // Datos 
        $pdf->SetFont('helvetica', '', 12);
        $fill = false;
        foreach ($usuarios as $u) {
            $pdf->SetFillColor(240,240,240);
            $pdf->Cell(20, 10, $u->us_id, 1, 0, 'C', $fill);
            $pdf->Cell(40, 10, $u->us_nombre, 1, 0, 'L', $fill);
            $pdf->Cell(40, 10, $u->us_apellidos, 1, 0, 'L', $fill);
            $pdf->Cell(60, 10, $u->us_correo, 1, 0, 'L', $fill);
            $pdf->Cell(30, 10, $u->us_telefono, 1, 1, 'C', $fill);
            $fill = !$fill; 
        }

        $pdf->Output('usuarios.pdf', 'I');
    }

    // Plantilla Excel para importación
    public function plantilla_excel() {
        $sheet = $this->excel->setActiveSheetIndex(0);

        $encabezados = ['Nombre', 'Apellidos', 'Correo', 'Teléfono', 'Contraseña'];
        $col = 'A';
        foreach ($encabezados as $titulo) {
            $sheet->setCellValue($col.'1', $titulo);
            $sheet->getStyle($col.'1')->getFont()->setBold(true);
            $col++;
        }

        // fila de ejemplo
        $sheet->setCellValue('A2', 'Juan');
        $sheet->setCellValue('B2', 'Pérez López');
        $sheet->setCellValue('C2', 'juan.perez@ejemplo.com');
        $sheet->setCellValue('D2', '4431112233');
        $sheet->setCellValue('E2', 'clave123');

        
        $sheet->getStyle('A1:E2')->applyFromArray([
            'borders' => [
                'allborders' => ['style' => PHPExcel_Style_Border::BORDER_THIN]
            ]
        ]);
        foreach(range('A','E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="plantilla_usuarios.xls"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $writer->save('php://output');
    }

    // Importar usuarios desde Excel con validaciones
    public function import_excel() {
        if (!empty($_FILES['archivo_excel']['tmp_name'])) {
            $archivo = $_FILES['archivo_excel']['tmp_name'];

            $objPHPExcel = PHPExcel_IOFactory::load($archivo);
            $hoja = $objPHPExcel->getActiveSheet();
            $highestRow = $hoja->getHighestRow();

            for ($row = 2; $row <= $highestRow; $row++) {
                $nombre    = trim($hoja->getCell('A'.$row)->getValue());
                $apellidos = trim($hoja->getCell('B'.$row)->getValue());
                $correo    = trim($hoja->getCell('C'.$row)->getValue());
                $telefono  = trim($hoja->getCell('D'.$row)->getValue());
                $password  = trim($hoja->getCell('E'.$row)->getValue());

                
                if (is_numeric($nombre)) {
                    continue;
                }

                // Validar formato de correo
                if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    continue;
                }

                // Validar campos obligatorios y evitar duplicados
                if (!empty($correo) && !empty($nombre) && !empty($apellidos) &&
                    !$this->Usuario_model->existe_correo($correo)) {

                    $this->Usuario_model->insertar([
                        'us_nombre'   => $nombre,
                        'us_apellidos'=> $apellidos,
                        'us_correo'   => $correo,
                        'us_telefono' => $telefono,
                        'us_password' => $password
                    ], 'bcrypt');
                }
            }

            $this->session->set_flashdata('msg', 'Importación realizada correctamente');
        } else {
            $this->session->set_flashdata('msg', 'Error: no se subió ningún archivo');
        }

        redirect('usuarios');
    }
}