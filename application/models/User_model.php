<?php

class User_model extends CI_Model
{
    public function getJabatan($nip=null){
        if($nip===null){
            $this->db->select('u.name, jabatan.id, u.nip, jabatan.nama_jabatan');
            $this->db->from('users as u');
            $this->db->join('jabatans as jabatan', 'u.jabatan_id = jabatan.id');

            return $this->db->get()->result_array();
        } else{
            $this->db->select('u.name, jabatan.id, u.nip, jabatan.nama_jabatan');
            $this->db->from('users as u');
            $this->db->join('jabatans as jabatan', 'u.jabatan_id = jabatan.id');
            $this->db->where('u.nip', $nip);

            return $this->db->get_where()->result_array();
        }
    }
}