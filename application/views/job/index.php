<?php $this->load->view('public/_header'); ?>

<div id="job_contents">
  <div class="job_center">
    <div id="job_list">
      <div id="job_list_header" ><a href="<?php echo site_url(); ?>job">
        <h2></h2>
        </a>
        <?php $this->load->view('public/_topmenu'); ?>
        <script>
		$(document).ready(function() {
            $('.other_info a').eq(0).addClass('on');
        });
		</script></div>
      <div id="sort_menu">
        <div>
          <dl class="secitem secitem_area clearfix">
            <dt> 지역：</dt>
            <dd><a href="#" onclick="addSel(this)">전체보기</a><a href="#" onclick="addSel(this)">북경</a><a href="#" onclick="addSel(this)">광주</a><a href="#" onclick="addSel(this)">상해</a><a href="#" onclick="addSel(this)">연길</a><a href="#" onclick="addSel(this)">천진</a><a href="#" onclick="addSel(this)">심천</a><a href="#" onclick="addSel(this)">청도</a><a href="#" onclick="addSel(this)">대련</a><a href="#" onclick="addSel(this)">심양</a><a href="#" onclick="addSel(this)">위해</a><a href="#" onclick="addSel(this)">장춘</a><a href="#" onclick="addSel(this)">소주</a><a href="#" onclick="addSel(this)">연태</a><a href="#" onclick="addSel(this)">동관</a><a href="#" onclick="addSel(this)">할빈</a><a href="#" onclick="addSel(this)">서울</a><a href="#" onclick="addSel(this)">김포</a><a href="#" onclick="addSel(this)">인천</a></dd>
          </dl>
                    <dl class="secitem secitem_area clearfix">
            <dt> 월급：</dt>
            <dd><a href="#" onclick="addSel(this)">전체보기</a><a href="#" onclick="addSel(this)">1000원이하</a><a href="#" onclick="addSel(this)">1000~2000원</a><a href="#" onclick="addSel(this)">2001~4000원</a><a href="#" onclick="addSel(this)">4001~6000원</a><a href="#" onclick="addSel(this)">6001~8000원</a><a href="#" onclick="addSel(this)">8001~10000원</a><a href="#" onclick="addSel(this)">10001~15000원</a><a href="#" onclick="addSel(this)">15001~25000원</a><a href="#" onclick="addSel(this)">25000원이상</a></dd>
          </dl>
          <div id="selected" class="selectResult clearfix" style="display: block;">
            <div class="barct"> <span> 선택조건： </span> <a href="#" class="par" title="취소" id="curTitle" onclick="delSel(this)">북경</a></div>
          </div>
        </div>
      </div>
      <div id="job_tb_header">
        <ul>
          <li class="list_left" style="width:5px;"></li>
          <li style="width:65px;">번호</li>
          <li style="width:350px;">제목</li>
          <li style="width:110px;">회사명</li>
          <li style="width:110px;">월급</li>
          <li style="width:85px;">날짜</li>
          <li style="width:55px;">조회수</li>
          <li class="list_right" style="width:5px;"></li>
        </ul>
      </div>
      <div id="job_list_item">
        <table class="job_tb_list">
          <?php foreach($job_notice->result() as $row): ?>
          <tr onmouseover="this.style.backgroundColor='#f8f8f8'" onmouseout="this.style.backgroundColor=''">
            <td style="width:65px;text-align:center;height:36px;"><span color="000000" style="font-size:8pt;font-family:tahoma"> 공지 </span></td>
            <td style="width:350px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;" align="left" ><a style="color:rgb(255,0,0);font-weight:bold;" href="<?php echo site_url(); ?>job/view/<?=$row->id?>">
              <?=$row->title?>
              </a>
              <?php if($row->comment_count){ ?>
              <a href="#" title="댓글만 보기" class="cmt_ct">
              <?=$row->comment_count?>
              <i class="label-arrow"></i></a></td>
            <?php
			}?>
            <td   align="center"> 운영자 </td>
            <td style="width:100px;" ><?=$row->salary?></td>
            <td style="width:90px" class="job_list_item_date"><?= date("y/m/d",strtotime($row->time)) ?></td>
            <td style="width:55px;"><span color="000000" style="font-size:8pt;font-family:tahoma">
              <?=$row->viewcount ?>
              </span></td>
          </tr>
          <tr>
            <td height="1" background="<?php echo base_url(); ?>/images/list_line.gif" colspan="5"></td>
            <td width="11"></td>
          </tr>
          <?php endforeach; ?>
          <!--********************************************************************************************************-->
          <?php foreach($joblist->result() as $row): ?>
          <?php if(!$row->is_notice) {?>
          <tr onmouseover="this.style.backgroundColor='#f8f8f8'" onmouseout="this.style.backgroundColor=''">
            <td style="width:65px;text-align:center;height:36px;"><span color="000000" style="font-size:8pt;font-family:tahoma">
              <?=$row->id?>
              </span></td>
            <?php 
			  if($row->iscompany) {
				  ?>
            <td style="width:350px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;" align="left" ><a  href="javascript:;" class="area">[
              <?=$row->area?>
              ]</a><a style="color:rgb(150,18,255);font-weight:bold;margin-left:5px;" href="<?php echo site_url(); ?>job/view/<?=$row->id?>">
              <?=$row->title?>
              </a>
              <?php if($row->comment_count){ ?>
              <a href="#" title="댓글만 보기" class="cmt_ct">
              <?=$row->comment_count?>
              <i class="label-arrow"></i></a>
              <?php } ?></td>
            <?php 
			}
			  else{
				  ?>
            <td style="width:350px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;" align="left" ><a href="javascript:;" class="area">[
              <?=$row->area?>
              ]</a><a style="margin-left:5px" href="<?php echo site_url(); ?>job/view/<?=$row->id?>">
              <?=$row->title?>
              </a>
              <?php if($row->comment_count){ ?>
              <a href="#" title="댓글만 보기" class="cmt_ct">
              <?=$row->comment_count?>
              <i class="label-arrow"></i></a>
              <?php } ?></td>
            <?php
			}?>
            <td   align="center"><?php 
			  if($row->iscompany) {
				  echo $row->company_name;
			}
			  else{
				  echo "개인업체";
			}?></td>
            <td style="width:100px;" ><?=$row->salary?></td>
            <td style="width:90px" class="job_list_item_date"><?= date("y/m/d",strtotime($row->time)) ?></td>
            <td style="width:55px;"><span color="000000" style="font-size:8pt;font-family:tahoma">
              <?=$row->viewcount ?>
              </span></td>
          </tr>
          <tr>
            <td height="1" background="<?php echo base_url(); ?>/images/list_line.gif" colspan="5"></td>
            <td width="11"></td>
          </tr>
          <? }?>
          <?php endforeach; ?>
        </table>
      </div>
      <div id="job_list_page" class=""> <?php echo $this->pager->page('job/index',$current);?> </div>
    </div>
  </div>
  <?php $this->load->view('job/right'); ?>
</div>
<div class="clear"></div>
<?php $this->load->view('public/_footer'); ?>
