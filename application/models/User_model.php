<?php

class User_model extends CI_Model
{
    public function getJabatan($nip=null){
        if($nip===null){
            $this->db->select('u.name, u.nip, u.sso_username, jabatan.nama_jabatan, jabatan.id, unit.nama_unit_kerja, unit.id as unit, jabatan.parent_id');
            $this->db->from('users as u');
            $this->db->join('jabatans as jabatan', 'u.jabatan_id = jabatan.id');
            $this->db->join('unit_kerjas as unit', 'unit.id = jabatan.unit_kerja_id');

            return $this->db->get()->result_array();
        } else{
            $this->db->select('u.name, u.nip, u.sso_username, jabatan.nama_jabatan, jabatan.id, unit.nama_unit_kerja, unit.id as unit, jabatan.parent_id');
            $this->db->from('users as u');
            $this->db->join('jabatans as jabatan', 'u.jabatan_id = jabatan.id');
            $this->db->join('unit_kerjas as unit', 'unit.id = jabatan.unit_kerja_id');
            $this->db->where('u.nip', $nip);

            return $this->db->get_where()->result_array();
        }
    }
}