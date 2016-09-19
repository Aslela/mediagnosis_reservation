<?php

class Additional_condition_model extends CI_Model {

    function getAdditionalConditionAutocomplete($search_name){
        $this->db->select('additionalConditionText, additionalConditionID');
        $this->db->from('tbl_cyberits_m_additional_condition a');
        $this->db->like('a.additionalConditionText', $search_name);

        $this->db->limit(10);

        $query = $this->db->get();
        return $query->result_array();
    }

    function createPoli($data){
        $this->db->insert('tbl_cyberits_m_poli',$data);
        $result=$this->db->affected_rows();
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