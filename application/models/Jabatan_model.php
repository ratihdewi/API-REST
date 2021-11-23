<?php

class Jabatan_model extends CI_Model
{
    public function getJabatan($id=null){
        if($id===null){
            $this->db->select('u.name, jabatan.id, jabatan.nama_jabatan');
            $this->db->from('users as u');
            $this->db->join('jabatans as jabatan', 'u.jabatan_id = jabatan.id');
            $this->db->like('jabatan.nama_jabatan', 'rektor', 'after');
            $this->db->or_like('jabatan.nama_jabatan', 'wakil', 'after');
            $this->db->or_like('jabatan.nama_jabatan', 'dekan', 'after');
            $this->db->or_like('jabatan.nama_jabatan', 'direktur', 'after');
            $this->db->or_like('jabatan.id', 'manajer', 'after');

            return $this->db->get()->result_array();
        } else{
            $this->db->select('u.name, jabatan.id, jabatan.nama_jabatan');
            $this->db->from('users as u');
            $this->db->join('jabatans as jabatan', 'u.jabatan_id = jabatan.id');
            $this->db->like('jabatan.nama_jabatan', 'rektor', 'after');
            $this->db->or_like('jabatan.nama_jabatan', 'wakil', 'after');
            $this->db->or_like('jabatan.nama_jabatan', 'dekan', 'after');
            $this->db->or_like('jabatan.nama_jabatan', 'direktur', 'after');
            $this->db->or_like('jabatan.nama_jabatan', 'manajer', 'after');
            $this->db->where('jabatan.id', $id);

            return $this->db->get_where()->result_array();
        }
    }
}