<?php
class Admin extends CI_Controller {
    private function listarPais() {
        $this->load->model('Pais_model');
        $data =[];
        $data['body']['paises'] = $this->Pais_model->findAll();
        frame($this,'admin/pais/list',$data);
    }
    
    public function pais($accion) {
        switch ($accion) {
            case 'list':$this->listarPais();break;
            default:info('Acción inexistente', 'danger', 'anonymous/info');
        }
        
    }
}
?>