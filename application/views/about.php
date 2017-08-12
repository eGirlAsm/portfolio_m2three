<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="<?php echo base_url()?>static/css/main_20130619.css?<?php echo time(); ?>" type="text/css" media="all"  />
<style type="text/css">
#about_title { background-repeat: no-repeat; background-attachment: scroll; background-position: center top; background-image: url("<?php echo base_url();?>/static/images/about.jpg") !important; height: 220px; width:100%;}
#about_Body { background-repeat: repeat; background-image: url("<?php echo base_url();?>/static/images/about_bg.jpg"); background-color: rgb(217, 217, 217); }
#container{background:url(<?php echo base_url();?>/static/images/lace_repeat.png)}
#about_content{padding:60px;}
.about_row{width:100%;margin:0 auto;}
</style>
<script type="text/javascript" src="<?php echo base_url()?>static/js/jquery-1.10.1.min.js" ></script>
</head>
<div class="row">
<body id="about_Body" class="about_body">
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
      <div class="inner-right" data-spm="121"><a href="<?php echo site_url();?>">처음으로</a><i></i><a href="<?php echo site_url('space');?>">블로그</a><i></i><a href="#" target="_blank">광고안내</a><i></i><a href="#">의견사항</a><i></i> </div>
    </div>
  </div>
</div>
<div class="about_row">
  <div id="container">
    <div id="about_title">
      <h2>사이트소개</h2>
    </div>
    <div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 220px; overflow: hidden;">
      <object data="<?php echo base_url();?>static/swf/about.swf" id="swftitlebar" type="application/x-shockwave-flash" height="220" width="100%">
        <param name="allowScriptAccess" value="always">
        <param name="allownetworking" value="all">
        <param name="allowFullScreen" value="true">
        <param name="wmode" value="transparent">
        <param name="menu" value="false">
        <param name="scale" value="noScale">
        <param name="salign" value="1">
      </object>
    </div>
    <div id="about_content">
      <table>
        <tr>
          <td>이름:</td>
          <td>엠투쓰리</td>
        </tr>
        <tr>
          <td>영문이름:</td>
          <td>m2three</td>
        </tr>
        <tr>
          <td>나이</td>
          <td>한살</td>
        </tr>
        <tr>
          <td>성별:</td>
          <td>여</td>
        </tr>
        <tr>
        <td>소개:</td>
        <td>그냥 심심해서 만들어 봣슴다 ㅋㅋ.</td>
        </tr>
                <tr>
        <td>하고싶은말:</td>
        <td>자주 놀러와줬으면 좋겟습니다...</td>
        </tr>
      </table>
    </div>
  </div>
  <div id="copyright">
    <ul>
      <li><a href="#">사이트소개</a></li>
      <li><a href="#" target="_blank">인재채용</a></li>
      <li><a href="#" target="_blank">제휴안내</a></li>
      <li><a href="#" target="_blank">광고안내</a></li>
      <li><a href="#">이용약관</a></li>
      <li><a href="#"><b>개인정보취급방침</b></a></li>
      <li class="noimg"><a href="#">청소년보호정책</a></li>
    </ul>
    <p>Copyright ⓒ 2013 - 2020 m2three. All rights reserved<span style="position:relative;top:2px;left:20px;"><!--<script src="http://s11.cnzz.com/stat.php?id=5570234&web_id=5570234&show=pic" language="JavaScript"></script>--></span></p>
    <p></p>
  </div>
</div>

<!-- row --> 
<script type="text/javascript">
var _mvq = _mvq || [];
_mvq.push(['$setAccount', 'm-24709-0']);

_mvq.push(['$logConversion']);
(function() {
	var mvl = document.createElement('script');
	mvl.type = 'text/javascript'; mvl.async = true;
	mvl.src = ('https:' == document.location.protocol ? 'https://static-ssl.mediav.com/mvl.js' : 'http://static.mediav.com/mvl.js');
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(mvl, s); 
})();	

</script> 
<script type="text/javascript" src="http://js.tongji.linezing.com/3310208/tongji.js"></script>
<noscript>
<a href="http://www.linezing.com"><img src="http://img.tongji.linezing.com/3310208/tongji.gif"/></a>
</noscript>
</body>
</html>
