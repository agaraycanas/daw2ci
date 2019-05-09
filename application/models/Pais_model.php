<?php
class Pais_model extends CI_Model {
    public function findAll() {
        return R::findAll('pais');
    }
}
?>