<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>엠투쓰리 :: 페이지를 찾을수 없습니다.</title>
<link rel="stylesheet" href="<?php echo base_url()?>static/css/common.css?<?php echo time(); ?>" rel="stylesheet"  type="text/css" media="all"  />
<style type="text/css">
@charset "utf-8";
* { margin: 0; padding: 0; }
body { background: rgb(243,243,243); color: #444; font: 12px/1.7em 굴림, Gulim, AppleGothic, sans-serif; text-align: center; }
img, fieldset { border: none; }
a { color: #438a01; text-decoration: underline; }
legend { display: none; }
#wrap { width: 560px; _height: 618px;  margin: 0 auto; text-align: left; }
#header { overflow: hidden; position: relative; height: 80px; }
#header h1 { margin: 36px 0 0 26px; }
#header .menu { overflow: hidden; position: absolute; top: 23px; right: 28px; width: 100%; color: #d7d7d7; font-family: 돋움, Dotum; letter-spacing: -1px; text-align: right; }
#header .menu a { margin: 0 3px; color: #444; text-decoration: none; }
#header .menu a:hover { text-decoration: underline; }
#container { padding: 33px 20px 0 81px; }
#container h2 { margin-bottom: 24px; font: bold 14px/1.6em 돋움, Dotum; letter-spacing: -1px; }
#container .content p { margin-bottom: 10px; }
.search { margin-top: 30px; }
.window02 { margin-bottom: 0; }
.box_window { width: 320px; height: 22px; _height /**/: 32px; margin: 0 3px 11px 1px; padding: 1px 3px 0 6px; border: 5px solid #4ba300; background-color: #fff; font: bold 15px/1.5em 돋움, Dotum; vertical-align: 4px; }
*+html .box_window { vertical-align: 4px; }
.btn_window { vertical-align: top; _vertical-align: 0; _vertical-align /**/: top; }
.sch_desc { width: 391px; text-align: center; }
.sch_link { width: 391px; margin-left: -1px; color: #dedede; text-align: center; }
.sch_link a { margin: 0 3px; color: #444; text-decoration: none; }
.sch_link a:hover { text-decoration: underline; }
#error_footer { margin-top: 80px; text-align: center; }
#error_footer a { text-decoration: none; color: #333; }
#error_footer a:visited { text-decoration: none; color: #666; }/* 090923 해당라인 삭제 */
#error_footer a:hover { text-decoration: underline; }
#error_footer address { font: 9px/14px Verdana; }
#error_footer address img { vertical-align: middle; }
#error_footer address a { font: bold 9px Tahoma; color: #333; }
#error_footer address a:hover { color: #009bc8; }
#error_footer address span { padding-left: 2px; font: 9px/14px Verdana; }
#error_footer address em { padding-left: 6px; font: 9px verdana; }
#error_footer address .logo { display: inline-block; *display:inline;
vertical-align: top; *vertical-align:baseline;
}
</style>
</head>
<body>
<div id="wrap">
  <div id="header">
    <h1><a href="<?=site_url();?>"><img src="http://m2three.u.qiniudn.com/logo.png" alt="NAVER" height="33" width="145"></a></h1>
    <p class="menu"><a href="<?=site_url();?>">첨페이지로가기</a> | <a href="<?=site_url();?>community/advise">고객센터</a></p>
  </div>
  <div id="container">
    <h2>죄송합니다.<br>
      요청하신 페이지를 찾을 수 없습니다.</h2>
    <div class="content">
      <p>방문하시려는 페이지의 주소가 잘못 입력되었거나,<br>
        페이지의 주소가 변경 혹은 삭제되어 요청하신 페이지를 찾을 수 없습니다.</p>
      <p>입력하신 주소가 정확한지 다시 한번 확인해 주시기 바랍니다.</p>
      <p>관련 문의사항은 <a href="<?=site_url();?>community/advise">고객센터</a>에 알려주시면 친절하게 안내해 드리겠습니다.</p>
      <p>감사합니다.</p>
    </div>
    <div class="search-form" style="position:relative;left:60px;">
      <?=form_open($this->uri->uri_string().'?m=search')?>
      <input type="hidden" name="i" value="1">
      </input>
      <input id="keyword" class="search-wrod" type="text" value="" speech="" x-webkit-speech="" placeholder="음악,영화,드라마,커뮤니티 검색" name="q" autocomplete="off">
      </input>
      <button class="btn btn-primary search-btn" type="submit" style="height: 38px;position:relative;vertical-align:auto;top:-2px;width:78px;"> 바로검색</button>
     
      <?=form_close() ?>
    </div>
     <p class="sch_desc">엠투쓰리 검색으로 원하시는 페이지를 찾으실 수 있습니다.</p>
  </div>
</div>
<div id="error_footer">
  <address>
  <a href="<?=site_url();?>" target="_blank" class="logo">m2three</a> <em>Copyright ©</em> <a href="<?=site_url();?>" target="_blank">m2three </a> <span>All Rights Reserved.</span>
  </address>
</div>
</div>
</body>
</html>