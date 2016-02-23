<?php
define("URL","http://192.168.123.28/OA/Permit/index.php/permitverify/Verify"); 
class Permit_Login{
	
	//登录获取权限（返回值 [0：帐号或者密码为填写，1：帐号不存在，2：密码错误]）成功返回权限数组
	public function login($user,$password){
		             $url;
			        $ch = curl_init();
			        $post_data["user"]=$user;
			         $post_data["password"]=$password;
					curl_setopt($ch, CURLOPT_URL,URL);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					// 我们在POST数据哦！
					curl_setopt($ch, CURLOPT_POST, 1);
					// 把post的变量加上
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
					$output = curl_exec($ch);
					curl_close($ch);
					return $output;
	}
	  //返回1成功，0失败
	public function checkpassword($password){
                     $url;
			        $ch = curl_init();
			         $post_data["password"]=$password;
					curl_setopt($ch, CURLOPT_URL,"http://192.168.123.28/Emedia/Index.php/Permit/Permit/check");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
					$output = curl_exec($ch);
					curl_close($ch);
					return $output;
	}
}
