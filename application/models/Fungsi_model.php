<?php

class Fungsi_model extends CI_Model
{
    public function getFungsi($id=null){
        if($id === null){
            $this->hris->select('p.id, p.position');
            $this->hris->from('positions as p');
            return $this->hris->get()->result_array();
        }else {
            $this->hris->select('p.id, p.position');
            $this->hris->from('positions as p');
            $this->hris->where('p.id', $id);
            return $this->hris->get_where()->result_array();
        }
        
    }
}