<?php
class ProductionManage extends MY_Controller
{
		function __construct()
	{
		parent::__construct();
		$this->load->model('production_model');
		$this->load->helper('url');
		$this->load->helper('common');

	}
	/**
	 * 首页
	 * @return [type] [description]
	 */
	public function index(){
		header("Content-Type:text/html; charset=utf-8");
	    if($this->input->is_ajax_request()){
			$page=$_GET["currentpage"];
			$data["status"]=1;
			$data["prefix_id"]=$_GET["searchtext"];
			$list=$this->production_model->paging("item_production",$data,10,$page*10,"id desc");
			//for($i=0;$i<count($list["listrows"]);$i++){
			//	$list["listrows"][$i]["id"]=appendsign($list["listrows"][$i]["id"], 4, "JB");
			//}
			ajaxReturn($list,"制作部项目列表",1);
		}else{
		//$this->assign('module',"制作项目列表");
		$this->load->view("production_items");
	    }
	}
	/**
	 * 项目信息
	 * @return [type] [description]
	 */
	public function productionItemInfo(){
		header("Content-Type:text/html; charset=utf-8");
		 $this->load->library('Customer_Communication');
        //$result=$this->production_model->get_customer_info($data,"contacts");
      
       $customer=new Customer_Communication();
       //$result=$customer->customerlist("Production",$data);
            
		   // $sql="select em_item_production.*,cm.address,cm.company_name,cm.company_phone,cm.phone,cm.email,cm.website,cm.remark from em_item_production LEFT JOIN em_customer as cm ON em_item_production.contacts=cm.contacts where";
		  //  $sql.=" em_item_production.id='".$_GET["id"]."' and em_item_production.status =1";
			//$data["em_item_production.id"]=$_GET["id"];
			//$data["em_item_production.status"]=1;
			$data["id"]=$_GET["id"];
			$result=$this->production_model->get_production_info($data);
			if($result==false){
					ajaxReturn("","服务器未响应",0);
			}else{
				$data2["contacts"]=$result[0]["contacts"];
				$result2=$customer->projectlist("Production",$data2);
				VAR_DUMP($result2);
				if($result2===0)
				{
					ajaxReturn($result2,"无客户系统访问权限",0);
				}else if($result2==1)
				{
					ajaxReturn($result2,"客户系统未响应",0);
				}else
				{
		       //	var_dump(json_decode($result2,true));
				$result[0]=$result[0]+json_decode($result2,true)[0];
				$result[1]=$result[0]["id"];
				//$result[0]["id"]=appendsign($result[0]["id"],4, "JB");
				$result[0]["quote"]=number_format($result[0]["quote"],2);
				$result[0]["third_party"]=number_format($result[0]["third_party"],2);
				$result[0]["appreciation"]=number_format($result[0]["appreciation"],2);
				ajaxReturn($result,"项目列表",1);
				}
				
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
			$data["status"]=1;
			$list=$this->production_model->paging("item_class",$data,10,$page*10);
			ajaxReturn($list,"制作部类型",1);
		}else{
		//$this->assign('module',"制作项目类别列表");
		$this->load->view("production_class");
	    }
	}
    /**
     * 项目前缀
     * @return [type] [description]
     */
	public function itemPrefixList(){
		header("Content-Type:text/html; charset=utf-8");
		if($this->input->is_ajax_request()){
			$page=$_GET["currentpage"];
			$data["status"]=1;
			$list=$this->production_model->paging("item_prefix",$data,10,$page*10);
			ajaxReturn($list,"制作部类型",1);
		}else{
			//$this->assign('module',"制作工作类别列表");
		     $this->load->view("production_prefix");
	    }

	}
	/**
	 * 项目类型搜索
	 * @return [type] [description]
	 */
	public function itemClassSearch(){
		header("Content-Type:text/html; charset=utf-8");
			$page=$_GET["currentpage"];
			$data="status =1 and name like '%".$_GET["searchtext"]."%'";
			$list=$this->production_model->paging("item_class",$data,10,$page*10);
			ajaxReturn($list,"制作部类型",1);
	}
	/**
	 * 项目类型信息
	 * @return [type] [description]
	 */
	public function itemClassInfo(){
		header("Content-Type:text/html; charset=utf-8");
		$data["status"]=1;
		$result=$this->production_model->get_calss_info($data,"name");
		$data2["status"]=1;
		$result2=$this->production_model->get_prefix_info($data2,"id,name");
		$data3["prefix_id"]=$result2[0]["id"];
		$result3=$this->production_model->get_priduction_maxid($data3);
		$result3[0]["id"]++;
	//	var_dump($result3);
		if($result===false||$result2===false||$result3===false){
			ajaxReturn('',"制作项目类别列表",0);
		}else{
			$list[0]=$result;
			$list[1]=$result2;
			$list[2]=$result3;
			ajaxReturn($list,"制作项目类别列表",1);
		}
	}
	/**
	 * 项目类型删除
	 * @return [type] [description]
	 */
	public function itemClassDelete(){
		header("Content-Type:text/html; charset=utf-8");
			$data["class_name"]=$_GET["name"];
			$result=$this->production_model->check_exist($data);
			if($result===false){
				$this->error($item->getDbError());
			}else{
			    if($result===1){
                 $delete["id"]=$_GET["id"];
                 $this->production_model->delete_class($delete);
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
	 * 项目详细信息
	 * @return [type] [description]
	 */
	public function itemInfo(){
		header("Content-Type:text/html; charset=utf-8");
			//$data["id"]=cancelsign($_GET["id"], 2);
			$data["id"]=$_GET["id"];
			$data["status"]=1;
			$result=$this->production_model->get_production_info($data,"*");
			if($result==false){
				ajaxReturn('',"服务器未响应",0);
			}else{
			    $data2["id"]=$result[0]["prefix_id"];
			    $result2=$this->production_model->get_prefix_info($data2,"name");
                $result[0]["prefix_id"]=$result2;
				$result[1]=$result[0]["id"];
				//$result[0]["id"]=appendsign($result[0]["id"], 4, "JB");
				ajaxReturn($result,"项目信息",1);
			}
	}
	/**
	 * 项目列表
	 * @return [type] [description]
	 */
	public function productionItemList(){
		header("Content-Type:text/html; charset=utf-8");
			$page=$_GET["currentpage"];
			$data["status"]=1;
		    $list=$this->production_model->paging("item_production",$data,10,$page*10,"id desc");
			for($i=0;$i<count($list["listrows"]);$i++){
				$list["listrows"][$i]["id"]=appendsign($list["listrows"][$i]["id"], 4, "JB");
			}
			ajaxReturn($list,"制作部项目列表",1);
	}
	/**
	 * 新增项目
	 * @return [type] [description]
	 */
	public function productionItemAdd(){
		header("Content-Type:text/html; charset=utf-8");
	     if($this->input->is_ajax_request()){
			$data["prefix_id"]=$_POST["prefix_id"];
		    $data["id"]=$_POST["id"];
		    $data["class_name"]=$_POST["id"];
		    $data["name"]=$_POST["name"];
		    $data["client"]=$_POST["client"];
		    $data["contacts"]=$_POST["contacts"];
		    $data["start_time"]=$_POST["start_time"];
		    $data["quote"]=$_POST["quote"];
			$result=$this->production_model->add_production_items($data);
			if($result==false){
				ajaxReturn($result,"新增失败",0);
			}else{
				ajaxReturn($result,"新增成功",1);
			}
		}else
		{
			//$this->assign("module","新增项目");
		   // $this->load->view("itemaddview");
		}
		}
	/**
	 * 新增项目类型
	 * @return [type] [description]
	 */
	public function productionItemClassAdd(){
		header("Content-Type:text/html; charset=utf-8");
			$data["name"]=$_POST["name"];
		   $result=$this->production_model->add_production_class($data);
			if($result==false){
			    ajaxReturn($result,"新增失败",0);
			}else{
				ajaxReturn($result,"新增成功",1);
			}
	
	}   
	/**
	 * 新增项目前缀
	 * @return [type] [description]
	 */
	public function productionItemPrefixAdd(){
		header("Content-Type:text/html; charset=utf-8");
			$data["name"]=$_POST["name"];
			$data["prefix"]=$_POST["prefix"];
			$where="name ='".$_POST["name"]."' or prefix =".$_POST["prefix"];
			$result=$this->production_model->check_unique("item_prefix",$where);
			if($result==1){
			$result=$this->production_model->add_production_prefix($data);
			if($result==false){
				ajaxReturn($result,"新增失败",0);
			}else{
				ajaxReturn($result,"新增成功",1);
			}
		}else
		{
			ajaxReturn($result,"该类型或名称已存在",0);
		}
	}
	
	public function productionItemup(){
		header("Content-Type:text/html; charset=utf-8");
			$where["id"]=$_POST["id"];
			$data["class_name"]=$_POST["class_name"];
			$data["name"]=$_POST["name"];
			$data["client"]=$_POST["client"];
			$data["contacts"]=$_POST["contacts"];
			$data["start_time"]=$_POST["start_time"];
			$data["end_time"]=$_POST["end_time"];
			$data["quote"]=$_POST["quote"];
			$result=$this->production_model->update_production_items($where,$data);
			if($result===false){
				ajaxReturn($result,"更新失败",0);
			}else{
				ajaxReturn($result,"更新成功",1);
			}
	}
	/**
	 * 项目类型更新
	 * @return [type] [description]
	 */
	public function productionItemClassup(){
		header("Content-Type:text/html; charset=utf-8");
		
			$where["id"]=$_POST["id"];
			$data["name"]=$_POST["name"];
			$result=$this->production_model->update_production_class($where,$data);
			if($result===false){
				ajaxReturn($result,"更新失败",0);
			}else{
				ajaxReturn($result,"更新成功",1);
			}
		
		
	}
     /**
      * 项目前缀详情
      * @return [type] [description]
      */
     public function productionItemPrefixinfo(){
		header("Content-Type:text/html; charset=utf-8");
			$data["prefix_id"]=$_GET["id"];
		    $result=$this->production_model->check_exist($data);
            if($result===1){
                  ajaxReturn("0","可以更新",1);
			}else{
				ajaxReturn("1","不可以更新",0);
            
			}
		
	}
	/**
	 * 项目前缀更新
	 * @return [type] [description]
	 */
	public function productionItemPrefixup(){
		header("Content-Type:text/html; charset=utf-8");
		     $where["id"]=$_POST["id"];
			$data["name"]=$_POST["name"];
			$check="name ='".$_POST["name"]."'";
			if(isset($_POST["prefix"]))
			{
				$data["prefix"]=$_POST["prefix"];
				$check="name ='".$_POST["name"]."' and prefix =".$_POST["prefix"];
			}

			$result=$this->production_model->check_unique("item_prefix",$check);
			if($result==1){
			 $result2=$this->production_model->update_production_prefix($where,$data);
            if($result2==false){
				ajaxReturn($result2,"更新失败",0);
			}else{
				ajaxReturn($result2,"更新成功",1);
			}
		    }
			else
			{
				ajaxReturn($result,"该类型或名称已存在",0);
			}
	
		
	}
	/**
	 * 项目删除
	 * @return [type] [description]
	 */
	public function productionItemDelete(){
		header("Content-Type:text/html; charset=utf-8");
			$where["id"]=$_GET["id"];
			$data["status"]=0;
			$result=$this->production_model->delete_production_items($where,$data);
			if($result==false){
				ajaxReturn($result,"删除失败",0);
			}else{
				ajaxReturn($result,"删除成功",1);
			}
		
	}
	/**
	 * 项目类型删除
	 * @return [type] [description]
	 */
	public function productionItemClassDelete(){
		header("Content-Type:text/html; charset=utf-8");
			$data["class_name"]=$_GET["name"];
	     	$result=$this->production_model->check_exist($data);
			if($result===false){
				ajaxReturn("","服务器未响应",0);
			}else{
			    if($result===1){
 
                 $delete["id"]=$_GET["id"];
                 $result2=$this->production_model->wdelete_production_class($dalete);
                 if($result2===false){
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
     * 项目前缀删除
     */
	public function ItemPrefixDelete(){
		header("Content-Type:text/html; charset=utf-8");


			$data["prefix_id"]=$_GET["id"];
			$result=$this->production_model->check_exist($data);
			if($result===false){
				ajaxReturn("","服务器未响应",0);
			}else{
			    if($result===null){
                 $delete["id"]=$_GET["id"];
                 $result2=$this->production_model->wdelete_production_class($dalete);
                 if($result2===false){
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
     * 客户选择
     * @return [type] [description]
     */
    public function customerSelect(){
        header("Content-Type:text/html; charset=utf-8");
    //  $customer=D("Customer/Customer");
       $this->load->library('Customer_Communication');
       $customer=new Customer_Communication();
       $data["status"]=1;
       $result=$customer->customerlist("Production",$data);
        
         // $result=$this->production_model->get_customer_info($data,"contacts");
        //$result=$customer->where($data)->getField("contacts",true);
        if($result==false){
            ajaxReturn($result,"服务器未响应",0);
        }else{
            ajaxReturn(json_decode($result),"客户列表",1);
        }
    }
     /**
      * 客户查询
      * @return [type] [description]
      */
    public function customerSearch(){
        header("Content-Type:text/html; charset=utf-8");
     $this->load->library('Customer_Communication');
        $data="status =1 and contacts like '%".$_GET["name"]."%'";
        //$result=$this->production_model->get_customer_info($data,"contacts");
      
       $customer=new Customer_Communication();
       $result=$customer->customerlist("Production",$data);
        if($result==false){
            ajaxReturn($result,"服务器未响应",0);
        }else{
            ajaxReturn(json_decode($result),"客户列表",1);
        }
    }
     /**
      * 客户选择变更
      * @return [type] [description]
      */
    public function customerChange(){
        header("Content-Type:text/html; charset=utf-8");
               $this->load->library('Customer_Communication');
            $customer=new Customer_Communication();
            $data["contacts"]=$_GET["contacts"];
            $data["status"]=1;
            $result=$customer->customerlist("Production",$data);
            if($result==false){
                ajaxReturn($result,"服务器未响应",0);
            }else{
                ajaxReturn(json_decode($result),"客户公司",1);
            }
    }
	/**
	 * 项目搜索
	 * @return [type] [description]
	 */
	public function productionItemSearch(){
		header("Content-Type:text/html; charset=utf-8");
			$page=$_GET["currentpage"];
			$data["status"]=1;
			$array=explode("%", $_GET["searchtext"]);
		//	$data["prefix_id"]=$array[1];
			//$data["name"]=array('like', "%".$array[0]."%");
			$data="status =1 and prefix_id =".$array[1]." and name like '%".$array[0]."%'";
			//$rolelist=paging($page,"Item/ItemProduction",null,$data,"id desc");
		    $list=$this->production_model->paging("item_production",$data,10,$page*10,"id desc");
			//for($i=0;$i<count($rolelist["listrows"]);$i++){
			//	$rolelist["listrows"][$i]["id"]=appendsign($rolelist["listrows"][$i]["id"], 4, "JB");
			//}
			ajaxReturn($list,"用户组列表",1);
	}
  /**
   * 项目前缀搜索
   * @return [type] [description]
   */
	public function productionitemPrefixSearch(){
		header("Content-Type:text/html; charset=utf-8");
			$page=$_GET["currentpage"];
			// $data["status"]=1;
			// $data["name"]=array('like', "%".$_GET["searchtext"]."%");
			$data="status =1 and name like '%".$_GET["searchtext"]."%'";
			//$rolelist=paging($page,"Item/ItemPrefix",null,$data);
			$list=$this->production_model->paging("item_prefix",$data,10,$page*10,"id desc");
			//for($i=0;$i<count($rolelist["listrows"]);$i++){
			//	$rolelist["listrows"][$i]["id"]=appendsign($rolelist["listrows"][$i]["id"], 4, "JB");
			//}
			ajaxReturn($list,"工作类型列表",1);

	}
	
    /**
     * 项目前缀变更
     * @return [type] [description]
     */
	public function prefixchange(){
			header("Content-Type:text/html; charset=utf-8");
			//$prefix=D("Item/ItemPrefix");
			//$item=D("Item/ItemProduction");
			$data["prefix_id"]=$_GET["prefix_id"];
			$data["status"]=1;
			//$result=$item->where($data)->Max("id");
			$result=$this->production_model->check_exist($data);
			if($result==1){
				$data2["id"]=$_GET["prefix_id"];
				$data2["status"]=1;
			    $result2=$this->production_model->get_prefix_info($data2,"prefix");
				//$result2=$prefix->where($data2)->getField("prefix");
				$id="JB".$result2."001";
				ajaxReturn($id,"项目编号",1);
			}else{
				$result++;
				$id=$result;
				ajaxReturn($id,"项目编号",1);
			}
		
	}
}