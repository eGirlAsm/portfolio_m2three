<?php $row = $g_list->result(); //先获取数组?>
<?php $this->load->view('public/_header'); ?>

<div class="content">
  <div class="channel_info" style="float: right;width: 724px;"> 오늘 올린 갤러리:130개 ,총 1233개</div>
  <div class="gallery_sidebar">
    <div class="item_wrap">
      <h2>CATEGORY</h2>
      <div class="nav_item">
        <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>전체</a></h3>
        <div class="third_channel show_third_channel clear"> <a href="#"><span>풍경</span></a> <a href="#"><span>생활</span></a> <a href="#"><span>만화</span></a> <a href="#"><span>개그</span></a> </div>
      </div>
      <div class="nav_item">
        <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>여성</a></h3>
        <div class="third_channel show_third_channel clear"> <a href="#"><span>청순</span></a> <a href="#"><span>섹시</span></a> <a href="#"><span>어린이</span></a> <a href="#"><span>코피</span></a> </div>
      </div>
      <div class="nav_item">
        <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>음식</a></h3>
        <div class="third_channel show_third_channel clear"> <a href="#"><span>라면</span></a> <a href="#"><span>볶음채</span></a> <a href="#"><span>단 음식</span></a> <a href="#"><span>메뉴</span></a> </div>
      </div>
    </div><!--item_wrap-->
    <div class="blog_item">
    <h2>광고나 여차</h2>
  </div>
  <div id="col0" class="col">
    <?php 
  $i = 3;
  $count = count($row);
  do{
?>
    <div class="blog_item">
      <div class="blog_pic" ><a target="_blank" href="#<?=$row[$i]->id?>"><img src="<?=$row[$i]->image?>"></a></div>
      <div class="blog_user"><a target="_blank"  href="#" class="user_pic"><img src="http://static.oschina.net/uploads/user/285/570911_100.jpg?t=1375435968000"></a><a target="_blank" href="#" class="user_name">
        <?=$row[$i]->author?>
        </a><a href="#" class="add_attention add_state" >관심+</a></div>
      <div class="clear"></div>
      <div class="blog_info">
        <p>
          <?=$row[$i]->content?>
        </p>
        <a target="_blank" href="#" class="blog_time">4분전<i class="l"></i></a>
        <p class="hot_channel"><a href="#" title="来自“草根声音”微频道"><span class="ico_bookmark"></span>草根声音</a></p>
      </div>
      <div class="blog_option"><a href="#" class="option_item"><span title="보관" class="ico_collect js_fav"></span></a><span class="split"></span><a class="option_item js_comt">댓글쓰기</a><span class="split"> </span><a class="option_item js_relay">가져오기 <em class="num">4</em></a> </div>
    </div>
    <?php 
 $i = $i+4;
 }while($i < $count); 
?>
  </div>
  </div><!--side_bar-->

<div class="right_adsence">
  <div style="margin-left:20px;float:left;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
    <!-- gallery --> 
    <ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-7834010976620784"
     data-ad-slot="3161466358"></ins> 
    <script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
  <div class="upload_gallery">
    <h3>사진 올리기</h3>
    <div class="upload_content" style="padding:10px;"> <?php echo form_open_multipart('gallery/do_upload');?>
      <input type="file" name="userfile" />
      <textarea name="content" style="width: 335px;height: 80px;"></textarea>
      <br/>
      <input type="submit" class="btn btn-primary"  width="180px" value="올리기" />
      </form>
    </div>
  </div>
