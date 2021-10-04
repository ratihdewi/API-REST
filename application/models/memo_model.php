<?php

class memo_model extends CI_Model
{
    public function getMemo($nomor_surat=null){
        if($nomor_surat===null){
            $this->db->select('u.id, u.name, app.surat_id, app.approved_at, app.file_lampiran, memo.perihal, memo.nomor_surat');
            $this->db->from('users as u');
            $this->db->join('approval_sins as app', 'u.id = app.user_id');
            $this->db->join('sin_memorandums as memo', 'app.surat_id = memo.id');
           
            return $this->db->get()->result_array();
        } else{
            $this->db->select('u.id, u.name, app.surat_id, app.approved_at, app.file_lampiran, memo.perihal, memo.nomor_surat');
            $this->db->from('users as u');
            $this->db->join('approval_sins as app', 'u.id = app.user_id');
            $this->db->join('sin_memorandums as memo', 'app.surat_id = memo.id');
            $this->db->where('memo.nomor_surat', $nomor_surat);

            return $this->db->get_where()->result_array();
        }
    }

    // public function getMemo($nomor_surat=null , $klasifikasi_id=null){
    //      $this->db->select('u.id, u.name, app.surat_id, app.approved_at, app.file_lampiran, memo.perihal, memo.nomor_surat, memo.klasifikasi_id');
    //     $this->db->from('users as u');
    //     $this->db->join('approval_sins as app', 'u.id = app.user_id');
    //     $this->db->join('sin_memorandums as memo', 'app.surat_id = memo.id');
        
    //     if($nomor_surat===null){
    //         $this->db->where('memo.nomor_surat', $nomor_surat);
    //     }
        
    //     if($klasifikasi_id===null){
    //         $this->db->where('memo.klasifikasi_id', $klasifikasi_id);
    //     }
        
    //     return $this->db->get_where()->result_array();            
    // }

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