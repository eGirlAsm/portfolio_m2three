<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/reset.css"  />
<style type="text/css">
#wrap{width:100%;height:65px;border-bottom:1px solid #000;background:#2E4C8C;}
#menu {
	position: relative;
	left: 215px;
	font-size: 16px;
	line-height:3px;
	top: 35px;
	font:'microsoft yahei',Arial, Helvetica, sans-serif;
}
#menu ul{height:30px;}
#menu li {
	display: inline;
	margin-right: 10px;
}
#menu ul li a,#menu ul li a:visited{
	color:#fff;
	text-decoration:none;
	padding:5px 10px 10px 10px;
}
#menu ul li a:hover{
	color:#fff;
	text-decoration:underline;
}
#menu ul li a.selection{
background:#006;color:#FFF;font-weight:bold;}


</style>
<script src="<?php echo base_url(); ?>js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/nof5.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  $("#menu li a").click(function(){
	  $("*").removeClass('selection');
	  $(this).addClass('selection');
	  var _target = $(this).attr('href').replace('#','');
	  var site_url = '<?php echo site_url();  ?>/' + _target;
	  parent.window.frames[1].location.href= site_url;
  });
});

</script>

</head>
<body>
<div id="wrap">
<div id="menu">
  <ul>
    <li><a  class="selection" href="#menu/left" >首页</a></li>
    <li><a href="#menu/systemMenu" >系统</a></li>
    <li><a href="#menu/user">用户</a></li>
    <li><a href="#menu/content">内容</a></li>
    <li><a href="#menu/mission">任务</a></li>
    <li><a href="#menu/app">应用</a></li>
    <li><a href="#menu/plugin">插件</a></li>
  </ul>
</div>
</div>
</body>
</html>
