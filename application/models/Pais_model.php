<?php

class Pais_model extends CI_Model
{

    public function findAll()
    {
        return R::findAll('pais');
    }

    public function create($nombre)
    {
        $p = R::findOne('pais', ' nombre = ? ', [$nombre]);
        if ( $p != null) {
            throw new Exception("País $nombre ya existe");
        } else {
            $pais = R::dispense('pais');
            $pais->nombre = $nombre;
            R::store($pais);
        }
    }
}
?>