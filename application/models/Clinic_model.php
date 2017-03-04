<?php

class Clinic_Model extends CI_Model {

    var $column_order = array('clinicID','clinicName',null); //set column field database for datatable orderable
    var $column_search = array('clinicName'); //set column field database for datatable searchable just firstname ,

	function getClinicList($start,$limit) //$num=10, $start=0
	{		
		$this->db->select('*'); 
		$this->db->from('tbl_cyberits_m_clinics a');
		
		if($limit!=null || $start!=null){
			$this->db->limit($limit, $start);
		}
		$this->db->order_by('a.clinicName','asc');
		
		$query = $this->db->get();
		return $query->result_array();
	}

    function getClinicListData ($superUserID,$searchText,$orderByColumnIndex,$orderDir, $start,$limit){
        $this->_dataClinicQuery($searchText,$orderByColumnIndex,$orderDir);
        $this->db->where('a.createdBy',$superUserID);
        // LIMIT
        if($limit!=null || $start!=null){
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result_array();

    }

    function count_filtered($superUserID,$searchText){
        $this->_dataClinicQuery($searchText,null,null);
        $this->db->where('a.createdBy',$superUserID);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($superUserID){
        $this->db->from("tbl_cyberits_m_clinics a");
        $this->db->where('a.createdBy',$superUserID);

        return $this->db->count_all_results();
    }

    function _dataClinicQuery($searchText,$orderByColumnIndex,$orderDir){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_clinics a');

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

    function getClinicByName($name, $isEdit, $old_data){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_clinics a');
        $this->db->where('clinicName',$name);
        $this->db->where('a.createdBy',$this->session->userdata('superUserID'));
        if($isEdit){
            $this->db->where('clinicName != ', $old_data);
        }
        $query = $this->db->get();
        return $query->row();
    }

    function getClinicByID($id){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_clinics a');
        $this->db->where('clinicID',$id);
        $this->db->where('a.createdBy',$this->session->userdata('superUserID'));
        $this->db->where('a.isActive',1);
        $query = $this->db->get();
        return $query->row();
    }

    function getClinicByUserID($id){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_clinics a');
        $this->db->where('userID',$id);
        $this->db->where('a.createdBy',$this->session->userdata('superUserID'));
        $this->db->where('a.isActive',1);
        $query = $this->db->get();
        return $query->row();
    }

    function getClinicByPlaceID($id){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_clinics a');
        $this->db->where('placeID',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function getClinicByUserID_Mobile($id){
        $this->db->select('*');
        $this->db->from('tbl_cyberits_m_clinics a');
        $this->db->where('a.clinicID',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function createClinic($data){
        $this->db->insert('tbl_cyberits_m_clinics',$data);	
		$result=$this->db->affected_rows();
		return $result;
    }
    
   	function updateClinic($data,$id){
		$this->db->where('clinicID',$id);
		$this->db->update('tbl_cyberits_m_clinics',$data);
		$result=$this->db->affected_rows();
		return $result;
	}
    
    function deleteClinic($id){
    	$this->db->where('clinicID',$id);
        $this->db->delete('tbl_cyberits_m_clinics');
	}
}