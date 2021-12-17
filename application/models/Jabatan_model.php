<?php

class Jabatan_model extends CI_Model
{
    public function getJabatan($id=null){
        if($id===null){
            $this->db->select('jabatan.id, jabatan.nama_jabatan, jabatan.parent_id');
            $this->db->from('jabatans as jabatan');
            $this->db->join('unit_kerjas as unit', 'unit.id = jabatan.unit_kerja_id');

            return $this->db->get()->result_array();
        } else{
            $this->db->select('jabatan.id, jabatan.nama_jabatan, jabatan.parent_id');
            $this->db->from('jabatans as jabatan');
            $this->db->join('unit_kerjas as unit', 'unit.id = jabatan.unit_kerja_id');
            $this->db->where('jabatan.id', $id);

            return $this->db->get_where()->result_array();
        }
    }
}