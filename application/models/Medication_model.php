<?php

class Medication_model extends CI_Model {

    function getMedicationAutocomplete($search_name){
        $this->db->select('medicationText, medicationID');
        $this->db->from('tbl_cyberits_m_medication a');
        $this->db->like('a.medicationText', $search_name);

        $this->db->limit(10);

        $query = $this->db->get();
        return $query->result_array();
    }

    function checkMedication($search_name){
        $this->db->select('medicationID as id');
        $this->db->from('tbl_cyberits_m_medication a');
        $this->db->where('a.medicationText', $search_name);

        $query = $this->db->get();
        return $query->row();
    }

    function createMedication($data){
        $this->db->insert('tbl_cyberits_m_medication',$data);
        $result=$this->db->insert_id();
        return $result;
    }

    function updatePoli($data,$id){
        $this->db->where('poliID',$id);
        $this->db->update('tbl_cyberits_m_poli',$data);
        $result=$this->db->affected_rows();
        return $result;
    }

    function deletePoli($id){
        $this->db->where('poliID',$id);
        $this->db->delete('tbl_cyberits_m_poli');
    }
}