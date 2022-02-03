<?php
class Staff_model extends CI_Model
{
    public function getStaff($nip=null)
    {
        if($nip === null){
            $this->hris->select('e.name, u.username, e_pt.nip, p.position as nama_jabatan, p.id, u_g.name as user_group, o.org_unit as nama_unit_kerja, o.parent_id, p.org_unit as unit');
            $this->hris->from('employees as e');
            $this->hris->join('employee_pt as e_pt', 'e.id = e_pt.employee_id');
            $this->hris->join('users as u', 'u.id = e_pt.user_id');
            $this->hris->join('employee_position as e_p', 'e.id = e_p.employee_id');
            $this->hris->join('positions as p', 'p.id = e_p.position_id');
            $this->hris->join('user_group as u_g', 'u_g.id = e_pt.group_id');
            $this->hris->join('organizations as o', 'o.id = p.org_unit');
            $this->hris->where('e_pt.status', '1,2');

            return $this->hris->get()->result_array();
        }else{
            $this->hris->select('e.name, u.username, e_pt.nip, p.position as nama_jabatan, p.id, u_g.name as user_group, o.org_unit as nama_unit_kerja, o.parent_id, p.org_unit as unit');
            $this->hris->from('employees as e');
            $this->hris->join('employee_pt as e_pt', 'e.id = e_pt.employee_id');
            $this->hris->join('users as u', 'u.id = e_pt.user_id');
            $this->hris->join('employee_position as e_p', 'e.id = e_p.employee_id');
            $this->hris->join('positions as p', 'p.id = e_p.position_id');
            $this->hris->join('user_group as u_g', 'u_g.id = e_pt.group_id');
            $this->hris->join('organizations as o', 'o.id = p.org_unit');
            $this->hris->where('e_pt.status', '1,2');
            $this->hris->where('e_pt.nip', $nip);

            return $this->hris->get_where()->result_array();
        }
    }
}