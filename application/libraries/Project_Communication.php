<?php
define("URL","http://192.168.123.28/OA/Project/index.php/projectcommunication/getProjectList"); 
class Project_Communication
{ 
    //获取项目列表 （返回值[0:无访问权限，1：项目查询失败]）
	public function projectlist($flag)
	{
            $url=URL;
			$ch = curl_init();
			$post_data["flag"]=$flag;
		    $post_data["active"]=$active;
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
			$output = curl_exec($ch);
			curl_close($ch);
			return $output;
	}
}
