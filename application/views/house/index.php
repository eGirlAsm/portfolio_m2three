<?php $this->load->view('public/_header'); ?>

<div id="job_contents">
  <div class="job_center">
    <div id="job_list">
      <div id="house_list_header" ><a href="<?php echo site_url(); ?>/house">
        <h2></h2>
        </a><?php $this->load->view('public/_topmenu'); ?>
        <script>
		$(document).ready(function() {
            $('.other_info a').eq(2).addClass('on');
        });
		</script>
        </div>
        <?php echo $error;?>
      <div id="job_tb_header">
        <ul>
          <li class="list_left" style="width:5px;"></li>
          <li style="width:100px;">지역</li>
          <li style="width:200px;">제목</li>
          <li style="width:90px;">분류</li>
          <li style="width:55px;">면적/층계</li>
          <li style="width:55px;">가격</li>
          <li style="width:85px;">등록일</li>
          <li style="width:55px;">조회수</li>
          <li class="list_right" style="width:5px;"></li>
        </ul>
      </div>
      <div id="job_list_item">
        <table class="job_tb_list">
          <?php foreach($list->result() as $row): ?>
          <tr onmouseover="this.style.backgroundColor='#f8f8f8'" onmouseout="this.style.backgroundColor=''">
            <td style="width:65px;text-align:center;height:36px;"><span class="hs_thumb">
              <img width="90px" height="90px" src="<?=$row->image?>" alt="<?=$row->title?>"  title="<?=$row->title?>"/>
              </span></td>
            <td style="width:330px;" align="left"><a href="<?php echo site_url(); ?>/job/view/<?=$row->id?>">
              <?=$row->title?>
              </a></td>
            <td style="width:110px;text-align:center"><?=$row->meter?></td>
            <td style="width:110px;text-align:center"><?=$row->price?></td>
            <td style="width:85px;text-align:center" class="job_list_item_date"><?= date("y/m/d",strtotime($row->creattime)) ?></td>
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
  <?php $this->load->view('house/right'); ?>
</div>
<?php $this->load->view('public/_footer'); ?>
