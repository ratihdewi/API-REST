<?php

class Surat_model extends CI_Model
{
    public function getSurat($nomor_surat=null){
        $klasifikasi = '36bf7435-0a0a-4de4-836c-2155ae0cf156';
        if($nomor_surat===null){
            $this->db->select('u.name,memo.no_registrasi, app.approved_at, app.file_lampiran,  memo.perihal, memo.nomor_surat,klasifikasi.jenis_arsip');
            $this->db->from('users as u');
            $this->db->join('approval_sins as app', 'u.id = app.user_id');
            $this->db->join('sin_memorandums as memo', 'app.surat_id = memo.id');
            $this->db->join('klasifikasi_permasalahans as klasifikasi', 'klasifikasi.id=memo.klasifikasi_id');
           $this->db->where_in('memo.klasifikasi_id', $klasifikasi);
            return $this->db->get()->result_array();
        } else{
            $this->db->select('u.name, memo.no_registrasi, app.approved_at, app.file_lampiran,  memo.perihal, memo.nomor_surat, klasifikasi.jenis_arsip');
            $this->db->from('users as u');
            $this->db->join('approval_sins as app', 'u.id = app.user_id');
            $this->db->join('sin_memorandums as memo', 'app.surat_id = memo.id');
            $this->db->join('klasifikasi_permasalahans as klasifikasi', 'klasifikasi.id=memo.klasifikasi_id');
            $this->db->where_in('memo.klasifikasi_id', $klasifikasi);
            $this->db->where('memo.nomor_surat', $nomor_surat);

            return $this->db->get_where()->result_array();
        }
    }
    
}