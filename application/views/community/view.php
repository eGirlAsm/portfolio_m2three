<?php $this->load->view('public/_header'); ?>

<div id="view_community_contents">
  <div id="view_community_title"> <a href="<?php echo site_url(); ?>community/<?=$community_category;?>">
    <h2 class="<?=$h2_class?>"></h2>
    </a> </div>
  <div id="community_view_container">
    <div id="community_view_header"></div>
    <h1><img src="<?php echo base_url(); ?>static/images/icon1.gif" alt="flag"  />
      <?php if ($postlist->num_rows() > 0) $row = $postlist->row();echo $row->post_title;?>
    </h1>
    <div id="community_view_info"> <span class="jobMemberIcon"><img src="<?php echo base_url(); ?>static/images/online_member.gif" width="15" height="15" border="0" alt="온라인"></span><span class="jobMemberName"><a href="#"><font color="#000099">
      <?php if ($postlist->num_rows() > 0) $row = $postlist->row();echo $row->post_author;?>
      </font></a></span> <span id="community_view_time">
      <?php if ($postlist->num_rows() > 0) $row = $postlist->row();echo $row->post_date;?>
      </span> <span class="pipe">|</span><a href="#">주소복사</a><span class="pipe">|</span><a href="#">신고</a> </div>
    <div id="community_view_content"> <br>
      <?php if ($postlist->num_rows() > 0) $row = $postlist->row();echo $row->post_content;?>
      <br>
      <br>
      <script type="text/javascript"><!--
