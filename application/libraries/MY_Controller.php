<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    { 
       parent::__construct();
    	$this->load->helper("url");
    	$this->load->model('permit_model');
    	$request=explode("/",uri_string());
    	//$_SESSION['_ACCESS_LIST']=$this->permit_model->getAccessList($authId);
    	$accessList=var_dump($_SESSION['_ACCESS_LIST']);
	    if(!isset($accessList[strtoupper($request[0])][strtoupper($request[1])][strtoupper($request[3])])) {
    				//redirect('/permitlogin/index', 'location');
          var_dump($_SESSION['_ACCESS_LIST']);          //
    			}
    }
}
