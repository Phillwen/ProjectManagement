<?php
define("URL","http://192.168.123.28/OA/Customer/index.php/customercommunication/getcustomerList"); 
class Customer_Communication
{ 
    //获取项目列表 （返回值[0:无访问权限，1：项目查询失败]）
	public function customerlist($flag,$where="",$select="")
	{
            $url=URL;
			$ch = curl_init();
			$post_data["flag"]=$flag;
		    if($where!="")
			         {
			         	$post_data["where"]=$where;
			         }
			 if($select!="")
			         {
			         	$post_data["select"]=$select;
			         }
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
			$output = curl_exec($ch);
			curl_close($ch);
			return $output;
	}
}
