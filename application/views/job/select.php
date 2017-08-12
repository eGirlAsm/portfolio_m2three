<?php $this->load->view('public/_header'); ?>

<div class="row">
  <div id="job_contents"> 
    <!--<div class="job_left">
      <div id="job_area_menu" class="n_box" style="height:300px;"> </div>
    </div> -->
    <div class="job_center">
      <div id="job_list">
               <div id="job_list_header" ><a href="<?php echo site_url(); ?>job"><h2></h2></a><span class="other_info"><dl><dt><h4>다른것도 슬슬 볼가?</h4></dt> <dd><a href="#">인재정보</a> </dd><dd><a href="#">부동산</a> </dd><dd> <a href="#">세집/합숙</a> </dd><dd> <a href="#">중고거래</a> </dd><dd> <a href="#">차량거래</a> </dd></dl></span>

        </div>
        <div id="job_type_select">
          <div class="btn company"><a href="<?php echo site_url(); ?>job/newcom">회사</a></div>
          <div class="btn personal"><a href="<?php echo site_url(); ?>job/consumer">개인</a></div>
          <p class="notice">회사채용은 더많은 정보를 입력해야 됩니다<br>개인정보는 회사이름을 쓸수없습니다</p>
        </div>
      </div>
    </div>
    <?php $this->load->view('job/right'); ?>
  </div>
</div>
<!-- row -->
<div class="clear"></div>
<?php $this->load->view('public/_footer'); ?>
