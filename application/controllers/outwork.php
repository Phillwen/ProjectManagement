<?php
class Outwork extends MY_Controller
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
		//$this->assign("module","外事项目列表");
		$this->load->view("outwork_index");
	}
	/**
	 * 外事项目内容更新
	 * @return [type] [description]
	 */
	public function outworkitemup(){
		header("Content-Type:text/html; charset=utf-8");
			$date=date("Y-m-d G:i:s");
			$dataup["remark"]=$_POST["remark"];
			$dataup["contents"]=$_POST["contents"];
			$dataadd["remark"]=$_POST["remark"];
			$dataadd["name"]=$_POST["name"];
			$id=cancelsign($_POST["id"], 2);
			$dataadd["item_flag"]=$_POST["flag"];
			$data["id"]=$id;
			$dataadd["item_id"]=$id;
			$dataadd["time"]=$date;
			$upresult=$this->outwork_model->update_item($data,$dataup);
			$addresult=$this->outwork_model->add_remark($dataadd);
			if ($upresult!==false&&$addresult!=false){
	// 提交事务
				ajaxReturn('',"更新成功",1);
			}else{
		// 事务回滚
				ajaxReturn('',"更新失败",0);
			} 
			
		
	}
	/**
	 * 外事项目列表
	 * @return [type] [description]
	 */
	public function outworkitemlist(){
		header("Content-Type:text/html; charset=utf-8");
			$page=$_GET["currentpage"];
			$data["status"]=1;
			$list=$this->outwork_model->paging("item_outwork",$data,10,$page*10);
			for($i=0;$i<count($list["listrows"]);$i++){
				$list["listrows"][$i]["id"]=appendsign($list["listrows"][$i]["id"], 4, "WS");
			}
			ajaxReturn($list,"外事项目列表",1);
			
	}
	/**
	 * 外事工作类型列表
	 * @return [type] [description]
	 */
	public function itemflaglist(){
		header("Content-Type:text/html; charset=utf-8");
			$result=$this->outwork_model->get_classs_list("name");
			if($result==false){
				ajaxReturn($result,"服务器未响应",0);
			}else{
				ajaxReturn($result,"外事项目类别列表",1);
			}
	}
	/**
	 * 外事工作类型选择
	 * @return [type] [description]
	 */
	public function  outworkflagselect(){
		header("Content-Type:text/html; charset=utf-8");
			$page=$_GET["currentpage"];
			$data["status"]=1;	
			$flag= $_GET["searchtext"];
			if($flag=="全部"){
				$list=$this->outwork_model->paging("item_outwork",$data,10,$page*10);
				ajaxReturn($list,"用户组列表",1);
			}else{
				$data['item_flag']=$flag;
				$list=$this->outwork_model->paging("item_outwork",$data,10,$page*10);
					for($i=0;$i<count($list["listrows"]);$i++){
				      $list["listrows"][$i]["id"]=appendsign($list["listrows"][$i]["id"], 4, "WS");
			         }
				ajaxReturn($list,"用户组列表",1);
			}
			
	}
	/**
	 * 外事项目搜索
	 * @return [type] [description]
	 */
	public function outworkitemsearch(){
		header("Content-Type:text/html; charset=utf-8");
			$page=$_GET["currentpage"];
			$data["status"]=1;
			$or["item_flag"]=array('like', "%".$_GET["searchtext"]."%");
			$or["name"]=array('like', "%".$_GET["searchtext"]."%");
			$or["id"]=array('like', "%".$_GET["searchtext"]."%");
			$data="status =1 and (item_flag like '%".$_GET["searchtext"]."%' or name like '%".$_GET["searchtext"]."%' or id like '%".$_GET["searchtext"]."%')";
			$list=$this->outwork_model->paging("item_outwork",$data,10,$page*10);
			for($i=0;$i<count($list["listrows"]);$i++){
				      $list["listrows"][$i]["id"]=appendsign($list["listrows"][$i]["id"], 4, "WS");
			         }
			ajaxReturn($list,"用户组列表",1);
	}
	/**
	 * 备注列表
	 * @return [type] [description]
	 */
	public function remarklist(){
		header("Content-Type:text/html; charset=utf-8");
		if($this->input->is_ajax_request()){
			$page=$_GET["currentpage"];
			$data["status"]=1;	
			$list=$this->outwork_model->paging("item_remark",$data,10,$page*10);
	                for($i=0;$i<count($list["listrows"]);$i++){
				      $list["listrows"][$i]["item_id"]=appendsign($list["listrows"][$i]["item_id"], 4, "WS");
			         }
			ajaxReturn($list,"用户组列表",1);
		}else
		{
			$this->load->view("outwork_remark");
		}
		//$this->assign("module","备注列表");
		//$this->display("remark");
	}
		/**
		 * 备注信息搜索
		 * @return [type] [description]
		 */
		public function remarksearch(){
			header("Content-Type:text/html; charset=utf-8");
				$page=$_GET["currentpage"];
		        $data="status =1 and (item_flag like '%".$_GET["searchtext"]."%' or name like '%".$_GET["searchtext"]."%' or id like '%".$_GET["searchtext"]."%')";
				$list=$this->outwork_model->paging("item_remark",$data,10,$page*10);
				 for($i=0;$i<count($list["listrows"]);$i++){
				      $list["listrows"][$i]["item_id"]=appendsign($list["listrows"][$i]["item_id"], 4, "WS");
			         }
				ajaxReturn($list,"用户组列表",1);
		
		}
			/**
			 * 项目备注筛选
			 * @return [type] [description]
			 */
			public function remarkflagselect(){		
				header("Content-Type:text/html; charset=utf-8");
		
					$page=$_GET["currentpage"];
					$data["status"]=1;
					$flag= $_GET["searchtext"];
					$list;
					if($flag=="全部"){
						$list=$this->outwork_model->paging("item_remark",$data,10,$page*10);
					}else{
						$data['item_flag']=$flag;
						$list=$this->outwork_model->paging("item_remark",$data,10,$page*10);
					}
				     for($i=0;$i<count($list["listrows"]);$i++){
				      $list["listrows"][$i]["item_id"]=appendsign($list["listrows"][$i]["item_id"], 4, "WS");
			         }
					ajaxReturn($list,"用户组列表",1);
					
				
				
			}
	/**
	 * 生成PDF项目清单
	 * @return [type] [description]
	 */
	public function itemlistpdf(){
		header("Content-Type:text/html; charset=utf-8");
		date_default_timezone_set("Etc/GMT-8");
		$time=date("Y-m-d G:i:s");
		$data["item_flag"]=$_GET["flag"];
		$data["status"]=1;
		if($data["item_flag"]!="全部"){
			$result=$this->outwork_model->get_item_info($data,"*");
			if($result==false){
				$this->error("1");
			}else{
			$itemlist="";
			$itemhtml=array();
		  	for($i=0;$i<count($result);$i++)
		            {
				      $result[$i]["id"]=appendsign($result[$i]["id"], 4, "WS");
				$itemlist=$itemlist."<tr><td width=\"65\">".($i+1)."</td><td width=\"80\">".$result[$i]["id"]."</td><td width=\"160\">".$result[$i]["name"]."</td><td width=\"100\">".($result[$i]["expiretime"]=='0000-00-00'?'-':$result[$i]["expiretime"])."</td>".pdfStralign($result[$i]["contents"],10,160)."".pdfStralign($result[$i]["remark"],10,160)."</tr>";
				if(($i+1)%25==0){
					array_push($itemhtml,$itemlist);
					$itemlist="";
				}
			}
			array_push($itemhtml,$itemlist);
			$pdf=outworkitempdf2($itemhtml,$_GET["flag"],$time);
			if($pdf==true){
				ajaxReturn("PDF制作成功","类型",1);
			}
		}
		}else{
			$result=$this->outwork_model->get_item_info("","*");
			if($result==false){
				$this->error("1");
			}else{
				$itemlist="";
				$itemhtml=array();
					for($i=0;$i<count($result);$i++)
		            {
				      $result[$i]["id"]=appendsign($result[$i]["id"], 4, "WS");
			        
					$itemlist=$itemlist."<tr><td width=\"55\">".($i+1)."</td><td width=\"70\">".$result[$i]["item_flag"]."</td><td width=\"70\">".$result[$i]["id"]."</td><td width=\"150\">".$result[$i]["name"]."</td><td width=\"80\">".($result[$i]["expiretime"]=='0000-00-00'?'-':$result[$i]["expiretime"])."</td>".pdfStralign($result[$i]["contents"],10,150)."".pdfStralign($result[$i]["remark"],10,150)."</tr>";
					if(($i+1)%25==0){
						array_push($itemhtml,$itemlist);
						$itemlist="";
					}
				}
				array_push($itemhtml,$itemlist);
				$pdf=outworkitempdf($itemhtml,$time);
				if($pdf==true){
					ajaxReturn("PDF制作成功","类型",1);
				}
			}
		}
	}
}