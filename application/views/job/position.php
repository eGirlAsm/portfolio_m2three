<?php $this->load->view('public/_header'); ?>

<div id="job_contents">
  <div class="job_center">
    <div class="job_tab">
      <ul>
        <li><a class="active" href="<?=site_url();?>job/position">직업리스트</a></li>
        <li><a href="<?=site_url();?>job/message">받은이력서</a></li>
        <li><a href="<?=site_url();?>job/company">내 회사정보</a></li>
      </ul>
    </div>
  </div>
  <?php $this->load->view('job/right'); ?>
</div>
<div class="clear"></div>
<?php $this->load->view('public/_footer'); ?>
