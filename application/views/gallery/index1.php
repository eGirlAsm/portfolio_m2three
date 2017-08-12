<?php $this->load->view('public/_header'); ?>
<script type="text/javascript" src="js/jquery.masonry.js"></script>
<script type="text/javascript" src="js/jquery.infinitescroll.js"></script>
<script type="text/javascript">
function item_masonry(){ 
	$('.imgholder img').load(function(){ 
		$('#container').masonry({ 
			itemSelector: '.masonry_brick',
			columnWidth:226,
			gutterWidth:15								
		});		
	});
		
	$('#container').masonry({ 
		itemSelector: '.masonry_brick',
		columnWidth:226,
		gutterWidth:15								
	});	
}

$(function(){

	function item_callback(){ 
		
		$('.item').mouseover(function(){
			$(this).css('box-shadow', '0 1px 5px rgba(35,25,25,0.5)');
			$('.btns',this).show();
		}).mouseout(function(){
			$(this).css('box-shadow', '0 1px 3px rgba(34,25,25,0.2)');
			$('.btns',this).hide();		 	
		});
		
		item_masonry();	

	}

	item_callback();  

	$('.item').fadeIn();

	var sp = 1
	
	$("#container").infinitescroll({
		navSelector  	: "#more",
		nextSelector 	: "#more a",
		itemSelector 	: ".item",
		
		loading:{
			img: "images/masonry_loading_1.gif",
			msgText: ' ',
			finishedMsg: '木有了',
			finished: function(){
				sp++;
				if(sp>=10){ //到第10页结束事件
					$("#more").remove();
					$("#infscr-loading").hide();
					$("#page").show();
					$(window).unbind('.infscr');
				}
			}	
		},errorCallback:function(){ 
			$("#page").show();
		}
		
	},function(newElements){
		var $newElems = $(newElements);
		$('#container').masonry('appended', $newElems, false);
		$newElems.fadeIn();
		item_callback();
		return;
	});

});
</script>



<section id="wrapper">
  <section id="sidebar"> <?php echo $error;?> <a href="javascript:void(0)" id="popForm">글쓰기</a>
    <div id="popWindow" style="display:none"> <?php echo form_open_multipart('gallery/do_upload');?>
      <input type="file" name="userfile" />
      <textarea name="content"></textarea>
      <input type="submit" value="올리기" />
      </form>
    </div>
    <div id="galleryMenu">
      <h2><span class="ico_hot"></span><span class="hot_text">카테고리</span></h2>
      <div class="item">
        <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>전체보기</a></h3>
        <div class="third_channel show_third_channel clear"> <a href="#"><span>추천</span></a> <a href=""><span>인기</span></a> <a href=""><span>베스트</span></a> <a href=""><span>댓글많은것</span></a> </div>
      </div>
      <div class="item">
        <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>생활</a></h3>
        <div class="third_channel show_third_channel clear"> <a href="#"><span>인생</span></a> <a href=""><span>친구</span></a> <a href=""><span>명언</span></a> <a href=""><span>사랑</span></a> </div>
      </div>
      <div class="item">
        <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>생활</a></h3>
        <div class="third_channel show_third_channel clear"> <a href="#"><span>인생</span></a> <a href=""><span>친구</span></a> <a href=""><span>명언</span></a> <a href=""><span>사랑</span></a> </div>
      </div>
      <div class="item">
        <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>생활</a></h3>
        <div class="third_channel show_third_channel clear"> <a href="#"><span>인생</span></a> <a href=""><span>친구</span></a> <a href=""><span>명언</span></a> <a href=""><span>사랑</span></a> </div>
      </div>
      <div class="item">
        <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>생활</a></h3>
        <div class="third_channel show_third_channel clear"> <a href="#"><span>인생</span></a> <a href=""><span>친구</span></a> <a href=""><span>명언</span></a> <a href=""><span>사랑</span></a> </div>
      </div>
      <div class="item">
        <h3 class="channel_title"><a href="#"><span class="wpd_ic wpd_ico_3"></span>생활</a></h3>
        <div class="third_channel show_third_channel clear"> <a href="#"><span>인생</span></a> <a href=""><span>친구</span></a> <a href=""><span>명언</span></a> <a href=""><span>사랑</span></a> </div>
      </div>
    </div>
  </section>
  <div id="container">
   <?php foreach($g_list->result() as $row): ?>
    <div class="grid">
      <div class="imgholder"> <img src="<?=$row->image?>" /> </div>
      <div class="user"><a class="userpic" href="#"><img src="http://static.oschina.net/uploads/user/279/558212_50.jpg?t=1351873473000" title="bade90"   /></a><a class="mini_user_name" href="#"><?=$row->author?></a><a href="#">aaa</a></div>
      <div class="g-info">
        <p><?=$row->content?></p>
      </div>
      <div class="g-meta"><a class="g-like" href="javascript:void(0)"><span class="ico_collect js_fav" title="좋아함"></span></a><span class="split"></span><a href="javascript:void(0)" class="g-com">글쓰기</a></div>
    </div>
    <?php endforeach; ?>
      <div class="box showpic">
    <div class="picbox"> <a href="http://www.17sucai.com/" target="_blank"><img width="150" height="150" alt="<?=$row->image?>" src="<?=$row->image?>" /></a> </div>
    <p>
      <?=$row->content?>
    </p>
    <div class="actions">
      <div class="lefter"><a class="button white" href="#">评论</a></div>
      <div class="righter"><a class="button white" href="#">喜欢</a><a class="button white" href="#">分享</a></div>
    </div>
  </div>
    		<div id="more" class="">
			<?php echo $this->pager->page('gallery/index',$current);?>
		</div>
    <!----> 
  </div>
</section>
<script src="<?php echo base_url(); ?>static/js/blocksit.min.js"></script> 
<script>
$(document).ready(function() {
	//vendor script
	$('#wrapper ')
	.css({ 'top':-50 })
	.delay(1000)
	.animate({'top': 0}, 800);
	
	$('#footer')
	.css({ 'bottom':-15 })
	.delay(1000)
	.animate({'bottom': 0}, 800);
	
	//blocksit define
	$(window).load( function() {
		$('#container').BlocksIt({
			numOfCol: 3,
			offsetX: 8,
			offsetY: 8
		});
	});
	
	//window resize
	var currentWidth = 730;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = 2
		} else if(winWidth < 880) {
			conWidth = 660;
			col = 3
		} else if(winWidth < 730) {
			conWidth = 880;
			col = 4;
		} else {
			conWidth = 730;
			col = 5;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#container').width(conWidth);
			$('#container').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
	
	
	
});
</script> 

<?php $this->load->view('public/_footer'); ?>
