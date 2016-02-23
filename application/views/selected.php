<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-MEDIA项目管理系统</title>
<link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/dist/css/bootstrap.min.css">
   <link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/css/main.css">
</head>
<body style="padding-top: 50px; ">
<div class="container">
      <form class="form-signin" role="form"  >
        <h2 class="form-signin-heading">你拥有以下系统权限，选择进入</h2>
           <?php foreach($login as $item){?>
           <a class="btn btn-lg btn-primary btn-block" href="<?php echo $item["like"]?>"><?php echo $item["name"]?></a>
           <?php endforeach;?>
            
      </form>

    </div> <!-- /container -->
<script src="<?php  echo base_url()."resources/" ?>/dist/js/jquery.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/dist/js/bootstrap.min.js"></script>     
</body>
</html>