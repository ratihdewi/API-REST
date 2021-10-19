<?php
class Disposisi_model extends CI_Model
{
    public function getDispo($nomor_surat=null)
    {
        if($nomor_surat===null){
            $this->db->select('u.id, u.name, app.surat_id, app.approved_at, app.file_lampiran, app.user_id, memo.perihal, memo.nomor_surat, dispo.from_user_id, dispo.tgl_disposisi, dispo.dari');
            $this->db->from('users as u');
            $this->db->join('approval_sins as app', 'u.id = app.user_id');
            $this->db->join('sin_memorandums as memo', 'app.surat_id = memo.id');
            $this->db->join('disposisis as dispo', 'app.surat_id = dispo.surat_id', 'u.id = dispo.from_user_id');
           
            return $this->db->get()->result_array();
        } else{
            $this->db->select('u.id, u.name, app.surat_id, app.approved_at, app.file_lampiran, app.user_id, memo.perihal, memo.nomor_surat, dispo.from_user_id, dispo.tgl_disposisi, dispo.dari');
            $this->db->from('users as u');
            $this->db->join('approval_sins as app', 'u.id = app.user_id');
            $this->db->join('sin_memorandums as memo', 'app.surat_id = memo.id');
            $this->db->join('disposisis as dispo', 'app.surat_id = dispo.surat_id', 'u.id = dispo.from_user_id');
            $this->db->where('memo.nomor_surat', $nomor_surat);

            return $this->db->get_where()->result_array();
        }
    }
}