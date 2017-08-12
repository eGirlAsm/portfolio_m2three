<?php 		
function getImg($str)
{
	/*$no_img = preg_replace('\'<img[^>]*?>\'', '', $str);
	 单独提取 img 标签
	preg_match_all('\'<img[^>]*?>\'', $text, &$img);
	return $img;*/
     
    $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/"; 
    $icount = preg_match_all($pattern,$str,$match); 
     
    //print_r($match); 	
	return $match;
}			
function DeleteHtml($str)
{
$str = trim($str);
$str = strip_tags($str,"n");
$str = preg_replace("/\s(?=\s)/","",$str);
$str = preg_replace("/[\s]{2,}/","",$str); 
return trim($str);
}
?>
<?php $this->load->view('public/_header'); ?>
<?php $this->load->view('public/toppic'); ?>

<div id="contents">
  <div class="c_left">
    <?=form_open($this->uri->uri_string()) ?>
    <div id="member_login">
      <?php if (!$user_status) {
		$this->load->view('auth/login_form_div');
	}
	else{
		$this->load->view('auth/login_success_div');
	}
	?>
    </div>
    <?=form_close() ?>
    <div id="left_ad" class="n_box"> 
      <script type="text/javascript"><!--
google_ad_client = "ca-pub-7834010976620784";
/* main_left */
google_ad_slot = "8836556752";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script> 
      <script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script> 
    </div>
    <div id="left_job">
      <div class="n_title">
        <div id="btnMenuSelect" class=""> <a href="#areamenu" class="btn_select">북경</a>
          <ul class="pressLst" style="display:none;">
            <li class="on"><a href="#ar0">북경</a></li>
            <li><a href="#ar1">상해</a></li>
            <li><a href="#ar2">청도</a></li>
            <li><a href="#ar3">광주</a></li>
            <li><a href="#ar4">심천</a></li>
            <li><a href="#ar5">연길</a></li>
          </ul>
        </div>
        <h3><a target="_blank" href="<?php echo site_url('job') ?>"><img alt="취업정보" src="<?php echo base_url(); ?>static/images/job_ico_tit.jpg"></a></h3>
      </div>
      <!--navbox end-->
      
      <div id="job_list_1" class="wc">
        <ul style="margin-top: 5px;">
          <?php foreach($joblist->result() as $row): ?>
          <?php if(!$row->is_notice) {?>
          <li>
            <div id="recruit_title"><span class="job_list_area">[<a href=""><?=$row->area?></a>]</span><a href="<?php echo site_url(); ?>job/view/<?=$row->id?>" title="<?=$row->title?>">
              <?=$row->title?>
              </a></div>
          </li>
          <?php } ?>
          <?php endforeach; ?>
        </ul>
      </div>
      <div id="work_list_2" class="wc hide">2</div>
      <div id="work_list_3" class="wc hide">3</div>
      <div id="work_list_4" class="wc hide">4</div>
    </div>
    <!-- left work -->
    <div id="poll_left" class="n_box">
      <div class="n_title">
        <h3><a target="_blank" href="http://www.dcnews.in#poll_title"><img alt="설문조사" src="http://wstatic.dcinside.com/main/main2011/dcmain/title_poll.gif"></img></a></h3>
      </div>
      <div class="section_cnt">
        <p class="question"><a id="research_link" href="http://www.dcnews.in/main/index.html#poll_title" target="_blank"><span id="research_title"><b> 아직도 IE 6 浏览器 쓰고있는 사람? </b></span></a></p>
      </div>
    </div>
  </div>
  <!-- c_left -->
  
  <div class="c_center">
    <div id="main_news">
      <div id="main_news_header">
        <h2></h2>
      </div>
      <div id="main_news_list">
        <div id="main_photo_news_top">
          <?php $row = $news->result();?>
          <?php for($j = 0;$j < 6;$j++) {?>
          <?php if($row[$j]->post_type =="image"){?>
          <dl class="mtype_img">
            <dt> <a href="<?=site_url().'community/news/'.$row[$j]->ID;?>"> <img  style="width:130px;height:80px;" src="<?php $Iimg = getImg($row[$j]->post_content);echo $Iimg[1][0];?>"  alt="<?=$row[$j]->post_title?>" /> <span class="trans_border"></span> </a> </dt>
            <dd>
              <p> <a href="<?=site_url().'community/news/'.$row[$j]->ID;?>" title="<?=$row[$j]->post_title?>" class="">
                <?=$row[$j]->post_title?>
              </p>
              <div class="box_trans"></div>
            </dd>
          </dl>
          <?php break;}} ?>
        </div>
        <div id="main_text_news_top">
          <div id="text_news_list1" class="txtNewsList"> <strong class="h2"><a href="<?=site_url().'community/news/'.$row[0]->ID;?>"><span>
            <?=$row[0]->post_title?>
            </span></a></strong>
            <ul>
              <p>
                <?=sub_str(DeleteHtml($row[0]->post_content),50)?>
                <a href="<?=site_url().'community/news/'.$row[0]->ID;?>" class="imp">[더보기]</a></p>
              <?php for($i = 1;$i < 6;$i++) {?>
              <li><span><a href="<?=site_url().'community/news/'?>" class="imp" >[사회]</a></span><a class="news_tit" href="<?=site_url().'community/news/'.$row[$i]->ID;?>">
                <?=$row[$i]->post_title?>
                </a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <!-- text_news_top  --> 
        <!-- <div id="main_prenext_btn"> <a class="pre" href="#" title="이전"><span> 이전 </span></a> <a class="next" href="#" title="다음"><span> 다음 </span></a> </div> --> 
      </div>
      <!-- main_news_list  --> 
    </div>
    <!-- main_news  --> 
    <!-- user issue -->
    <div id="main_user_issue">
      <h2></h2>
      <span class="openTab"> <a class="tab1"><strong>추천</strong></a> <a class="tab2">인기</a> <a class="tab3">모임</a> <a class="tab4">자작글</a> </span>
      <div id="" class="openTab_l">
        <?php foreach($allposts->result() as $row): ?>
        <p><a href="<?php echo site_url(); ?>/community/freetalk/<?=$row->ID?>">
          <?=$row->post_title;?>
          </a></p>
        <?php endforeach; ?>
      </div>
      <div id="" class="openTab_l" style="display:none;">
        <p><a href="">이 양언니지만 난 샤트너옹이 마다 존예다</a></p>
        <p><a href="">이 양지만 난 샤트너옹이 놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니지만 난 샤트너옹이 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 지만 난 샤트너옹이 때마다 존예다</a></p>
        <p><a href="">이 양언니 지만 난 샤트너옹이 마다 존예다</a></p>
        <p><a href="">헐 ㄷㄷ이겠지만 난 샤트너옹이 존조한테 생일축하 멘션준 거 몰랐다....[25]</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 지만 난 샤트너옹이 때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누지만 난 샤트너옹이 때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
      </div>
      <div id="" class="openTab_l" style="display:none;">
        <p><a href="">이 양asdfasdfasdfasd존예다</a></p>
        <p><a href="">이 양지만 난 샤트너옹이 놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니지만 난 샤트너옹이 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 지만 난 샤트너옹이 때마다 존예다</a></p>
        <p><a href="">이 양언니 지만 난 샤트너옹이 마다 존예다</a></p>
        <p><a href="">헐 ㄷㄷ이겠지만 난 샤트너옹이 존조한테 생일축하 멘션준 거 몰랐다....[25]</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 지만 난 샤트너옹이 때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누지만 난 샤트너옹이 때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
      </div>
      <div id="" class="openTab_l" style="display:none;">
        <p><a href="">이 양234234234234234234존예다</a></p>
        <p><a href="">이 양지만 난 샤트너옹이 놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니지만 난 샤트너옹이 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 지만 난 샤트너옹이 때마다 존예다</a></p>
        <p><a href="">이 양언니 지만 난 샤트너옹이 마다 존예다</a></p>
        <p><a href="">헐 ㄷㄷ이겠지만 난 샤트너옹이 존조한테 생일축하 멘션준 거 몰랐다....[25]</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 지만 난 샤트너옹이 때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누지만 난 샤트너옹이 때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
        <p><a href="">이 양언니 누놔장 볼때마다 존예다</a></p>
      </div>
    </div>
    <script type="text/javascript">
$(document).ready(function(){
  $(".openTab a").hover(function(){
	$(".openTab a").each(function(){
		var c = $(this).text();
		$(this).children("strong").remove();
		$(this).text(c);
	});
	$(this).wrapInner("<strong></strong>");
	var i = $(this).index();
    $('.openTab_l').hide();
	$('.openTab_l').eq(i).show();
  });
});
</script> 
    <!-- user issue end -->
    <div id="business_center" class="n_box">
      <ul class="ctMenu">
        <li id="first_nobold" class ="on"><a href ="#s0">친구사귀기</a></li>
        <li><a href ="#s1">부동산</a></li>
        <li><a href ="#s2">중고거래</a></li>
        <li><a href ="#s3">세집/합숙</a></li>
        <li><a href ="#s4">비  자</a></li>
      </ul>
      <div id="" class="userPic_l">
        <div id="" class="bslist">
          <ul>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/mn001.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">다스게떼~~</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/mn002.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">다스게떼~~</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/mn003.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">다스게떼~~</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/mn004.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">다스게떼~~</a></div>
            </li>
          </ul>
        </div>
        <div id="" class="bslist" style="display:none;">
          <ul>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf001.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">새장식한집 70평</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf002.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">73평 급히 팝니다</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf003.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">연변대학 마즌켠 70평 팝니다</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf004.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">연대앞에 땐티러우 97평 세줌니다</a></div>
            </li>
          </ul>
        </div>
         <div id="" class="bslist" style="display:none;">
          <ul>
            <li>
              <div class="picbox"><a href=""><img src="http://m2three.u.qiniudn.com/sc1.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">새장식한집 70평</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="http://m2three.u.qiniudn.com/sc2.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">73평 급히 팝니다</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="http://m2three.u.qiniudn.com/sc3.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">연변대학 마즌켠 70평 팝니다</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="http://m2three.u.qiniudn.com/sc4.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">연대앞에 땐티러우 97평 세줌니다</a></div>
            </li>
          </ul>
        </div>
                <div id="" class="bslist" style="display:none;">
          <ul>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf001.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">새장식한집 70평</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf002.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">73평 급히 팝니다</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf003.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">연변대학 마즌켠 70평 팝니다</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf004.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">연대앞에 땐티러우 97평 세줌니다</a></div>
            </li>
          </ul>
        </div>
         <div id="" class="bslist" style="display:none;">
          <ul>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf001.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">새장식한집 70평</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf002.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">73평 급히 팝니다</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf003.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">연변대학 마즌켠 70평 팝니다</a></div>
            </li>
            <li>
              <div class="picbox"><a href=""><img src="<?php echo base_url(); ?>static/images/zf004.jpg" width="" height="" border="0" alt="mn001"></a></div>
              <div class="txtbox">
                <p>감자파는 여자<span> 2457 </span></p>
                <a href="javascript:;">연대앞에 땐티러우 97평 세줌니다</a></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- c_center --> 
  <script type="text/javascript">
	$(document).ready(function(){
	  $(".ctMenu li a").click(function(){
		  
		  $(".ctMenu li").removeClass("on");
		  
		  for(var i=0;i< $(".bslist").length;i++){
		  	$(".bslist").eq(i).css("display","none");
		  }
		  
		  var i = $(this).index(".ctMenu a");
		  $(".ctMenu li").eq(i).addClass("on");
		  $(".bslist").eq(i).css("display","block");
	  });
	});
</script>
  <div class="c_right">
    <div id="right_ad" style="height:250px;text-align: center;"> 
      <script charset="gbk" src="http://p.tanx.com/ex?i=mm_45624021_4246630_14414391"></script></div>
    <div id="right_top">
      <div id="right_note">
        <h3></h3>
        <?php echo validation_errors(); ?> <?php echo form_open('home/weibo'); ?>
        <textarea name="hopeNote" rows="" cols="" placeholder="지금의 기분은 땡!."></textarea>
        <button type="submit"></button>
        </form>
        <ul>
          <?php foreach($weibo->result() as $row): ?>
          <li> <span class="portrait"><a href="http://my.m2three.com/egirlasm" target="_blank"><img src="http://static.oschina.net/uploads/user/279/558212_50.jpg?t=1351873473000" alt="AidenWang" title="AidenWang" class="SmallPortrait" user="558212" align="absmiddle"></a></span> <span class="body"> <span class="user"><a href="http://my.oschina.net/aidenwang">
            <?=$row->author?>
            </a>：</span><span class="log">
            <?=$row->content?>
            </span> <span class="time">
            <?=fmtime(strtotime($row->creattime))?>
            (<a href="http://my.oschina.net/aidenwang/tweet/2548296">0 댓글</a>)
            <?=$row->device?>
            </span> </span>
            <div class="clear"></div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- contents --> 
<script type="text/javascript">
$(document).ready(function(e) {
    $("#btnMenuSelect").click(function(){
		if($(this).find('.pressLst').css("display") == "none")
			$(this).find('.pressLst').css("display","block");
		else
			$(this).find('.pressLst').css("display","none");
	})
	
	$("#btnMenuSelect li a").click(function(){
		$(".btn_select").text($(this).text());
	})
});
</script>
<?php $this->load->view('public/_footer'); ?>
