<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="<?php echo base_url()?>static/css/space.css?<?php echo time(); ?>" type="text/css" media="all"  />
<script type="text/javascript" src="<?php echo base_url()?>static/js/jquery-1.10.1.min.js" ></script>
</head>

<body id="QZ_Body" class="bg_body">
<div class="m23-topbar-wrap" data-spm="119">
  <div class="m23-topbar">
    <div class="inner">
      <div class="inner-left">엠투쓰리에 온것을 환영합니다，
        <?php 
	  if ($user_status){ 
	  	echo '<a href="#" class="login-uname aysw-topbar-uname">'.$username.'</a>&nbsp;님'.'<i></i><a href="#">쪽찌함(0)</a>'.'<i></i>'.anchor('/auth/logout/', '로그아웃');}
	  else{ 
	  	echo '<a href="'.site_url().'/auth/login" class="login">로그인</a><i></i>'.anchor('/auth/register/', '회원가입');
	  }
	  ?>
      </div>
      <div class="inner-right" data-spm="121"><a href="<?php echo site_url();?>">처음으로</a><i></i><a href="<?php echo site_url('space');?>">블로그</a><i></i><a href="#" target="_blank">광고안내</a><i></i><a href="#">의견사항</a><i></i>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div id="layBackground" class="lay_background ">

    <div id="layPositionRoot" class="lay_position "> … </div>
    <div id="div_corner_ad_container" class="gb_ad_tearing_angle" style="top: 0px; z-index: 100; width: 259px; height: 188px;" adid="63791" postrace="2161_63791_445_0"> … </div>
</div>