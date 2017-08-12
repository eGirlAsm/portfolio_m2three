<?php $this->load->view('public/_header'); ?>

<div id="postContents">
  <div class="postCenter">
    <div id="view_community_title">
     <a href="<?php echo site_url(); ?>community/<?=$community_category;?>" title="클릭하시면 목록리스트로 돌아갑니다."><h2 class="<?=$h2_class?>"></h2></a>
    </div>
    <div id="view_community_list_header">
      <ul>
        <li class="view_community_list_left" style="width:5px;"></li>
        <li style="width:65px;">번호</li>
        <li style="width:420px;">제목</li>
        <li style="width:110px;">글쓴이</li>
        <li style="width:85px;">날짜</li>
        <li style="width:55px;">조회수</li>
        <li class="view_community_list_right" style="width:5px;"></li>
      </ul>
    </div>
    <div id="view_community_list_item">
      <table class="view_community_tb_list">
        <?php foreach($postlist->result() as $row): ?>
        <tr class="view_community_notice"   onmouseout="this.style.backgroundColor=''" onmouseover="this.style.backgroundColor='#f8f8f8'" >
          <td width="65px"><span color="000000" style="font-size:8pt;font-family:tahoma;">
            <?=$row->ID?>
            </span></td>
          <td width="450px"  align="left"><a href="<?php echo base_url().$this->uri->uri_string(); ?>/<?=$row->ID?>">
            <?=$row->post_title?>
            </a>
            
  
                      <?php if($row->comment_count){ ?>
            <a href="#" title="댓글만 보기" class="cmt_ct"><?=$row->comment_count?><i class="label-arrow"></i></a>
            <?php } ?>
            </td>
          <td width="110px" align="center"><?=$row->post_author?></td>
          <td width="85px" class="view_community_list_item_date"><?= date("y/m/d",strtotime($row->post_date)) ?></td>
          <td width="55px"  align="center"><span color="000000" style="font-size:8pt;font-family:tahoma">
            <?=$row->view_count ?>
            </span></td>
        </tr>
        <tr>
          <td height="1" background="<?php echo base_url(); ?>/images/list_line.gif" colspan="5"></td>
          <td width="11"></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <div id="community_btn_bottom">
    <ul><li style="float:right;padding:0px 10px 0px 0px;"><input type="button" onclick='location.href="<?php echo base_url().$this->uri->uri_string(); ?>?action=new_post"'  class="btn btn-primary" value="글쓰기" /></li></ul>
    </div>
    <div id="job_list_page" class=""> <?php echo $this->pager->page('job/index',$current);?> </div>
    <div style="clear:both;"></div>
  </div>
  <div class="postRight">
    <div id="communitypostAd">      <script type="text/javascript"><!--
google_ad_client = "ca-pub-7834010976620784";
/* index_left */
google_ad_slot = "6441493557";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script> 
      <script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script> </div>
    <div id="rightBoxWrap">
      <div class="r_hotwz">
        <div class="box_title" id="recommend_gallery"><a href="javascript:;" class="box_title_link"><img src="http://nstatic.dcinside.com/dgn/gallery/images/update/title_r_concept.gif" alt="개념글"></a></div>
        <div class="box_con">
          <div class="box_con_wrap">
            <div class="con_recommend"> 
              <!--div class="con_concept">
											<li><a href="">비타민 살땐 김약사네</a></li>
											<li><a href="">실속&효과 코 성형/코 재수술 믿어보세용~오</a></li>
											<li><a href="">실속&효과 코 성형/코 재수술 믿어보세용~오</a></li>		
										</div-->
              <ul class="con_concept" id="con_recommen_0" style="display:block">
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">개년글도 조작되고 통베글도 조작되는데 개년글 통궈베스트가 다 무슨 소용?</a></li>
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">댓글만 볼 수 있는 기능이 사라져서 불편해요 다시 만들어주세요</a></li>
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">글쓴이가 댓글 삭제하는 기능 다시 생기게 해 주세요</a></li>
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">디시 운영자 보씨요!!</a></li>
              </ul>
              <ul class="con_concept" id="con_recommend_1" style="display:none">
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">본인글에 달린 댓글 관리 관련 </a></li>
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">^ㅅ^  디씨가 병1신집합소니까 사이트도 병1신으로 만든건가여?</a></li>
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">^ㅅ^  그리고 구라까지마여</a></li>
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">^ㅅ^  일반검색 돌려줘여</a></li>
              </ul>
              <ul class="con_concept" id="con_recommend_2" style="display:none">
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">^ㅅ^  근데 아까 망가올라온거 글삭 안하네여</a></li>
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">^ㅅ^  니2미씨2팔~</a></li>
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">^ㅅ^  첫개년이 주작이라니 여기 망갤이네여</a></li>
                <li><a href="#" class="logClass" depth1="rightframe" depth2="recommend">^ㅅ^</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('public/_footer'); ?>
