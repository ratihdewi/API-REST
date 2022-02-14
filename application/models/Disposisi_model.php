<?php

class Disposisi_model extends CI_Model
{
    public function getDispo($nomor_surat=null){
        if($nomor_surat===null){
            $this->db->select('app.user_id, u.name, app.surat_id, memo.no_registrasi, app.approved_at, app.file_lampiran,  memo.perihal, memo.nomor_surat, memo.klasifikasi_id, klasifikasi.jenis_arsip, dispo.from_user_id, dispo.tgl_disposisi, dispo.dari, disposisi.name as disposisi, jabatans.nama_jabatan, klasifikasi.kode');
            $this->db->from('users as u');
            $this->db->join('approval_sins as app', 'u.id = app.user_id');
            $this->db->join('sin_memorandums as memo', 'app.surat_id = memo.id');
            $this->db->join('disposisis as dispo', 'app.surat_id = dispo.surat_id');
            $this->db->join('users as disposisi','disposisi.id = dispo.from_user_id');
            $this->db->join('jabatans as jabatans', 'disposisi.jabatan_id = jabatans.id');
            $this->db->join('klasifikasi_permasalahans as klasifikasi', 'klasifikasi.id=memo.klasifikasi_id');
            // $this->db->join('notifications as notif', 'u.id = notif.id');
            $this->db->like('klasifikasi.kode', 'BJ');
            $this->db->order_by('tgl_surat', 'desc');
            // $this->db->like('notif.data', '273');
            return $this->db->get()->result_array();
        } else{
            $this->db->select('app.user_id, u.name, app.surat_id, memo.no_registrasi, app.approved_at, app.file_lampiran,  memo.perihal, memo.nomor_surat, memo.klasifikasi_id, klasifikasi.jenis_arsip, dispo.from_user_id, dispo.tgl_disposisi, dispo.dari, disposisi.name as disposisi, jabatans.nama_jabatan, klasifikasi.kode');
            $this->db->from('users as u');
            $this->db->join('approval_sins as app', 'u.id = app.user_id');
            $this->db->join('sin_memorandums as memo', 'app.surat_id = memo.id');
            $this->db->join('disposisis as dispo', 'app.surat_id = dispo.surat_id');
            $this->db->join('users as disposisi','disposisi.id = dispo.from_user_id');
            $this->db->join('jabatans as jabatans', 'disposisi.jabatan_id = jabatans.id');
            $this->db->join('klasifikasi_permasalahans as klasifikasi', 'klasifikasi.id=memo.klasifikasi_id');
            // $this->db->join('notifications as notif', 'u.id = notif.id');
            $this->db->like('klasifikasi.kode', 'BJ');
            $this->db->order_by('tgl_surat', 'desc');
            // $this->db->where_in('memo.klasifikasi_id', $klasifikasi);
            $this->db->where('memo.nomor_surat', $nomor_surat);

            return $this->db->get_where()->result_array();
        }
    }

    public function deleteDispo($id){
        $this->db->delete('sin_memorandums', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createDispo($data)
    {
        $this->db->insert('sin_memorandums', $data);
        return $this->db->affected_rows();
    }

    public function updateDispo($data, $id){
        $this->db->update('sin_memorandums', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}