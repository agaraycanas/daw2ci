<?php

class Anonymous extends CI_Controller
{

    function home()
    {
        frame($this, 'anonymous/home');
    }

    function index()
    {
        $this->home();
    }

    function init()
    {
        $this->load->model('anonymous_model');
        $this->anonymous_model->init();
        frame($this, 'anonymous/init');
    }

    function login()
    {
        frame($this, 'anonymous/login');
    }

    function loginPost()
    {
        $loginname = isset($_POST['loginname']) ? $_POST['loginname'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        if ($loginname == null || $password == null) {
            show_404();
        }

        $this->load->model('Anonymous_model');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        try {
            $usuario = $this->Anonymous_model->login($loginname, $password);
            $_SESSION['usuario'] = $usuario;
            redirect(base_url());
        } catch (Exception $e) {
            info($e->getMessage(), 'danger', 'anonymous/info');
        }
    }

    function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
            redirect(base_url(), 'warning');
        } else {
            info('Debes hacer login primero', 'warning');
        }
    }

    function info()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $data = [];

        $data['mensaje'] = isset($_SESSION['info']['mensaje']) ? $_SESSION['info']['mensaje'] : 'Pulsa el botón para volver';
        $data['link'] = isset($_SESSION['info']['link']) ? $_SESSION['info']['link'] : base_url();
        $data['severity'] = isset($_SESSION['info']['severity']) ? $_SESSION['info']['severity'] : 'info';

        unset($_SESSION['info']['mensaje']);
        unset($_SESSION['info']['link']);
        unset($_SESSION['info']['severity']);

        frame($this, 'anonymous/info', $data);
    }

    public function registrar()
    {
        $this->load->model('Pais_model');
        $this->load->model('Aficion_model');
        $data=[];
        $data['body']['paises'] = $this->Pais_model->findAll();
        $data['body']['aficiones'] = $this->Aficion_model->findAll();
        frame($this, 'anonymous/registrar',$data);
    }

    public function registrarPost()
    {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $ape1 = isset($_POST['ape1']) ? $_POST['ape1'] : '';
        $ape2 = isset($_POST['ape2']) ? $_POST['ape2'] : '';
        $loginname = isset($_POST['loginname']) ? $_POST['loginname'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $fnac = isset($_POST['fnac']) ? $_POST['fnac'] : null;
        $pais = isset($_POST['pais']) ? $_POST['pais'] : null;
        $aficiones = isset($_POST['aficiones']) ? $_POST['aficiones'] : [] ;
        
        if ($nombre == null || $loginname == null || $password == null || $pais==null) {
            info('Datos incorrectos', 'danger');
        } else {
            $this->load->model('Anonymous_model');
            try {
                $this->Anonymous_model->registrar($nombre, $ape1, $ape2, $loginname, $password, $fnac, $pais, $aficiones);
                info('Usuario registrado correctamente', 'info');
            } catch (Exception $e) {
                info($e->getMessage(), 'danger', 'anonymous/registrar');
            }
        }
    }
}
?>