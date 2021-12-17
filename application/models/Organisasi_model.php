<?php

class Organisasi_model extends CI_Model
{
    public function getJabatan($sso_username=null){
        if($sso_username===null){
            $this->db->select('u.name, u.nip, u.sso_username, jabatan.nama_jabatan, jabatan.id, unit.nama_unit_kerja, unit.id as unit, jabatan.parent_id');
            $this->db->from('users as u');
            $this->db->join('jabatans as jabatan', 'u.jabatan_id = jabatan.id');
            $this->db->join('unit_kerjas as unit', 'unit.id = jabatan.unit_kerja_id');

            return $this->db->get()->row();
        } else{
            $this->db->select('u.name, u.nip, u.sso_username, jabatan.nama_jabatan, jabatan.id, unit.nama_unit_kerja, unit.id as unit, jabatan.parent_id');
            $this->db->from('users as u');
            $this->db->join('jabatans as jabatan', 'u.jabatan_id = jabatan.id');
            $this->db->join('unit_kerjas as unit', 'unit.id = jabatan.unit_kerja_id');
            $this->db->where('u.sso_username', $sso_username);

            return $this->db->get_where()->row();
        }
    }
}