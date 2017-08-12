<?php $this->load->view('public/_header'); ?>

<div id="job_contents">
  <div class="job_center">
    <div class="job_tab">
      <ul>
        <li><a href="<?=site_url();?>job/position">직업리스트</a></li>
        <li><a href="<?=site_url();?>job/message">받은이력서</a></li>
        <li><a class="active"  href="<?=site_url();?>job/company">내 회사정보</a></li>
      </ul>
    </div>
    <div class="company_wrap">
      <h2>
        <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->corporate_name;?>
        <span class="company_tools" >
        <ul>
          <li><a href="<?=site_url();?>job/newjob?com_id=<?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->id;?>">직장추가</a></li>
          <li><a href="javascript:;">편집</a></li>
          <li><a href="javascript:;">삭제</a></li>
        </ul>
        </span></h2>
      <div class="company_details">
        <pre><?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->company_content;?>
</pre>
      </div>
      <p style="margin:10px 0px;"><strong> 회사기업： </strong> <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->company_nature;?></p>
      <p style="margin:10px 0px;"><strong> 회사분류： </strong> <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->company_profession;?></p>
      <p style="margin:10px 0px;"><strong> 회사규모： </strong> <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->company_size;?></p>
      <p style="margin:10px 0px;"><strong> 회사위치： </strong> <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->area;?></p>
      <p style="margin:10px 0px;"><strong> 상세주소： </strong> <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->company_address;?></p>
        <p style="margin:10px 0px;"><strong> 회사사이트： </strong> <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->company_site;?></p>
      <p style="margin:10px 0px;"><strong> 담당자： </strong> <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->responsible_user;?></p>
      <p style="margin:10px 0px;"><strong> 연계전화： </strong> <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->telphone;?></p>
      <p style="margin:10px 0px;"><strong> 이메일： </strong> <?php if ($cp_details->num_rows() > 0) $row = $cp_details->row();echo $row->company_email;?></p>
    </div>
  </div>
  <?php $this->load->view('job/right'); ?>
</div>
<div class="clear"></div>
<?php $this->load->view('public/_footer'); ?>
