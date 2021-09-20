<?php

class sima_model extends CI_Model
{
    public function getMemo($nomor_surat=null){
        if($nomor_surat === null){
            return $this->db->get('sin_memorandums')->result_array();
        }else {
            return $this->db->get_where('sin_memorandums', ['nomor_surat'=>$nomor_surat])->result_array();
        }
        
    }

    public function deleteMemo($id){
        $this->db->delete('sin_memorandums', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createMemo($data)
    {
        $this->db->insert('sin_memorandums', $data);
        return $this->db->affected_rows();
    }

    public function updateMemo($data, $id){
        $this->db->update('sin_memorandums', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}