<?php

class Aficion_model extends CI_Model
{

    public function findAll()
    {
        return R::findAll('aficion');
    }

    public function create($nombre)
    {
        $p = R::findOne('aficion', ' nombre = ? ', [$nombre]);
        if ( $p != null) {
            throw new Exception("Afición $nombre ya existe");
        } else {
            $aficion = R::dispense('aficion');
            $aficion->nombre = $nombre;
            R::store($aficion);
        }
    }
}
?>