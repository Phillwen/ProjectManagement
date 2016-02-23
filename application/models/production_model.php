<?php
class Production_model extends CI_model {
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

	
	public function get_production_list($sql)
	{
  //     	if($where!=""){
		// $this->db->where($where);
  //       }
		// $this->db->select($select);
		$query=$this->db->query($sql);
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
    public function get_priduction_maxid($where)
    {
    	$this->db->where($where);
    	$this->db->select_max("id");
		$query=$this->db->get("item_production");
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

    public function get_production_info($where,$select="")
	{
		if($where!=""){
			$this->db->where($where);
		}
        if($select!=""){
            $this->db->select($select);
        }
		
		$query=$this->db->get("item_production");
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

	public function get_calss_info($where,$select="")
	{
		if($where!=""){
			$this->db->where($where);
		}
		 if($select!=""){
            $this->db->select($select);
        }
		$query=$this->db->get("item_class");
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


	public function get_prefix_info($where,$select="")
	{
		if($where!=""){
			$this->db->where($where);
		}
		if($select!=""){
            $this->db->select($select);
        }
		$query=$this->db->get("item_prefix");
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
	/**
	 * 验证数据是否存在
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function check_exist($data)
     {
     	  $this->db->where($data);
     		$query=$this->db->get("item_production");
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

     /**
	 * 验证数据是否存在
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function check_unique($table,$data)
     {
     	$this->db->where($data);
     		$query=$this->db->get($table);
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


     public  function delete_class($where)
     {
     	$query=$this->db->delete("item_class",$where);
     	if($query)
     		return true;
     	else
     		return false;
     }

  public function add_production_items($data)
     {
     	$query=$this->db->insert("item_production",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }

      public function add_production_class($data)
     {
     	$query=$this->db->insert("item_class",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }

       public function add_production_prefix($data)
     {
     	$query=$this->db->insert("item_prefix",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }
      public function update_production_items($where,$data)
     {
     	$this->db->where($where);
     	$query=$this->db->update("item_production",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }
       public function update_production_class($where,$data)
     {
     	$this->db->where($where);
     	$query=$this->db->update("item_class",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }
       public function update_production_prefix($where,$data)
     {
     	$this->db->where($where);
     	$query=$this->db->update("item_prefix",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }
     public function delete_production_items($where,$data)
     {
     	$this->db->where($where);
     	$query=$this->db->update("item_production",$data);
     	if($query)
     		return true;
     	else
     		return false;
     }
      public function delete_production_class($where)
     {
     	$query=$this->db->delete("item_class",$where);
     	if($query)
     		return true;
     	else
     		return false;
     }

        public function delete_production_prefix($where)
     {
     	$query=$this->db->delete("item_prefix",$where);
     	if($query)
     		return true;
     	else
     		return false;
     }



    public function get_customer_info($where,$select="")
    {
    	if($where!=""){
			$this->db->where($where);
		}
		if($select!=""){
            $this->db->select($select);
        }
		$query=$this->db->get("customer");
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