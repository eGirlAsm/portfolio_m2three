<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="<?php echo base_url(); ?>js/TaskMenu.js"></script>
<script src="<?php echo base_url(); ?>js/nof5.js"></script>
<script>
var taskMenu1;
var taskMenu2;
var taskMenu3;
var taskMenu4;

var item1;
var item2;
var item3;
var item4;
var item5;
var item6;
var item7;
var item8;
TaskMenu.setStyle("<?php echo base_url(); ?>images/Classic/ClassicStyle.css"); 

window.onload = function()
{
	TaskMenu.setHeadMenuSpecial(true);
	//TaskMenu.setScrollbarEnabled(true);
	//TaskMenu.setAutoBehavior(false);
	////////////////////////////////////////////////
	item1 = new TaskMenuItem("站点配置","<?php echo base_url(); ?>images/Image/demo.gif","parent.window.frames[2].location.href='<?php echo site_url('main/sysconfig');?>'");
	item2 = new TaskMenuItem("导航配置","<?php echo base_url(); ?>images/Image/api.gif","parent.window.frames[2].location.href='<?php echo site_url('main/sysconfig');?>'");
	item3 = new TaskMenuItem("注册配置","<?php echo base_url(); ?>images/image/copy.gif","parent.window.frames[2].location.href='<?php echo site_url('main/sysconfig');?>'");
	item4 = new TaskMenuItem("邀请配置","<?php echo base_url(); ?>images/Image/friends.gif","parent.window.frames[2].location.href='<?php echo site_url('main/sysconfig');?>'");
	item5 = new TaskMenuItem("邮件配置","<?php echo base_url(); ?>images/image/dload.gif","parent.window.frames[2].location.href='<?php echo site_url('main/sysconfig');?>'");
	item6 = new TaskMenuItem("附件配置","<?php echo base_url(); ?>images/image/update.gif","parent.window.frames[2].location.href='<?php echo site_url('main/sysconfig');?>'");
	item7 = new TaskMenuItem("积分配置","<?php echo base_url(); ?>images/image/update.gif","parent.window.frames[2].location.href='<?php echo site_url('main/sysconfig');?>'");
	item8 = new TaskMenuItem("消息配置","<?php echo base_url(); ?>images/image/update.gif","parent.window.frames[2].location.href='<?php echo site_url('main/sysconfig');?>'");


	////////////////////////////////////////////////
	taskMenu1 = new TaskMenu("首页");
	taskMenu1.add(item1);
	taskMenu1.add(item2);
	taskMenu1.add(item3);
	taskMenu1.add(item4);
	taskMenu1.add(item5);
	taskMenu1.add(item6);
	taskMenu1.add(item7);
	taskMenu1.add(item8);
	taskMenu1.setBackground("Image/bg.gif");
	taskMenu1.init();
	parent.window.frames[2].location.href='<?php echo site_url('main/sysconfig');?>';
}
</script>
</head>
</html>