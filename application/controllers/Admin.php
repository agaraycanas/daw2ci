<?php
class Admin extends CI_Controller {

    
    // ============================= PAIS  ===============================
    private function listarPais() {
        $this->load->model('Pais_model');
        $data =[];
        $data['body']['paises'] = $this->Pais_model->findAll();
        frame($this,'admin/pais/list',$data);
    }
    
    private function crearPaisGet() {
        frame($this,'admin/pais/create');
    }
    
    private function crearPaisPost() {
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
            case 'createPost':$this->crearPaisPost();break;
            default:info('Acción inexistente', 'danger', 'anonymous/info');
        }
    }
    
    //=====================================================================
    
    
    // ===================== AFICION ======================================
    

    public function aficion($accion) {
        switch ($accion) {
            case 'list':$this->listarAficion();break;
            case 'create':$this->crearAficionGet();break;
            case 'createPost':$this->crearAficionPost();break;
            default:info('Acción inexistente', 'danger', 'anonymous/info');
        }
    }
    
    private function listarAficion() {
        $this->load->model('Aficion_model');
        $data =[];
        $data['body']['aficiones'] = $this->Aficion_model->findAll();
        frame($this,'admin/aficion/list',$data);
    }
    
    private function crearAficionGet() {
        frame($this,'admin/aficion/create');
    }
    
    private function crearAficionPost() {
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
        $this->load->model('Aficion_model');
        try {
            if ($nombre == null || $nombre == ''){
                throw new Exception('Nombre de afición vacío o nulo');
            }
            $this->Aficion_model->create($nombre);
            info("Afición $nombre creada correctamente", 'info', 'admin/aficion/create');
        }
        catch (Exception $e) {
            info($e->getMessage(), 'danger', 'admin/aficion/create');
        }
        
    }
    
    // =============================================================
    
    
    
    // ===================== USUARIO ======================================
    
    public function user($accion) {
        switch ($accion) {
            case 'list':$this->listarUser();break;
            default:info('Acción inexistente', 'danger', 'anonymous/info');
        }
    }
    
    private function listarUser() {
        $this->load->model('Usuario_model');
        $data=[];
        $data['body']['usuarios'] = $this->Usuario_model->findAll();
        frame($this,'admin/usuario/list',$data);
    }

    //=====================================================================
}
?>