<?php $this->load->view('public/_header'); ?>

<div id="job_contents">
  <div class="job_center">
    <div id="job_list">
      <div id="car_list_header" ><a href="<?php echo site_url(); ?>/job">
        <h2></h2>
        </a><?php $this->load->view('public/_topmenu'); ?>
                <script>
		$(document).ready(function() {
            $('.other_info a').eq(5).addClass('on');
        });
		</script>
        </div>
      <div id="job_tb_header">
        <ul>
          <li class="list_left" style="width:5px;"></li>
          <li style="width:365px;">제목</li>
          <li style="width:110px;">상세정보</li>
          <li style="width:110px;">가격</li>
          <li style="width:85px;">날짜</li>
          <li style="width:55px;">조회수</li>
          <li class="list_right" style="width:5px;"></li>
        </ul>
      </div>
      <div id="job_list_item">
        <table class="job_tb_list">
          <?php foreach($joblist->result() as $row): ?>
          <tr onmouseover="this.style.backgroundColor='#f8f8f8'" onmouseout="this.style.backgroundColor=''">
            <td style="width:65px;text-align:center;height:36px;"><span color="000000" style="font-size:8pt;font-family:tahoma">
              <?=$row->id?>
              </span></td>
            <td style="width:330px;" align="left"><a href="<?php echo site_url(); ?>/job/view/<?=$row->id?>">
              <?=$row->title?>
              </a></td>
            <td style="width:110px;text-align:center"><?php 
			  if($row->iscompany) {
				  $row->company_name;
			}
			  else{
				  echo "개인업체";
			}?></td>
            <td style="width:110px;text-align:center"><?=$row->salary?></td>
            <td style="width:85px;text-align:center" class="job_list_item_date"><?= date("y/m/d",strtotime($row->time)) ?></td>
            <td style="width:55px;text-align:center"><span color="000000" style="font-size:8pt;font-family:tahoma">
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
  <?php $this->load->view('car/right'); ?>
</div>
<?php $this->load->view('public/_footer'); ?>
