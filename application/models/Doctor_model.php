<?php

class Doctor_Model extends CI_Model {

    var $column_order = array('doctorID','doctorName',null); //set column field database for datatable orderable
    var $column_search = array('doctorName'); //set column field database for datatable searchable just firstname ,

	function getDoctorList($start,$limit) //$num=10, $start=0
	{		
		$this->db->select('*'); 
		$this->db->from('tbl_cyberits_m_doctors a');
		
		if($limit!=null || $start!=null){
			$this->db->limit($limit, $start);
		}
		$this->db->order_by('a.doctorName','asc');
		
		$query = $this->db->get();
		return $query->result_array();
	}

    function getDoctorListData ($searchText,$orderByColumnIndex,$orderDir, $start,$limit){
        $this->_dataDoctorQuery($searchText,$orderByColumnIndex,$orderDir);
        $this->db->where('a.createdBy',$this->session->userdata('superUserID'));
        // LIMIT
        if($limit!=null || $start!=null){
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result_array();

    }

    function count_filtered($searchText){
        $this->_dataDoctorQuery($searchText,null,null);
        $this->db->where('a.createdBy',$this->session->userdata('superUserID'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all(){
        $this->db->from("tbl_cyberits_m_doctors a");
        $this->db->where('a.createdBy',$this->session->userdata('superUserID'));
        return $this->db->count_all_results();
    }

    function _dataDoctorQuery($searchText,$orderByColumnIndex,$orderDir){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_doctors a');

        //WHERE
        $i = 0;
        if($searchText != null && $searchText != ""){
            //Search By Each Column that define in $column_search
            foreach ($this->column_search as $item){
                // first loop
                if($i===0){
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $searchText);
                }
                else {
                    $this->db->or_like($item, $searchText);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket

                $i++;
            }
        }

        //Order by
        if($orderByColumnIndex != null && $orderDir != null ) {
            $this->db->order_by($this->column_order[$orderByColumnIndex], $orderDir);
        }
    }

    function getDoctorByName($name, $isEdit, $old_data){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_doctors a');
        $this->db->where('doctorName',$name);
        $this->db->where('a.createdBy',$this->session->userdata('superUserID'));
        if($isEdit){
            $this->db->where('doctorName != ', $old_data);
        }
        $query = $this->db->get();
        return $query->row();
    }

    function getDoctorByID($id){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_doctors a');
        $this->db->where('doctorID',$id);
        $this->db->where('a.createdBy',$this->session->userdata('superUserID'));
        $query = $this->db->get();
        return $query->row();
    }

    function createDoctor($data){
        $this->db->insert('tbl_cyberits_m_doctors',$data);	
		$result=$this->db->affected_rows();
		return $result;
    }
    
   	function updateDoctor($data,$id){
		$this->db->where('doctorID',$id);
		$this->db->update('tbl_cyberits_m_doctors',$data);
		$result=$this->db->affected_rows();
		return $result;
	}
    
    function deleteDoctor($id){
    	$this->db->where('doctorID',$id);
        $this->db->delete('tbl_cyberits_m_doctors');
	}
}