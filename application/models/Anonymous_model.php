<?php
class Anonymous_model extends CI_Model {
    function init() {
        // Inicializamos roles
        $rolAdmin = R::dispense('rol');
        $rolAdmin->nombre = 'admin';
        R::store($rolAdmin);
        
        $rolUser = R::dispense('rol');
        $rolUser->nombre = 'user';
        R::store($rolUser);
        
        // Inicilizamos pa�ses
        $pais = R::dispense('pais');
        $pais->nombre = 'España';
        R::store($pais);
        
        $pais = R::dispense('pais');
        $pais->nombre = 'Francia';
        R::store($pais);
        
        //inicalizamos usuario admin
        $usuarioAdmin = R::dispense('usuario');
        $usuarioAdmin->nombre = 'Administrador';
        $usuarioAdmin->loginname = 'admin';
        $usuarioAdmin->password = password_hash('admin', PASSWORD_DEFAULT);
        R::store($usuarioAdmin);
        //Vinculamos admin con el perfil administrador
        $roles = R::dispense('roles');
        $roles -> usuario = $usuarioAdmin;
        $roles -> rol = $rolAdmin;
        R::store($roles);
        
        
    }

    function login($loginname,$password) {
        $usuario = R::findOne('usuario','loginname = ?',[$loginname] );
        if ($usuario == null) {
            throw new Exception('Usuario inexistente');
        }
        else {
            if (!password_verify($password,$usuario->password)) {
                throw new Exception('Contraseña incorrecta');
            }
            else {
                return $usuario;
            }
        }
    }

    function registrar($nombre,$ape1,$ape2,$loginname,$password,$fnac, $id_pais, $id_aficiones) {
        
        $u = R::findOne('usuario','loginname = ?',[ $loginname ] );
        
        if ($u != null) {
            throw new Exception('Nombre de usuario ya existente');
        }
        
        $usuario = R::dispense('usuario');
        
        $usuario->nombre = $nombre;
        $usuario->ape1 = $ape1;
        $usuario->ape2 = $ape2;
        $usuario->loginname = $loginname;
        $usuario->password= password_hash($password, PASSWORD_DEFAULT);
        $usuario->fnac = $fnac;
        
        $pais = R::load('pais',$id_pais);
        $usuario-> nace = $pais;
        
        
       R::store($usuario);
        
        foreach ($id_aficiones as $id_aficion) {
            $aficion = R::load('aficion',$id_aficion);
            $gusta = R::dispense('gusta');
            $gusta->aficion =  $aficion;
            $gusta->usuario =  $usuario;
            R::store($gusta);
        }
        
        $rolUser = R::findOne('rol','nombre = ?',[ 'user' ] );
        
        if ($rolUser == null) {
            throw new Exception('Rol de usuario no encontrado');
        }
        
        $roles = R::dispense('roles');
        $roles -> usuario = $usuario;
        $roles -> rol = $rolUser;
    
        R::store($roles);
        
    }
}