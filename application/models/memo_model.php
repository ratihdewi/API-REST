<?php

class Memo_model extends CI_Model
{
    public function getMemo($nomor_surat=null){
        if($nomor_surat===null){
            $this->db->select('memo.kepada_id, u.name as kepada, memo.no_registrasi, memo.perihal, memo.dari, memo.nomor_surat, memo.klasifikasi_id, klasifikasi.jenis_arsip,klasifikasi.kode');
            $this->db->from('users as u');
            $this->db->join('sin_memorandums as memo', 'u.id = memo.kepada_id');
            $this->db->join('klasifikasi_permasalahans as klasifikasi', 'klasifikasi.id=memo.klasifikasi_id');
            $this->db->like('klasifikasi.kode', 'BJ');
            return $this->db->get()->result_array();
        } else{
            $this->db->select('memo.kepada_id, u.name, memo.no_registrasi, memo.perihal, memo.dari, memo.nomor_surat, memo.klasifikasi_id, klasifikasi.jenis_arsip, klasifikasi.kode');
            $this->db->from('users as u');
            $this->db->join('sin_memorandums as memo', 'u.id = memo.kepada_id');
            $this->db->join('klasifikasi_permasalahans as klasifikasi', 'klasifikasi.id=memo.klasifikasi_id');
            $this->db->like('klasifikasi.kode', 'BJ');
            $this->db->where('memo.nomor_surat', $nomor_surat);

            return $this->db->get_where()->result_array();
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