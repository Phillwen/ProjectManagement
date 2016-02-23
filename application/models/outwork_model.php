<?php
class Outwork_model extends CI_model {
//em_outdoor_email 表
	public function __construct()
	{
		$this->load->database();
	}

	Public function paging($table,$data,$limit,$offset,$order="id asc")
	{
		$query;
		$count;
          $this->db->order_by($order);
		if($data!=""){
			$query=$this->db->get_where($table,$data,$limit,$offset);
			$count = $this->db->get_where($table,$data); 
		}
		else{
			$query=$this->db->get($table,$limit,$offset);
			$count=$this->db->get($table);
		}
		if($query->num_rows() > 0&&$count->num_rows() > 0)
		{
			$result["count"]=$count->num_rows();
			$result["listrows"]=$query->result_array();
			return $result;
		}
	} 

     public function add_class($data)
     {
     	$query=$this->db->insert("item_flag",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }

     public function check_exist($data)
     {
     		$query=$this->db->get("item_outwork",$data);
     		if($query)
     		{
     			if($query->num_rows()>0)
     			{
     				return 0;
     			}else
     			{
     				return 1;
     			}
     		}else
     		{
     			return false;
     		}
     }

     public function delete_class($data)
     {
     	$query=$this->db->delete("item_flag",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }

	public function update_class($where,$data)
	{
		$this->db->where($where);
		$query=$this->db->update("item_flag",$data);
		if($query)
     		return true;
     	else
     		return false;
	}
	public function get_classs_info($where,$select)
	{
		if($where!=""){
		$this->db->where($where);
        }
		$this->db->select($select);
		$query=$this->db->get("item_flag");
		if($query)
     		{
     			if($query->num_rows()>0)
     			{
     				$result=$query->result_array();
     				return $result;
     			}else
     			{
     				return 0;
     			}
     		}else
     		{
     			return false;
     		}
	}

	public function get_classs_list($select)
	{
		$this->db->select($select);
		$query=$this->db->get("item_flag");
		if($query)
     		{
     			if($query->num_rows()>0)
     			{
     				$result=$query->result_array();
     				return $result;
     			}else
     			{
     				return 0;
     			}
     		}else
     		{
     			return false;
     		}
	}

	public function get_item_info($where,$select)
	{
		if($where!="")
		{
			$this->db->where($where);
		}
		$this->db->select($select);
		$query=$this->db->get("item_outwork");
		if($query)
     		{
     			if($query->num_rows()>0)
     			{
     				$result=$query->result_array();
     				return $result;
     			}else
     			{
     				return 0;
     			}
     		}else
     		{
     			return false;
     		}
	}

	public function get_item_maxid($data)
	{
		$this->db->select_max("id");
		$query=$this->db->get("item_outwork");
		if($query)
     		{
     			if($query->num_rows()>0)
     			{
     				$result=$query->result_array();
     				return $result;
     			}else
     			{
     				return 0;
     			}
     		}else
     		{
     			return false;
     		}
	}

	 public function delete_item($where,$data)
     {
     	$this->db->where($where);
     	$query=$this->db->update("item_outwork",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }

      public function update_item($where,$data)
     {
     	$this->db->where($where);
     	$query=$this->db->update("item_outwork",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }

      public function add_item($data)
     {
     	$query=$this->db->insert("item_outwork",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }

     public function add_remark($data)
     {
     		$query=$this->db->insert("item_remark",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }

     public function get_view_list()
     {
          if($where!="")
          {
               $this->db->where($where);
          }
          $this->db->select($select);
          $query=$this->db->get("item_outwork");
          if($query)
               {
                    if($query->num_rows()>0)
                    {
                         $result=$query->result_array();
                         return $result;
                    }else
                    {
                         return 0;
                    }
               }else
               {
                    return false;
               }
     }
}