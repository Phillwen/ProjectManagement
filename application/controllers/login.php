<?php
class Login extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->helper('url');
		$this->load->helper("common");
	}
	public function index(){
		header("Content-Type:text/html; charset=utf-8");
		$this->load->view("login");
	}

	function logout(){
		header("Content-Type:text/html; charset=utf-8");
		if(!empty($_SESSION["user_id"])){
			unset($_SESSION["user_id"]);
			$_SESSION=array();
			session_destroy();
		}
		redirect("/login/index");
	}

	function checklogin(){
		header("Content-Type:text/html; charset=utf-8");
		$this->load->library("Permit_Login");
		if(empty($_POST['username'])) {
			ajaxReturn("",'帐号必须！',0);
		}elseif (empty($_POST['password'])){
			ajaxReturn("",'密码必须！',0);
		}

		$login=new Permit_Login();
		$result=$login->login($_POST['username'],$_POST['password']);
		//$aa=json_decode($result,1);
		//var_dump($aa);
		//var_dump($result);
		if($result!==false)
		{
			//var_dump(0===0);
			if($result===0)
			{
				ajaxReturn("",'帐号必须！',0);
			}else if($result==1)
			{
				ajaxReturn("",'帐号不存在！',0);
			}else if($result==2)
			{
				ajaxReturn("",'密码错误！',0);
			}else
			{
				$authInfo=json_decode($result,true);
				$_SESSION["user_id"]=$authInfo['user_id'];//记录认证标记，必须有。其他信息根据情况取用。
				//$_SESSION["name"]=$authInfo['user_name'];
				$_SESSION["name"]=$_POST['username'];
				$_SESSION["time"]= date('Y-m-d H:i:s',time());
				//判断是否为超级管理员
				if($_POST['username']=='admin'){
					$_SESSION["admin"]=true;
				}
				//以下操作为记录本次登录信息
				$_SESSION['_ACCESS_LIST']=$authInfo["access"];
				//var_dump($authInfo["access"]);
				//ajaxReturn(site_url('fingerprintmanage/index'),"成功",1);
				$data=array();
				//var_dump(count($_SESSION['_ACCESS_LIST']['PROJECT']));
				if(count($_SESSION['_ACCESS_LIST']['PROJECT'])>=2){
					if(isset($_SESSION['_ACCESS_LIST']['PROJECT']['OUTWORK'])){
						    $array["like"]=site_url("outwork/index");
						    $array["name"]="外事项目";
                           array_push($data, $array);
					}
					if(isset($_SESSION['_ACCESS_LIST']['PROJECT']['OUTWORKMANAGE'])){
						 $array["like"]=site_url("outworkmanage/index");
						    $array["name"]="外事管理项目";
                           array_push($data, $array);

					}
					if(isset($_SESSION['_ACCESS_LIST']['PROJECT']['PRODUCTION'])){
						 $array["like"]=site_url("production/index");
						    $array["name"]="制作项目";
                           array_push($data, $array);

					}
					if(isset($_SESSION['_ACCESS_LIST']['PROJECT']['PRODUCTIONMANAGE'])){
						 $array["like"]=site_url("productionmanage/index");
						    $array["name"]="制作管理项目";
                           array_push($data, $array);
					}
					 // $this->assign("list",$data);
                      ajaxReturn($data,"成功",1);
				}else if(isset($_SESSION['_ACCESS_LIST']['PROJECT']['OUTWORK']))
				{
					ajaxReturn(site_url('outwork/index'),"成功",1);
				}else if(isset($_SESSION['_ACCESS_LIST']['PROJECT']['OUTWORKMANAGE'])){
					ajaxReturn(site_url('outworkmanage/index'),"成功",1);
					
				}else if(isset($_SESSION['_ACCESS_LIST']['PROJECT']['PRODUCTIONMANAGE'])){
					ajaxReturn(site_url('productionmanage/index'),"成功",1);
					
				}else if(isset($_SESSION['_ACCESS_LIST']['PROJECT']['PRODUCTION'])){
					ajaxReturn(site_url('production/index'),"成功",1);
					
				}else{
					ajaxReturn("",'没有权限！',0);
				}
			}
		}
	}
}