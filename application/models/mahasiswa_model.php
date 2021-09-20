<?php

class mahasiswa_model extends CI_Model
{
    public function getMahasiswa($id=null){
        if($id === null){
            return $this->db2->get('mahasiswa')->result_array();
        }else {
            return $this->db2->get_where('mahasiswa', ['id'=>$id])->result_array();
        }
        
    }

    public function deleteMahasiswa($id){
        $this->db2->delete('mahasiswa', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createMahasiswa($data)
    {
        $this->db->insert('mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function updateMahasiswa($data, $id){
        $this->db->update('mahasiswa', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}