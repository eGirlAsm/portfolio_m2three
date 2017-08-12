<?php $this->load->view('public/_header'); ?>

<div id="job_contents">
  <div class="job_center">
    <div id="job_list">
      <div id="talent_list_header" ><a href="<?php echo site_url(); ?>/job">
        <h2></h2>
        </a>
        <?php $this->load->view('public/_topmenu'); ?>
                <script>
		$(document).ready(function() {
            $('.other_info a').eq(1).addClass('on');
        });
		</script>
      </div>
      <div id="job_tb_header">
        <ul>
          <li class="list_left" style="width:5px;"></li>
          <li style="width:280px; text-align:left;padding-left:20px;"/>
          희망근무지/제목
          </li>
          <li style="width:110px;">희망직업</li>
          <li style="width:110px;">성별/나이</li>
          <li style="width:55px;">학력/경력</li>
          <li style="width:95px;">마감수정일</li>
          <li style="width:55px;">조회</li>
          <li class="list_right" style="width:5px;"></li>
        </ul>
      </div>
      <div id="job_list_item">
        <table class="job_tb_list">
          <?php foreach($list->result() as $row): ?>
          <tr onmouseover="this.style.backgroundColor='#f8f8f8'" onmouseout="this.style.backgroundColor=''">
            <td style="width:300px;" align="left"><a style="margin-left:20px;" href="<?php echo site_url(); ?>/talent/view/<?=$row->id?>">[
              <?=$row->wantcity?>
              ]&nbsp;
              <?=$row->title?>
              </a></td>
            <td style="width:110px;text-align:center"><?=$row->jobtype?></td>
            <td style="width:90px;text-align:center"><?=$row->sex?>
              /
              <?=$row->sex?></td>
            <td style="text-align:center" class="job_list_item_date"><?=$row->education?>
              /
              <?=$row->yearofwork?>
              년</td>
            <td style="width:55px;text-align:center"><span color="000000" style="font-size:8pt;font-family:tahoma">
              <?= date("y/m/d",strtotime($row->creattime)) ?>
              </span></td>
            <td style="width:35px;text-align:center"><span color="000000" style="font-size:8pt;font-family:tahoma">
              <?=$row->viewcount ?>
              </span></td>
          </tr>
          <tr>
            <td height="1" background="<?php echo base_url(); ?>/images/list_line.gif" colspan="10"></td>
            <td width="11"></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
      <div id="job_list_page" class=""> <?php echo $this->pager->page('job/index',$current);?> </div>
    </div>
  </div>
  <?php $this->load->view('job/right'); ?>
</div>
<?php $this->load->view('public/_footer'); ?>
