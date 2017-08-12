<?php $this->load->view('public/_header'); ?>

<div id="job_contents">
  <div class="job_center">
    <div id="job_list">
      <div id="job_list_header" ><a href="<?php echo site_url(); ?>job">
        <h2></h2>
        </a><span class="other_info">
        <dl>
          <dt>
            <h4>다른것도 슬슬 볼가?</h4>
          </dt>
          <dd><a class="on" href="<?php echo site_url(); ?>job">취업정보</a> </dd>
          <dd><a href="<?php echo site_url(); ?>talent">인재정보</a> </dd>
          <dd><a href="<?php echo site_url(); ?>house">부동산</a> </dd>
          <dd> <a href="<?php echo site_url(); ?>tenement">세집/합숙</a> </dd>
          <dd> <a href="<?php echo site_url(); ?>secondhand">중고거래</a> </dd>
          <dd> <a href="<?php echo site_url(); ?>car">차량매매</a> </dd>
        </dl>
        </span> </div>
      <div id="job_view_container">

        <h1><img src="<?php echo base_url(); ?>static/images/icon1.gif" alt="flag"  />
          <?php if ($qr_list->num_rows() > 0) $row = $qr_list->row();echo $row->title;?>
        </h1>
        <div id="job_view_info"> <span class="jobMemberIcon"><img src="<?php echo base_url(); ?>static/images/online_member.gif" width="15" height="15" border="0" alt="온라인"></span><span class="jobMemberName"><a href="#"><font color="#000099">
          <?php if ($qr_list->num_rows() > 0) $row = $qr_list->row();echo $row->author;?>
          </font></a></span> <span id="job_view_time">
          <?php if ($qr_list->num_rows() > 0) $row = $qr_list->row();echo $row->time;?>
          </span> <span class="pipe">|</span><a href="#">주소복사</a><span class="pipe">|</span><a href="#">신고</a> </div>
        <div id="job_view_content"> <br>
          <pre><?php if ($qr_list->num_rows() > 0) $row = $qr_list->row();echo $row->content;?></pre>
          <br>
          <br>
          <br>
          <br>
        </div>
        <div id="job_view_comment"> 
          <?php if (!$user_status) {
				echo "댓글사용은 ".anchor('/auth/login/', '로그인')."을 하셔야 쓰기가 가능합니다,아이디가 없으세요？ ".anchor('/auth/register/', '엠투쓰리에 가입하기');
		    }
			else{
				?>
          <h3> <?php if ($qr_list->num_rows() > 0) $row = $qr_list->row();echo $row->comment_count;?> 개 댓글</h3>
          <ol class="comment_list">
           <?php foreach($comment_list->result() as $row): ?>
           
            <li id="li-comment-<?=$row->comment_ID?>">
              <div id="comment-<?=$row->comment_ID?>">
                <div class="avatar"><img alt="" src="http://m2three.u.qiniudn.com/570911_100.jpg" class="avatar avatar-40 photo" height="40" width="40"></div>
                <div class="comment">
                  <div class="comment_meta"> <cite> <?=$row->comment_author?></cite> <span class="time"><?= date("y-m-d h:m:s",strtotime($row->comment_date)) ?></span> <span class="reply"><a class="comment-reply-link" href="javascript:void(0)" onclick="return addComment.moveForm(&quot;comment-<?=$row->comment_ID?>&quot;, &quot;<?=$row->comment_ID?>&quot;, &quot;respond&quot;, &quot;72&quot;)">답변</a></span> </div>
                  <p><?=$row->comment_content?></p>
                </div>
              </div>
                <?php foreach($comment_list->result() as $children): //循环?>
          <?php if($children->comment_parent == $row->comment_ID){ ?>
          <ol class="children">
            <li id="li-comment-<?=$children->comment_ID?>">
              <div id="comment-<?=$children->comment_ID?>">
                <div class="avatar"><img alt="" src="http://0.gravatar.com/avatar/0bc02b765e0143efd78cd7f17ced1720?s=40&amp;d=wavatar&amp;r=G" class="avatar avatar-40 photo" height="40" width="40"></div>
                <div class="comment">
                  <div class="comment_meta"> <cite><a href="#" rel="nofollow" target="_blank"><?=$children->comment_author?></a></cite> <span class="time"><?= date("y-m-d h:m:s",strtotime($children->comment_date)) ?></span> <span class="reply"><a class="comment-reply-link" href="#" onclick="return addComment.moveForm(&quot;comment-<?=$children->comment_ID?>&quot;, &quot;<?=$children->comment_ID?>&quot;, &quot;respond&quot;, &quot;66&quot;)">답변</a></span> </div>
                  <p> <?=$children->comment_content?></p>
                </div>
              </div>
         <?php foreach($comment_list->result() as $children1): //循环第三层?>
          <?php if($children1->comment_parent == $children->comment_ID){ ?>
          <ol class="children">
            <li id="li-comment-<?=$children1->comment_ID?>">
              <div id="comment-<?=$children1->comment_ID?>">
                <div class="avatar"><img alt="" src="http://0.gravatar.com/avatar/0bc02b765e0143efd78cd7f17ced1720?s=40&amp;d=wavatar&amp;r=G" class="avatar avatar-40 photo" height="40" width="40"></div>
                <div class="comment">
                  <div class="comment_meta"> <cite><a href="#" rel="nofollow" target="_blank"><?=$children1->comment_author?></a></cite> <span class="time"><?= date("y-m-d h:m:s",strtotime($children1->comment_date)) ?></span> <span class="reply"></span> </div>
                  <p> <?=$children1->comment_content?></p>
                </div>
              </div>
            </li>
            <!-- #comment-## -->
          </ol>
          <? } ?>
          <?php endforeach; ?>
            </li>
            <!-- #comment-## -->
          </ol>
          <? } ?>
          <?php endforeach; ?>
            </li>
            
            
            <?php endforeach; ?>
          </ol>
 <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title"> 답변쓰기 <small> <a id="cancel-comment-reply-link" style="display: none;" href="/blog/66.html#respond" rel="nofollow"> 취소 </a> </small> </h3>
        <p class="comment-form-comment">
          <label for="comment">댓글</label>
          <textarea id="comment" name="comment" cols="75" rows="8" aria-required="true" ></textarea>
        </p>
        <p class="form-submit">
          <input name="submit" id="submit" value="댓글쓰기" class="btn btn-primary" type="submit">
          <input name="comment_post_ID" value="63" id="comment_post_ID" type="hidden">
          <input name="comment_parent" id="comment_parent" value="0" type="hidden">
        </p>
      </div>
          <?php
			}
			?>
          <br>
          <br>
          <br>
          <br>
        </div>
      </div>
      <!-- article-content --> 
    </div>
  </div>
  <?php $this->load->view('job/right'); ?>
</div>
<script type="text/javascript">
   


	$(document).ready(function() {
		
		function postdata() {                        
     $.ajax ({                                    
        type: "POST",                            //设置ajax方法提交数 据的形式
        url: "<?php echo site_url('job/newcomment'); ?>",        
        data: "postid="+"  <?php if ($qr_list->num_rows() > 0) $row = $qr_list->row();echo $row->id;?>"+"&comments="+$("#comment").val()+"&comment_parent="+$('#comment_parent').val(),      
        success: function(msg) {                  //提交成功后的回调   
    		if (msg="ok"){   
      			alert("짠짜라란~ 포인트 +1");   
				$('#comment_parent').val(0);
				$('#comment').val(""); 
     			location.reload() ;
    		}
			else{   
      			alert("回复失败！ ")   
    		}   
        }        
	  }
	)};
		
        $('#submit').click(function(){
			if($('#comment').val() == "")
			{
				alert("비여있으면 안됩니다 사이트가 고장납니다 빨리 댓글 써야합니다");
			}
			else
			{
				postdata();
			}
		})
    });
</script>
<div class="clear"></div>
<?php $this->load->view('public/_footer'); ?>