</div>
  <div class="right_wrap" style="margin-top:20px;">
    <div id="col1" class="col">
      <?php 
  $i = 0;
  $count = count($row);
  do{
?>
      <div class="blog_item">
        <div class="blog_pic" ><a target="_blank" href="#<?=$row[$i]->id?>"><img src="<?=$row[$i]->image?>"></a></div>
        <div class="blog_user"><a target="_blank"  href="#" class="user_pic"><img src="http://static.oschina.net/uploads/user/285/570911_100.jpg?t=1375435968000"></a><a target="_blank" href="#" class="user_name">
          <?=$row[$i]->author?>
          </a><a href="#" class="add_attention add_state" >관심+</a></div>
        <div class="clear"></div>
        <div class="blog_info">
          <p>
            <?=$row[$i]->content?>
          </p>
          <a target="_blank" href="#" class="blog_time">4분전<i class="l"></i></a>
          <p class="hot_channel"><a href="#" title="来自“草根声音”微频道"><span class="ico_bookmark"></span>草根声音</a></p>
        </div>
        <div class="blog_option"><a href="#" class="option_item"><span title="보관" class="ico_collect js_fav"></span></a><span class="split"></span><a class="option_item js_comt">댓글쓰기</a><span class="split"> </span><a class="option_item js_relay">가져오기 <em class="num">4</em></a> </div>
      </div>
      <?php 
 $i = $i+4;
 }while($i < $count); 
?>
    </div>
    <!-- ************************************************************   col 2 *********************************************************************** -->
    <div id="col2" class="col">
      <?php 
  $i = 1;
  $count = count($row);
  do{
?>
      <div class="blog_item">
        <div class="blog_pic" ><a target="_blank" href="#<?=$row[$i]->id?>"><img src="<?=$row[$i]->image?>"></a></div>
        <div class="blog_user"><a target="_blank"  href="#" class="user_pic"><img src="http://static.oschina.net/uploads/user/285/570911_100.jpg?t=1375435968000"></a><a target="_blank" href="#" class="user_name">
          <?=$row[$i]->author?>
          </a><a href="#" class="add_attention add_state" >관심+</a></div>
        <div class="clear"></div>
        <div class="blog_info">
          <p>
            <?=$row[$i]->content?>
          </p>
          <a target="_blank" href="#" class="blog_time">4분전<i class="l"></i></a>
          <p class="hot_channel"><a href="#" title="来自“草根声音”微频道"><span class="ico_bookmark"></span>草根声音</a></p>
        </div>
        <div class="blog_option"><a href="#" class="option_item"><span title="보관" class="ico_collect js_fav"></span></a><span class="split"></span><a class="option_item js_comt">댓글쓰기</a><span class="split"> </span><a class="option_item js_relay">가져오기 <em class="num">4</em></a> </div>
      </div>
      <?php 
 $i = $i+4;
 }while($i < $count); 
?>
    </div>
    <!-- ************************************************************   col 3 *********************************************************************** -->
    <div id="col3" class="col">
      <?php 
  $i = 2;
  $count = count($row);
  do{
?>
      <div class="blog_item">
        <div class="blog_pic" ><a target="_blank" href="#<?=$row[$i]->id?>"><img src="<?=$row[$i]->image?>"></a></div>
        <div class="blog_user"><a target="_blank"  href="#" class="user_pic"><img src="http://static.oschina.net/uploads/user/285/570911_100.jpg?t=1375435968000"></a><a target="_blank" href="#" class="user_name">
          <?=$row[$i]->author?>
          </a><a href="#" class="add_attention add_state" >관심+</a></div>
        <div class="clear"></div>
        <div class="blog_info">
          <p>
            <?=$row[$i]->content?>
          </p>
          <a target="_blank" href="#" class="blog_time">4분전<i class="l"></i></a>
          <p class="hot_channel"><a href="#" title="来自“草根声音”微频道"><span class="ico_bookmark"></span>草根声音</a></p>
        </div>
        <div class="blog_option"><a href="#" class="option_item"><span title="보관" class="ico_collect js_fav"></span></a><span class="split"></span><a class="option_item js_comt">댓글쓰기</a><span class="split"> </span><a class="option_item js_relay">가져오기 <em class="num">4</em></a> </div>
      </div>
      <?php 
 $i = $i+4;
 }while($i < $count); 
?>
    </div>
    <!-- --> 
    
  </div>
</div>
<div class="clear"></div>
<?php $this->load->view('public/_footer'); ?>
<script type="text/javascript">
$(document).ready(function(){
	
	$('#popForm').click(function(){
		$('#popWindow').css('display','block');	
	})
});
</script> 
