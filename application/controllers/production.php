<?php
class Production extends MY_Controller
{
  function __construct()
  {
      parent::__construct();
      $this->load->model('production_model');
      $this->load->helper('url');
      $this->load->helper('common');

  }

  public function index(){
      header("Content-Type:text/html; charset=utf-8");
      if($this->input->is_ajax_request()){
        $page=$_GET["currentpage"];
        $data["status"]=1;
        $data["prefix_id"]=$_GET["searchtext"];
        $list=$this->production_model->paging("item_production",$data,10,$page*10,"id desc");
            //for($i=0;$i<count($list["listrows"]);$i++){
            //  $list["listrows"][$i]["id"]=appendsign($list["listrows"][$i]["id"], 4, "JB");
            //}
        ajaxReturn($list,"制作部项目列表",1);
         }else{
        //$this->assign('module',"制作项目列表");
           $this->load->view("production_index");
         }
       }
         /**
          * 前缀信息
          * @return [type] [description]
          */
         public function prefixinfo(){
            header("Content-Type:text/html; charset=utf-8");
             $data["status"]=1;
             $result=$this->production_model->get_prefix_info($data,"id,name");
             if($result===false){
              ajaxReturn('',"服务器未响应",0);
          }else{
              ajaxReturn($result,"工作类别列表",1);
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
      $result=$this->production_model->get_production_info($data,"*");
      if($result==false){
          ajaxReturn("","服务器未响应",0);
      }else{
        $data2["contacts"]=$result[0]["contacts"];
        $result2=$customer->customerlist("Production",$data2);
        if($result2===0)
        {
          ajaxReturn($result2,"无客户系统访问权限",0);
        }else if($result2==1)
        {
          ajaxReturn($result2,"客户系统未响应",0);
        }else
        {
      //    var_dump($result);
        //var_dump(json_decode($result2,true));
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
          * 项目类型
          */
         public function ItemClassInfo(){
         	header("Content-Type:text/html; charset=utf-8");
         	
         		$data["status"]=1;
                $result=$this->production_model->get_production_class($data,"name");
         		if($result==false){
         			ajaxReturn('',"服务器未响应",0);
         		}else{
         			ajaxReturn('',"项目列表",1);
         		}
         		
         	
         }
         /**
          * 总表
          * @return [type] [description]
          */
         public function generalTable(){
         	header("Content-Type:text/html; charset=utf-8");
            if($this->input->is_ajax_request()){
        
              $data["status"]=1;
              $data["prefix_id"]=1;
              $result=$this->production_model->get_production_info($data,"*");
              if($result===false){
                 ajaxReturn('',"服务器未响应",0);
             }else{
                 $list=array();
                 $quote=0;
                 $appreciation=0;
                 $third_party=0;
                 for($i=0;$i<count($result);$i++){
         			//$result[$i]["id"]=appendsign($result[$i]["id"], 4, "JB");
                    $quote+=$result[$i]["quote"];
                    $result[$i]["quote"]=appendsign(number_format($result[$i]["quote"],2), 0, "$");
                    $appreciation+=$result[$i]["appreciation"];
                    $result[$i]["appreciation"]=appendsign(number_format($result[$i]["appreciation"],2), 0, "$");
                    $third_party+=$result[$i]["third_party"];
                    $result[$i]["third_party"]=appendsign(number_format($result[$i]["third_party"],2), 0, "$");
                }
                $list["data"]=$result;
                $list["quote"]=appendsign(number_format($quote,2), 0, "$");
                $list["appreciation"]=appendsign(number_format($appreciation,2), 0, "$");
                $list["third_party"]=appendsign(number_format($third_party,2), 0, "$");
                ajaxReturn($list,"项目列表",1);
            }
        }else
        { 
              // $this->assign("now",date("Y-m-d"));
           $this->load->view("production_general");
        }
     
    }
         /**
          * 总表查询
          * @return [type] [description]
          */
         public function tableSearch(){
         	header("Content-Type:text/html; charset=utf-8");
         		//$production=D("Item/ItemProduction");
         		 $data["status"]=1;
                 $data["prefix_id"]=1;
                 if(!empty($_GET["search_time1"])||!empty($_GET["search_time2"]))
                 {
                    $data["start_time >"]=$_GET["search_time1"];
                    $data["start_time <"]=$_GET["search_time2"];
                }
                if($_GET["searchtext1"]=="非程序"){
                    $data["class_name !="]="网站";
                    $data["class_name !="]="程序";
                }
                else if($_GET["searchtext1"]=="程序"){
                    $data["class_name "]="网站";
                    $data["class_name "]="程序";
                }
                if($_GET["searchtext2"]=="已完成"){
                    $data["end_time !="]="0000-00-00";
                }
                else if($_GET["searchtext2"]=="进行中"){
                    $data["end_time"]="0000-00-00";
                }
         		//$data["start_time"]=$_GET["searchtext2"];
               // $result=$production->where($data)->limit(0,13)->select();
                $result=$this->production_model->get_production_info($data,"*");
                //$x=$production->getLastSql();
                if($result===false){
                     ajaxReturn('',"服务器未响应",10);
                }else{
                    $list=array();
                    $quote=0;
                    $appreciation=0;
                    $third_party=0;
                    for($i=0;$i<count($result);$i++){
         				//$result[$i]["id"]=appendsign($result[$i]["id"], 4, "JB");
                       $quote+=$result[$i]["quote"];
                       $result[$i]["quote"]=appendsign(number_format($result[$i]["quote"],2), 0, "$");
                       $appreciation+=$result[$i]["appreciation"];
                       $result[$i]["appreciation"]=appendsign(number_format($result[$i]["appreciation"],2), 0, "$");
                       $third_party+=$result[$i]["third_party"];
                       $result[$i]["third_party"]=appendsign(number_format($result[$i]["third_party"],2), 0, "$");
                   }
                   $list["data"]=$result;
                   $list["quote"]=appendsign(number_format($quote,2), 0, "$");
                   $list["appreciation"]=appendsign(number_format($appreciation,2), 0, "$");
                   $list["third_party"]=appendsign(number_format($third_party,2), 0, "$");
                   ajaxReturn($list,"项目列表",1);
               }
           
       }
         /**
          * 项目更新
          * @return [type] [description]
          */
         public function upProductionItem(){
         	header("Content-Type:text/html; charset=utf-8");
         	$where["id"]=$_POST["id"];
            $data["third_party"]=$_POST["third_party"];
            $data["costing_time"]=$_POST["costing_time"];
            $data["gathering_time"]=$_POST["gathering_time"];
            $result=$this->production_model->update_production_items($where,$data);
            if($result===false){
                ajaxReturn($result,"更新失败",0);
            }else{
                ajaxReturn($result,"更新成功",1);
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
        //  $data["prefix_id"]=$array[1];
            //$data["name"]=array('like', "%".$array[0]."%");
            $data="status =1 and prefix_id =".$array[1]." and name like '%".$array[0]."%'";
            //$rolelist=paging($page,"Item/ItemProduction",null,$data,"id desc");
            $list=$this->production_model->paging("item_production",$data,10,$page*10,"id desc");
            //for($i=0;$i<count($rolelist["listrows"]);$i++){
            //  $rolelist["listrows"][$i]["id"]=appendsign($rolelist["listrows"][$i]["id"], 4, "JB");
            //}
            ajaxReturn($list,"用户组列表",1);

        }

        public function productionItemSelect(){
          header("Content-Type:text/html; charset=utf-8");
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
    
        $data="status =1 and contacts like '%".$_GET["name"]."%'";
        //$result=$this->production_model->get_customer_info($data,"contacts");
       $this->load->library('Customer_Communication');
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
 }