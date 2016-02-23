<?php
class OutworkManage extends MY_Controller
{

		function __construct()
	{
		parent::__construct();
		$this->load->model('outwork_model');
		$this->load->helper('url');
		$this->load->helper('common');

	}

	public function index(){
		header("Content-Type:text/html; charset=utf-8");
		if($this->input->is_ajax_request()){
			$page=$_GET["currentpage"];
			$data["status"]=1;
			$list=$this->outwork_model->paging("item_outwork",$data,10,$page*10);
			for($i=0;$i<count($list["listrows"]);$i++){
				$list["listrows"][$i]["id"]=appendsign($list["listrows"][$i]["id"], 4, "WS");
			}
			ajaxReturn($list,"外事项目列表",1);
		}else
		{
			$this->load->view("outwork_manage");
		}
		//$this->assign('module',"外事项目列表");
		
	}
       /**
        * 外事项目类型添加
        * @return [type] [description]
        */
	public function outworkItemClassAdd(){
		header("Content-Type:text/html; charset=utf-8");
		    $data["name"]=$_POST["name"];
			$result=$this->outwork_model->add_class($data);
			if($result===false){
				ajaxReturn("","新增失败",0);
			}else{
				ajaxReturn($result,"新增成功",1);
			}
	}
	/**
	 * 项目类型列表
	 * @return [type] [description]
	 */
	public function itemClassList(){
		header("Content-Type:text/html; charset=utf-8");
		if($this->input->is_ajax_request()){
			$page=$_GET["currentpage"];
			$list=$this->outwork_model->paging("item_flag","",10,$page*10);
			ajaxReturn($list,"外事项目类型",1);
		}else
		{
		//$this->assign('module',"外事项目类别列表");
		$this->load->view("outwork_class");
		}

	}
	/**
	 * 项目类型搜索
	 * @return [type] [description]
	 */
	public function itemClassSearch(){
		header("Content-Type:text/html; charset=utf-8");
		if($this->input->is_ajax_request()){
			$page=$_GET["currentpage"];
			$data="status =1 and  name like '%".$_GET["searchtext"]."%'";
			$list=$this->outwork_model->paging("item_flag",$data,10,$page*10);
			ajaxReturn($list,"制作部类型",1);
		}
	}
	
	/**
	 * 项目类型删除
	 * @return [type] [description]
	 */
	public function itemClassDelete(){
		header("Content-Type:text/html; charset=utf-8");
			$data["item_flag"]=$_GET["name"];
			$result=$this->outwork_model->check_exist($data);
			if($result===false){
				ajaxReturn("","查询错误",0);
			}else{
			    if($result===1){
                 $delete["id"]=$_GET["id"];
                 $this->outwork_model->delete_class($delete);
                 if($result===false){
                 	ajaxReturn("","删除失败",0);
                 }else{
                 	ajaxReturn("","删除成功",1);
                 }
			    }else{
			    	ajaxReturn("","该类型已使用，不能删除",0);
			    }
			}
	}
	/**
	 * 项目类型更新
	 * @return [type] [description]
	 */
	public function outworkItemClassup(){
		header("Content-Type:text/html; charset=utf-8");
	        $data["name"]=$_POST["name"];
	        $where["id"]=$_POST["id"];
			$result=$this->outwork_model->update_class($where,$data);
			if($result===false){
				ajaxReturn('',"更新失败",0);
			}else{
				ajaxReturn($result,"更新成功",1);
			}
		
	}
	/**
	 * 项目类型信息
	 * @return [type] [description]
	 */
	public function itemClassInfo(){
		header("Content-Type:text/html; charset=utf-8");
		//$data["status"]=1;
		$result=$this->outwork_model->get_classs_info("","name");
		$result2=$this->outwork_model->get_item_maxid("id");
		if($result===false||$result2===false){
			ajaxReturn("","错误",0);
		}else{
			//var_dump($result2);
			$list[0]=$result;
			$list[1]=$result2[0]["id"]+1;
			$list[2]=appendsign($result2[0]["id"]+1,4,"WS");
			ajaxReturn($list,"制作项目类别列表",1);
		}
	}
	/**
	 * 项目详细信息
	 * @return [type] [description]
	 */
	public function outworkItemInfo(){
		header("Content-Type:text/html; charset=utf-8");
			$data["id"]=cancelsign($_GET["id"], 2);
			$data["status"]=1;
			$result=$this->outwork_model->get_item_info($data,"*");
			if($result==false){
				ajaxReturn('',"查询错误",0);
			}else{
				$result[1]=$result[0]["id"];
				$result[0]["id"]=appendsign($result[0]["id"], 4, "WS");
				ajaxReturn($result,"项目信息",1);
			}
	}
	
	/**
	 * 项目删除
	 * @return [type] [description]
	 */
	public function outworkItemDelete(){
		header("Content-Type:text/html; charset=utf-8");
			$where["id"]=$_GET["id"];
			$data["status"]=0;
			$result=$this->outwork_model->delete_item($where,$data);
			if($result==false){
				ajaxReturn($result,"删除失败",0);
			}else{
				ajaxReturn($result,"删除成功",1);
			}
		
	}
	/**
	 * 项目信息更新
	 * @return [type] [description]
	 */
	public function outworkItemup(){
		header("Content-Type:text/html; charset=utf-8");
			//$production=D("Item/ItemOutwork");
			//$production->create();
			$where["id"]=$_POST["id"];
			$data["item_flag"]=$_POST["item_flag"];
		     $data["name"]=$_POST["name"];
		      $data["expiretime"]=$_POST["expiretime"];
		        $data["adminremark"]=$_POST["adminremark"];
			   $data["status"]=$_POST["status"];
			$result=$this->outwork_model->update_item($where,$data);
			if($result===false){
				ajaxReturn($result,"更新失败",0);
			}else{
				ajaxReturn($result,"更新成功",1);
			}
	}
	/**
	 * 新增项目
	 * @return [type] [description]
	 */
	public function outworkItemAdd(){
		header("Content-Type:text/html; charset=utf-8");
		    $data["item_flag"]=$_POST["item_flag"];
		     $data["name"]=$_POST["name"];
		      $data["expiretime"]=$_POST["expiretime"];
			$result=$this->outwork_model->add_item($data);
			if($result==false){
				ajaxReturn($result,"新增失败",0);
			}else{
			     ajaxReturn($result,"新增成功",1);
			}
	}
	/**
	 * 当前项目信息
	 * @return [type] [description]
	 */
	public function itemInfo(){
		header("Content-Type:text/html; charset=utf-8");
			$data["id"]=cancelsign($_GET["id"], 2);
			$data["status"]=1;
			$result=$this->outwork_model->get_item_info($data,"*");
			if($result==false){
				ajaxReturn($result,"服务器未响应",0);
			}else{
				$result[1]=$result[0]["id"];
				$result[0]["id"]=appendsign($result[0]["id"], 4, "WS");
				ajaxReturn($result,"项目信息",1);
			}
	}
    /**
     * 项目搜索
     * @return [type] [description]
     */
	public function outworkItemSearch(){
		header("Content-Type:text/html; charset=utf-8");
			$page=$_GET["currentpage"];
			$data="status =1 and  name like '%".$_GET["searchtext"]."%'";
			$rolelist=$this->outwork_model->paging("item_outwork",$data,10,$page*10);
			for($i=0;$i<count($rolelist["listrows"]);$i++){
				$rolelist["listrows"][$i]["id"]=appendsign($rolelist["listrows"][$i]["id"], 4, "WS");
			}
			ajaxReturn($rolelist,"项目列表",1);
	}


}