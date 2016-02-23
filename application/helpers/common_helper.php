<?php
/**
 * 拥有构造ajax返回结果
 * @param  [type] $data   [数据]
 * @param  [type] $info   [提示信息]
 * @param  [type] $status [状态码（1：成功，2：失败）]
 * @return [type]         [description]
 */
function ajaxReturn($data,$info,$status)
{
	    $result  =  array();
        $result['status']=  $status;
        $result['info'] =  $info;
        $result['data'] = $data;
        exit(json_encode($result));
}

//邮件发送
function send_mail($to, $name, $subject = '', $body = '', $attachment = null){
	include('/volume1/web/OA/Project/application/libraries/PHPMailer/class.phpmailer.php');
	$mail             = new PHPMailer(); //PHPMailer对象
	$mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
	$mail->IsSMTP();  // 设定使用SMTP服务
	$mail->SMTPDebug  = 0;                     // 关闭SMTP调试功能
	// 1 = errors and messages
	// 2 = messages only
	$mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
	$mail->SMTPSecure = '';                 // 使用安全协议
	$mail->Host       = "mail.wsl.com.hk";  // SMTP 服务器
	$mail->Port       = '25';  // SMTP服务器的端口号
	$mail->Username   = 'mail@wsl.com.hk';  // SMTP服务器用户名
	$mail->Password   = 'M_7709';  // SMTP服务器密码
	$mail->SetFrom( 'mail@wsl.com.hk', 'Emedia');
	$replyEmail       = 'mail@wsl.com.hk';
	$replyName        = 'Emedia';
	$mail->AddReplyTo($replyEmail, $replyName);
	$mail->Subject    = $subject;
	$mail->MsgHTML($body);
	$mail->AddAddress($to, $name);
	if(is_array($attachment)){ // 添加附件
		foreach ($attachment as $file){
			is_file($file) && $mail->AddAttachment($file);
		}
	}
	return $mail->Send() ? true : $mail->ErrorInfo;
}

//随机字符串
function getRandom($param){
	$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$key = "";
	for($i=0;$i<$param;$i++)
	{
	$key .= $str{mt_rand(0,32)};    //生成php随机数
	}
	return $key;
}

//编号前缀添加
function appendsign($number,$len,$flag){
		$len2=strlen($number);
		$len3=$len-$len2;
		for($j=0;$j<$len3;$j++){
			$number="0".$number;
		}
		$number=$flag.$number;
		return $number;
}
//编号前缀去除
function cancelsign($number,$len){
	$number=substr($number,$len);
	$len2=strspn($number,"0");
	$number=substr($number,$len2);
	return $number;
}

//外事项目PDF
function outworkitempdf($html,$time){
	
include('/volume1/web/OA/Project/application/libraries/tcpdf/tcpdf.class.php');
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('EMEDIA');
	$pdf->SetTitle('');
	$pdf->SetSubject('');
	$pdf->SetKeywords('');
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	$pdf->SetMargins(2, 10, 2);
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	$pdf->SetFont('msyh',10);
	//$pdf->setFontSubsetting(true);
	foreach ($html as $key=>$value){
		$html=template1($value,$time);
		$pdf->AddPage();
	//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
	//
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	}
     $pdf->Output("./resources/PDFfile/emedialist.pdf",'F');
	return true;
}

function outworkitempdf2($html,$flag,$time){
include('/volume1/web/OA/Project/application/libraries/tcpdf/tcpdf.class.php');
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('EMEDIA');
	$pdf->SetTitle('');
	$pdf->SetSubject('');
	$pdf->SetKeywords('');
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	$pdf->SetMargins(2, 10, 2);
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	$pdf->SetFont('msyh',10);
	//$pdf->setFontSubsetting(true);
	foreach ($html as $key=>$value){
		$html=template2($value,$flag,$time);
		$pdf->AddPage();
		//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
		//
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	}
	$pdf->Output("./resources/PDFfile/emedialist.pdf",'F');
	return true;
}

//外事pdf模版
function template1($content,$time){
$html = <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	.table2 tr th{border:1px solid black;
	text-align:center;

	height:25px;
	font-size:12px;
	}
	.table2 tr td{border:1px solid black;
text-align:center;
	height:25px;
	font-size:12px;
	}

.table1 td{
	text-align:center;
	}
</style>
</head>
<body>
<div>
<table class="table1"  border="0" cellspacing="0" cellpadding="0">
<tr><td width="745"><h1>所有项目</h1></td></tr>
</table>
<br/>
<br/>
  <table class="table2"  border="0" cellspacing="0" cellpadding="0">
  <thead>
  <tr>
<th width="55">序号</th><th width="70">项目类别</th><th width="70">项目编号</th> <th width="150">项目名称</th><th width="80px">合同到期日</th><th width="150" >详细资料</th><th width="150">外事备注</th> 
  </tr>
  </thead>
  <tbody>
  $content
  </tbody>
</table>
日期：$time
</div>
</body>
</html>
EOD;
return $html;

}

function template2($content,$flag,$time){
	$html = <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	.table2 tr th{border:1px solid black;
	text-align:center;
	
	height:25px;
	font-size:12px;
	}
	.table2 tr td{border:1px solid black;
text-align:center;
	height:25px;
	font-size:12px;
	}
	
.table1 td{
	text-align:center;
	}
</style>
</head>
<body>
<div>
<table class="table1"  border="0" cellspacing="0" cellpadding="0">
<tr><td width="745"><h1>$flag</h1></td></tr>
</table>
<br/>
<br/>
  <table class="table2"  border="0" cellspacing="0" cellpadding="0">
  <thead>
  <tr>
<th width="65">序号</th><th width="80">项目编号</th> <th width="160">项目名称</th><th width="100px">合同到期日</th><th width="160" >详细资料</th><th width="160">外事备注</th>
  </tr>
  </thead>
  <tbody>
  $content
  </tbody>
</table>
日期：$time
</div>
</body>
</html>
EOD;
	return $html;
	
}

//tcpdf字符串居中判断
function pdfStralign($str='',$rowLen=10,$width){
	$count=0;
	$html="";
	$linelen = $rowLen;
	$num=mb_strlen($str,'utf8');
	if($num>20){
		$html="<td style=\"text-align:left\" width=\"".$width."\">".$str."</td>";
	}else if($num<10){
		$html="<td width=\"".$width."\">".$str."</td>";
	}else{
	for($j=0;$j<$num;$j++){
	$string=mb_substr($str,$j,1,"utf-8");
	$result=preg_match('/[a-zA-Z0-9]/',$string);
	if($result==1){
		$count+=1;
		
	}else{
		if($count==$linelen*2-1)
		{
			$count+=1;
		
		}else{
			$count+=2;
		}
	}
	}
	if($count>20){
		$html="<td style=\"text-align:left\" width=\"".$width."\">".$str."</td>";
	}else{
		$html="<td width=\"".$width."\">".$str."</td>";
	}
	}
	return $html;
	
}