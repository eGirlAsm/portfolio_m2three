<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/ico" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link href="<?php echo base_url()?>static/css/reset.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all"  />
<link rel="stylesheet" href="<?php echo base_url()?>static/css/layout.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all"  />
<link rel="stylesheet" href="<?php echo base_url()?>static/css/common.css?<?php echo time(); ?>" rel="stylesheet"  type="text/css" media="all"  />
<?php if($css){ ?>
<?php echo link_tag('static/css/'.$cssfile.'?'.time()); ?>
<?php } ?>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>static/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>static/js/jquery.tools.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>static/js/m2three.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>static/js/common.js" ></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){	
	  var lastIndex;
	  var navCurrent="<?php echo $nav;?>";
	  
	  
	  
	  
	  
	  for (var i = 0; i < 10; i++) {
		navText = $("#menu > li > a").eq(i).text();
		if (navText == navCurrent) {
			$("#menu > li > a").eq(i).addClass("on");
			lastIndex = $("#menu > li > a").eq(i);
			}
		}
		
	  $("#menu > li > a").click(function(){
	  $(this).addClass("on");
	  if(lastIndex != null)
	  	lastIndex.removeClass("on");
	  lastIndex = $(this);
	  });
	  
	  	$("#J_site_menu").mouseover(function(){

		if($("#J_site_menu_list").css("display") == "none")
			$("#J_site_menu_list").show();
		else
			$("#J_site_menu_list").hide();
				
	})
	  
	});

(function(a){
	a.fn.hoverClass=function(b){
		var a=this;
		a.each(function(c){
			a.eq(c).hover(function(){
				$(this).addClass(b)
			},function(){
				$(this).removeClass(b)
			})
		});
		return a
	};
	
	

	
})(jQuery);

$(function(){
	$("#navbox").hoverClass("current");
});


	    function addEvent( obj, type, fn ) {
        if ( obj.attachEvent ) {
            obj['e'+type+fn] = fn;
            obj[type+fn] = function(){obj['e'+type+fn]( window.event );}
            obj.attachEvent( 'on'+type, obj[type+fn] );
        } else
            obj.addEventListener( type, fn, false );
    }


</script>
</head>

<body>
<div class="m23-topbar-wrap">
  <div class="m23-topbar">
    <div class="inner">
      <div class="inner-left">엠투쓰리에 온것을 환영합니다，
        <?php 
	  if ($user_status){ 
	  	echo '<a href="'.site_url().'mypage/index'.'" class="login-uname aysw-topbar-uname">'.$username.'</a>&nbsp;님'.'<i></i><a href="'.site_url().'mypage/message'.'">쪽찌함(0)</a>'.'<i></i>'.anchor('/auth/logout/', '로그아웃');}
	  else{ 
	  	echo '<a href="'.site_url().'/auth/login" class="login">로그인</a><i></i>'.anchor('/auth/register/', '회원가입');
	  }
	  ?>
      </div>
      <div class="inner-right"><a href="<?php echo site_url();?>">처음으로</a><i></i><a href="<?php echo site_url('space');?>">사람찾기</a><i></i><a href="#" target="_blank">광고안내</a><i></i><a href="<?php echo site_url(); ?>community/advise">의견사항</a> </div>
    </div>
  </div>
</div>
<div class="header" style="min-width:997px;">
  <div class="header-wrap" data-spm="1">
    <div class="header-inner"><a href="<?php echo site_url(); ?>">
      <h1 class="logo">엠투쓰리</h1>
      </a>
      <div class="search-form" style="position:relative;left:140px;">
        <?=form_open($this->uri->uri_string().'?m=search')?>
        <input type="hidden" name="i" value="1">
        </input>
        <input id="keyword" class="search-wrod" type="text" value="" speech="" x-webkit-speech="" placeholder="음악,영화,드라마,커뮤니티 검색" name="q" autocomplete="off">
        </input>
        <button class="btn btn-primary search-btn" type="submit" style="height: 38px;position:relative;vertical-align:auto;top:-2px;width:78px;"> 바로검색</button>
        <?=form_close() ?>
        <div id="search-sug">
          <ul class="ac_results" style="top: 56px;
left: 760px; display: none;">
            <li>그냥 가는너</li>
            <li>냥 가는너</li>
            <li>냥 가는너</li>
            <li>냥 가는너</li>
            <li>냥 가는너</li>
            <li>냥 가는너</li>
            <li>냥 가는너</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div id="nav">
  <ul id="menu">
    <li><a class="home" title="처음으로" href="<?php echo base_url(); ?>"></a></li>
    <em></em> 
    <!--<li><a href="<?php echo site_url('music') ?>"  class="one m1">음악</a></li>
      <li><a href="<?php echo site_url('movie') ?>"  class="one m2">영화</a> </li>
      <li><a href="<?php echo site_url('drama') ?>"  class="one m3">드라마</a></li>
      <li><a href="<?php echo site_url('tvShow') ?>"  class="one m4">오락프로</a></li>
      <li><a href="<?php echo site_url('children') ?>"  class="one m5">아동영화</a></li> -->
    <li><a class="gallery" title="갤러리" href="<?php echo site_url('gallery') ?>"  class="one m5"></a></li>
    <em></em>
    <li><a class="job" title="정보광장" href="<?php echo site_url('job') ?>"  class="one m6"></a></li>
    <em></em> 
    
    <!--<li><a href="<?php echo site_url('game') ?>"  class="one m7">게임</a></li>
     <li><a href="<?php echo site_url('lovedate') ?>"  class="one m8">데이트<em id="datemoyim">|</em>모임</a></li> -->
    <li><a class="community" title="커뮤니티" href="<?php echo site_url('community') ?>"  class="one m9"></a></li>
  </ul>
</div>
