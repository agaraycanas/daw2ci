<?php
class Admin extends CI_Controller {
    private function listarPais() {
        $this->load->model('Pais_model');
        $data =[];
        $data['body']['paises'] = $this->Pais_model->findAll();
        frame($this,'admin/pais/list',$data);
    }
    
    private function crearPaisGet() {
        frame($this,'admin/pais/create');
    }
    
    private function crearPaispost() {
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
        $this->load->model('Pais_model');
        try {
            if ($nombre == null || $nombre == ''){
                throw new Exception('Nombre de país vacío o nulo');
            }
            $this->Pais_model->create($nombre);
            info("País $nombre creado correctamente", 'info', 'admin/pais/create');
        }
        catch (Exception $e) {
            info($e->getMessage(), 'danger', 'admin/pais/create');
        }
        
    }
    
    public function pais($accion) {
        switch ($accion) {
            case 'list':$this->listarPais();break;
            case 'create':$this->crearPaisGet();break;
            case 'createPost':$this->crearPaispost();break;
            default:info('Acción inexistente', 'danger', 'anonymous/info');
        }
        
    }
}
?>