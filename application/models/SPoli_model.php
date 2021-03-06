<?php

class SPoli_Model extends CI_Model {

    function getSettingDetailPoli($sClinicID, $superUserID=""){
		$this->db->select('*');
        $this->db->from('tbl_cyberits_s_poli a');
		$this->db->join('tbl_cyberits_m_doctors b', 'a.doctorID = b.doctorID');
        $this->db->where('a.sClinicID',$sClinicID);

        // Check Role
        $role = $this->session->userdata('role');
        if($role != "mediagnosis_admin"){
            $superUserID = $this->session->userdata('superUserID');
        }
        $this->db->where('a.createdBy',$superUserID);

        $this->db->order_by('b.doctorName','asc');
        $query = $this->db->get();
		return $query->result_array();
	}

    function getSettingHeaderPoli($sClinicID){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_s_clinic a');
        $this->db->join('tbl_cyberits_m_clinics c', 'a.clinicID = c.clinicID');
        $this->db->join('tbl_cyberits_m_poli b', 'a.poliID = b.poliID');
        $this->db->where('a.sClinicID',$sClinicID);
        $query = $this->db->get();
        return $query->row();
    }

    function getPatientLookupData($clinicID){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_patients a');
        $this->db->where('a.clinicID',$clinicID);
        $query = $this->db->get();
        return $query->result_array();
    }
	
    function createSettingPoli($data){
        $this->db->insert('tbl_cyberits_s_poli',$data);
		$result=$this->db->affected_rows();
		return $result;
    }
    
   	function updateSettingPoli($poliID,$doctorID,$data){
		$this->db->where('poliID',$poliID);
		$this->db->where('doctorID',$doctorID);
		$this->db->update('tbl_cyberits_s_poli',$data);
		$result=$this->db->affected_rows();
		return $result;
	}
    
    function deleteSettingPoli($sClinicID,$doctorID){
        $this->db->where('sClinicID',$sClinicID);
        $this->db->where('doctorID',$doctorID);
        $this->db->delete('tbl_cyberits_s_poli');
	}
	
	function getDoctorPoliByClinicID($clinicID){
		$this->db->select('d.doctorID, d.doctorName, b.poliName');
        $this->db->from('tbl_cyberits_s_clinic a');
        $this->db->join('tbl_cyberits_m_poli b', 'a.poliID = b.poliID');
		$this->db->join('tbl_cyberits_s_poli c', 'c.sClinicID = a.sClinicID');
		$this->db->join('tbl_cyberits_m_doctors d', 'd.doctorID = c.doctorID');
        $this->db->where('a.clinicID',$clinicID);
        $this->db->where('a.isActive',1);
        $query = $this->db->get();
        return $query->result_array();
	}
}