google_ad_client = "ca-pub-7834010976620784";
/* community */
google_ad_slot = "5523163553";
google_ad_width = 970;
google_ad_height = 90;
//-->
</script> 
      <script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script> 
      <br>
      <br />
      <div style="text-align:center">
        <button id="favorite" class="btn btn-success pull-right" tabindex="5" type="button"> <i class="icon-heart icon-white icon12"></i> 추천(<?php if ($postlist->num_rows() > 0) $row = $postlist->row();echo $row->post_recommand;?>) </button>
      </div>
      <br/>
      <br/>
      <br>
    </div>
    <div id="community_view_comment"> <br>
      <?php if (!$user_status) {
				echo "댓글사용은 ".anchor('/auth/login/', '로그인')."을 하셔야 쓰기가 가능합니다,아이디가 없으세요？ ".anchor('/auth/register/', '엠투쓰리에 가입하기');
		    }
			else{
				?>
      <h3>
        <?php if ($postlist->num_rows() > 0) $row = $postlist->row();echo $row->comment_count;?>
        개 댓글</h3>
      <ol class="comment_list">
        <?php foreach($comment_list->result() as $row): //循环?>
        <?php if(!$row->comment_parent){ ?>
        <li id="li-comment-<?=$row->comment_ID?>">
          <div id="comment-<?=$row->comment_ID?>">
            <div class="avatar"><img alt="" src="http://0.gravatar.com/avatar/0dab8e62fae8c3ccd7609294c592aed0?s=40&amp;d=wavatar&amp;r=G" class="avatar avatar-40 photo" height="40" width="40"></div>
            <div class="comment">
              <div class="comment_meta"> <cite>
                <?=$row->comment_author?>
                </cite> <span class="time">
                <?= date("y-m-d h:m:s",strtotime($row->comment_date)) ?>
                </span> <span class="reply"><a class="comment-reply-link" href="/blog/72.html?replytocom=<?=$row->comment_ID?>#respond" onclick="return addComment.moveForm(&quot;comment-<?=$row->comment_ID?>&quot;, &quot;<?=$row->comment_ID?>&quot;, &quot;respond&quot;, &quot;72&quot;)">답변</a></span> </div>
              <p>
                <?=$row->comment_content?>
              </p>
            </div>
          </div>
          <?php foreach($comment_list->result() as $children): //循环?>
          <?php if($children->comment_parent == $row->comment_ID){ ?>
          <ol class="children">
            <li id="li-comment-<?=$children->comment_ID?>">
              <div id="comment-<?=$children->comment_ID?>">
                <div class="avatar"><img alt="" src="http://0.gravatar.com/avatar/0bc02b765e0143efd78cd7f17ced1720?s=40&amp;d=wavatar&amp;r=G" class="avatar avatar-40 photo" height="40" width="40"></div>
                <div class="comment">
                  <div class="comment_meta"> <cite><a href="#" rel="nofollow" target="_blank">
                    <?=$children->comment_author?>
                    </a></cite> <span class="time">
                    <?= date("y-m-d h:m:s",strtotime($children->comment_date)) ?>
                    </span> <span class="reply"><a class="comment-reply-link" href="/blog/66.html?replytocom=749#respond" onclick="return addComment.moveForm(&quot;comment-<?=$children->comment_ID?>&quot;, &quot;<?=$children->comment_ID?>&quot;, &quot;respond&quot;, &quot;66&quot;)">답변</a></span> </div>
                  <p>
                    <?=$children->comment_content?>
                  </p>
                </div>
              </div>
              <?php foreach($comment_list->result() as $children1): //循环第三层?>
              <?php if($children1->comment_parent == $children->comment_ID){ ?>
              <ol class="children">
                <li id="li-comment-<?=$children1->comment_ID?>">
                  <div id="comment-<?=$children1->comment_ID?>">
                    <div class="avatar"><img alt="" src="http://0.gravatar.com/avatar/0bc02b765e0143efd78cd7f17ced1720?s=40&amp;d=wavatar&amp;r=G" class="avatar avatar-40 photo" height="40" width="40"></div>
                    <div class="comment">
                      <div class="comment_meta"> <cite><a href="#" rel="nofollow" target="_blank">
                        <?=$children1->comment_author?>
                        </a></cite> <span class="time">
                        <?= date("y-m-d h:m:s",strtotime($children1->comment_date)) ?>
                        </span> <span class="reply"></span> </div>
                      <p>
                        <?=$children1->comment_content?>
                      </p>
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
        <? } ?>
        <?php endforeach; ?>
      </ol>
      <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title"> 답변쓰기 <small> <a id="cancel-comment-reply-link" style="display: none;" href="/blog/66.html#respond" rel="nofollow"> 취소 </a> </small> </h3>
        <p class="comment-form-comment">
          <label for="comment">댓글</label>
          <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </p>
        <p class="form-submit">
          <input name="submit" id="submit" value="댓글쓰기" type="submit">
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
<script type="text/javascript">
   


	$(document).ready(function() {
		
		function recommandplus(){
     	$.ajax ({                                    
        type: "POST",                            //设置ajax方法提交数 据的形式
        url: "<?php echo site_url(); ?>community/<?=$community_category;?>?action=recommand",        
        data: "postid="+"  <?php if ($postlist->num_rows() > 0) $row = $postlist->row();echo $row->ID;?>",   
        success: function(msg) {                  //提交成功后的回调   
    		if (msg="ok"){   
      			alert("짠짜라란~ 추천 +1");  
				location.reload() ;
    		}
			else{   
      			alert("오류가 생겻습니다！ ")   
    		}   
        }        
	  }
	)};
		
		
		function postdata() {                        
     	$.ajax ({                                    
        type: "POST",                            //设置ajax方法提交数 据的形式
        url: "<?php echo site_url(); ?>community/<?=$community_category;?>?action=new_comment",        
        data: "postid="+"  <?php if ($postlist->num_rows() > 0) $row = $postlist->row();echo $row->ID;?>"+"&comments="+$("#comment").val()+"&comment_parent="+$('#comment_parent').val(),   
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
		
		$('#favorite').click(function(){
			recommandplus();
		})
    });
</script>
<?php $this->load->view('public/_footer'); ?>
