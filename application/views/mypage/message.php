<?php $this->load->view('public/_header'); ?>

<div class="page_icenter bg4">
  <?php $this->load->view('mypage/side'); ?>
  <div id="colMain" class="col_main bg">
    <div class="col_main_feed lbor">
      <div class="message_list">
        <h2 style="float:left;">받은 쪽지함</h2>
        <em style="font-style:normal;float:left;">|</em><span style="float:left;"> 라라라라라아세요.</span>
        <div class="clear"></div>
        <div class="tb_header">
          <ul>
            <li class="list_left" style="width:5px;"></li>
            <li style="width:35px;">
              <input name="memo_check[]" value="1805005||0||393291" type="checkbox">
            </li>
            <li style="width:40px;">상태</li>
            <li style="width:60px;">보낸이</li>
            <li style="width:240px;">제목</li>
            <li style="width:135px;">날짜</li>
            <li class="list_right" style="width:5px;"></li>
          </ul>
        </div>
        <div class="tb_list_wrap">
          <table class="tb_list_con">
            <?php //foreach($joblist->result() as $row): ?>
            <tr onmouseover="this.style.backgroundColor='#f8f8f8'" onmouseout="this.style.backgroundColor=''">
              <td style="width:40px;height:36px;"><input name="message"  type="checkbox"></td>
              <td style="width:40px;" align="center"><span class="mail_status new"></span></td>
              <td style="width:60px;" align="center"><a href="javascript:void(0);">그근이</a></td>
              <td style="width:250px;text-align:left"> <a href="#"><strong><b>안녕하세요 라라라 습니다</b></strong></a></td>
              <td style="width:135px;text-align:center"><span class="list_item_date">13.10.07(목) 23:51</span></td>
            </tr>
            <tr>
              <td height="1" background="<?php echo base_url(); ?>/images/list_line.gif" colspan="10"></td>
              <td width="11"></td>
            </tr>
             <tr onmouseover="this.style.backgroundColor='#f8f8f8'" onmouseout="this.style.backgroundColor=''">
              <td style="width:40px;height:36px;"><input name="message" type="checkbox"></td>
              <td style="width:40px;" align="center"><span class="mail_status open"></span></td>
              <td style="width:60px;" align="center"><a href="javascript:void(0);">그근이</a></td>
              <td style="width:250px;text-align:left"> <a href="#">안녕하세요 라라라 습니다</a></td>
              <td style="width:135px;text-align:center"><span class="list_item_date">13.10.07(목) 23:51</span></td>
            </tr>
            <tr>
              <td height="1" background="<?php echo base_url(); ?>/images/list_line.gif" colspan="10"></td>
              <td width="11"></td>
            </tr>
            <?php //endforeach; ?>
          </table>
        </div>
      </div>
    </div>
    <div class="col_main_sidebar">
      <div class="blog_category">
        <h3>category</h3>
        <ul>
          <li><a href="#">전체보기(777)</a></li>
          <li><a href="#">샤방샤방(2)</a></li>
          <li><a href="#">소녀일상(16)</a></li>
          <li><a href="#">어서들와요(1)</a></li>
        </ul>
      </div>
      <div class="box_hd">
        <h3>다녀갔던 사람들</h3>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>
<?php $this->load->view('public/_footer'); ?>
