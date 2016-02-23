<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    { 
        session_start();
       parent::__construct();
    	$this->load->helper("url");
    	$request=explode("/",uri_string());
       if(!isset($_SESSION['admin'])){
    	//$_SESSION['_ACCESS_LIST']=$this->permit_model->getAccessList($authId);
    	$accessList=$_SESSION['_ACCESS_LIST'];
	  //  if(!isset($accessList[strtoupper("permit")][strtoupper($request[0])][strtoupper($request[1])])) {
         if(!isset($accessList[strtoupper("Project")][strtoupper($request[0])])) {
    			//var_dump($accessList);
            	redirect('/login/index', 'location');
               // var_dump($_SESSION['_ACCESS_LIST']);    
    			}
            }
    }
}
