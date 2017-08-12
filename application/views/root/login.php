<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>登录-后台管理</title>
<style type="text/css">
body {
	font-family: arial;
	font-size: 12px;
	background: #EFF3F6;
	margin: 0px;
	color: #999999
}
li {
	list-style-type: none;
}
ul, form, input {
	font-size: 12px;
	padding: 0;
	margin: 0;
}
a:link {
	color: #999;
	text-decoration: none
}
a:visited {
	color: #999;
	text-decoration: none
}
a:hover {
	color: #cc3300;
	text-decoration: underline
}
a img {
	border: none;
}
img {
	border: 0px;
}
.s-txt {
	font-size: 12px;
	height: 14px;
	line-height: 14px;
	padding: 7px 4px;
	margin: 0 5px 0 0;
	border: #dcdcdc solid 1px;
	border-top-color: #B5B5B5;
	color: #535353
}
.s-txt-focus {
	font-size: 12px;
	height: 14px;
	line-height: 14px;
	padding: 7px 4px;
	margin: 0 5px 0 0;
	border: #4D90FE solid 1px;
	border-top-color: #4D90FE;
	color: #535353;
	box-shadow: 0 0 3px #ccc inset;
	-webkit-box-shadow: 0 0 3px #ccc inset;
	-moz-box-shadow: 0 0 3px #ccc inset
}
.login-wrap {
	width: 532px;
	margin: 0 auto;
	margin-top: 100px
}
.login-wrap .hd {
	width: 500px;
	text-align: center
}
.login-wrap .login-inner {
	background: #EFF3F6 url(<?php echo base_url()?>images/admin/login_box_bg.png) no-repeat;
	width: 532px;
	height: 380px;
	position: relative;
}
.login-wrap .login-inner:after {
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
}
.login-inner .login {
	position: absolute;
	right: 40px;
	top: 70px;
	width: 300px;
	color: #fff;
*width:310px;
*right:30px;
}
.login-inner .login .title {
	color: #535353;
	font-size: 14px;
	font-weight: 700;
	padding: 0 0 10px;
	background: url(<?php echo base_url()?>images/admin/line-bt-double.gif) repeat-x left bottom
}
.login-wrap .fd {
	width: 500px;
	text-align: center;
	height: 16px;
	line-height: 16px;
	padding: 10px 0
}
.login-wrap .login .form-tt {
	display: block;
	float: left;
	height: 16px;
	line-height: 16px;
	padding: 6px 0 0;
	width: 80px;
	text-align: right;
}
.login-wrap .login .form-row {
	margin: 0 0 0 90px
}
.login-wrap .login .form-name {
	margin: 0 0 0 90px;
	height: 16px;
	line-height: 16px;
	padding: 6px 0 0
}
.form-login input {
	vertical-align: middle
}
.form-login ul {
	padding: 15px 0 0;
	margin: 0 auto
}
.form-login ul li {
	padding: 0 0 15px;
	overflow: hidden;
	zoom: 1
}
.form-login label {
	padding: 0 0 5px
}
.form-login .s-txt, .form-login .s-txt-focus {
	width: 200px
}
.form-login a {
	color: #36c;
	text-decoration: none
}
/*蓝色按钮*/
.btn-green-big {
	background: url(<?php echo base_url()?>images/admin/btn-green.png) no-repeat;
	width: 80px;
	height: 30px;
	display: block
}
.btn-green-big span {
	color: #fff;
	display: block;
	line-height: 30px;
	text-align: center
}
.btn-green-big:hover {
	background-position: 0 -40px;
}
</style>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
function changeverify(){
	var date = new Date();
    var ttime = date.getTime();
    var url = "http://www.moonyuan.com/thinksns/public/captcha.php";
    $('#verifyimg').attr('src',url+'?'+ttime);
};
// 绑定回车事件
$(function() {
    $(this).bind('keydown', function(e) {
        var key = e.which;
        if(key == 13) {
            var name = $.trim($('#login_name').val());
            var pwd = $.trim($('#login_pwd').val());
            var verify = $.trim($('#login_verify').val());
            if(name != '' && pwd != '' && verify != '') {
                document.reg.submit();   
            }
        }
    });
});
</script>
</head>
<body>
<!--外包-->
<div class="login-wrap">
  <div class="login"> 
    <!--<div class="hd"><img src="http://www.moonyuan.com/thinksns/apps/admin/_static/image/login-hd-logo.png" /></div>-->
    <div class="login-inner">
      <div class="login"> 
        <!--<div class="title">管理员登录</div>-->
        <form action="http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Public&amp;act=doLogin" name="reg" method="post" class="form-login">
          <ul>
            <li>
              <div class="form-tt">帐号：</div>
              <div class="form-name">管理员</div>
              <div class="form-row">
                <input id="login_name" name="uid" value="1" type="hidden">
              </div>
            </li>
            <li>
              <div class="form-tt">密码：</div>
              <div class="form-row">
                <input id="login_pwd" class="s-txt" onFocus="this.className='s-txt-focus'" onBlur="this.className='s-txt'" name="password" value="" type="password" style="width:140px;height:30px;">
              </div>
            </li>
            <li>
              <div class="form-tt">验证码：</div>
              <div class="form-row">
                <input id="login_verify" class="s-txt" onFocus="this.className='s-txt-focus'" onBlur="this.className='s-txt'" name="verify" value="" style="width:100px;height:30px;">
                <img src="http://www.moonyuan.com/thinksns/public/captcha.php" id="verifyimg" alt="换一张" style="vertical-align:middle;padding:0 5px 0 0" onClick="changeverify()"><!--<a href="javascript:void(0);" onclick="changeverify()">看不清，换一张</a>--> </div>
            </li>
            <li>
              <div class="form-tt"></div>
              <div class="form-row"><a href="#" onClick="document.reg.submit();" class="btn-green-big" style="margin:20px 0 0"><span>登录</span></a>
                <input style="display:none" type="submit">
              </div>
            </li>
          </ul>
        </form>
      </div>
    </div>
    <div class="fd">©2013 m2three All Rights Reserved. </div>
  </div>
</div>
<!--//外包-->

</body>
</html>