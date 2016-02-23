<?php
class Base extends CI_Controller
{
    function __construct()
    { 
       parent::__construct();
    	$this->load->helper("url");
    	$this->load->model('permit_model');
    	$request=explode("/",uri_string());
    	//$_SESSION['_ACCESS_LIST']=$this->permit_model->getAccessList($authId);
    	$accessList=$_SESSION['_ACCESS_LIST'];
	    if(!isset($accessList[strtoupper($request[0])][strtoupper($request[1])][strtoupper($request[3])])) {
    				redirect('/permitlogin/index', 'location');
    			}
    }
}