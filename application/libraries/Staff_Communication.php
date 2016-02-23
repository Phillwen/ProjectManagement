<?php
//define("URL","http://192.168.123.28/OA/Staff/index.php/StaffManage/index"); 
class Staff_Communication{
	
	//登录获取权限（返回值 [0：帐号或者密码为填写，1：帐号不存在，2：密码错误]）成功返回权限数组
	// public function login($user,$password){
	// 	             $url;
	// 		        $ch = curl_init();
	// 		        $post_data["username"]=$user;
	// 		         $post_data["password"]=$password;
	// 				curl_setopt($ch, CURLOPT_URL,URL);
	// 				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// 				// 我们在POST数据哦！
	// 				curl_setopt($ch, CURLOPT_POST, 1);
	// 				// 把post的变量加上
	// 				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	// 				$output = curl_exec($ch);
	// 				curl_close($ch);
	// 				return $output;
	// }
    
    //获取全体员工 （返回值[0:无访问权限，1：员工系统查失败]）
	public function stafflist($flag,$active=0)
	{
                    $url="http://192.168.123.28/OA/Staff/index.php/staffcomminication/getStaffList";
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

	public function staff_email($user_id)
	{
		            $url="http://192.168.123.28/OA/Staff/index.php/staffcomminication/getStaffEmail";
			        $ch = curl_init();
			        $post_data["user_id"]=$user_id;
					curl_setopt($ch, CURLOPT_URL,$url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
					$output = curl_exec($ch);
					curl_close($ch);
					return $output;

	}
}
