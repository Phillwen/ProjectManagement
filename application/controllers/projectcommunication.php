<?php
//项目系统对外通信控制器
class ProjectCommunication extends CI_Controller
{
  function __construct()
	{
		parent::__construct();
		$this->load->helper("common");
		$this->load->model("outwork_model");
		$this->load->model("production_model");
	}
    /**
     * 获取项目列表
     * @return [type] [description]
     */
	public function getProjectList()
	{
		header("Content-Type:text/html; charset=utf-8");
		$checked=false;
		$data=$_REQUEST["flag"];
		switch($data){
			case 'Outwork':
			    $checked=true;
				break;
			case 'Production':
			    $checked=true;
				break;
			default:
			echo 0;
				break;
		}
		if($checked)
		{
			$result;
			$where="";
			$select="*";
			if($data=="Outwork")
			{
				 if(isset($_REQUEST["where"]))
				 {
				 	$where=$_REQUEST["where"];
				 }
				 if(isset($_REQUEST["select"]))
				 {
				 	$select=$_REQUEST["select"];
				 }
				$result=$this->outwork_model->get_item_info($where,$select);
				//var_dump(1);
				    if($result==false)
			       {
				      echo 1;
			       }else
			       {
				      echo json_encode($result);
			       }
			}else if($data=="Production")
			{
				 if(isset($_REQUEST["where"]))
				 {
				 	$where=$_REQUEST["where"];
				 }
				  if(isset($_REQUEST["select"]))
				 {
				 	$select=$_REQUEST["select"];
				 }
				 $result=$this->production_model->get_production_info($where,$select);
				 if($result==false)
			       {
				      echo 1;
			       }else
			       {
				      echo json_encode($result);
			       }
			}
		}
	}
}