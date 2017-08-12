<?php $this->load->view('public/_header'); ?>

<div class="page_icenter bg4">
  <?php $this->load->view('mypage/side'); ?>
  <div id="colMain" class="col_main bg">
    <div class="col_main_feed lbor">
      <div class="new_msg_form">
        <h2 style="float:left;">쪽지쓰기</h2>
        <em style="font-style:normal;float:left;">|</em><span style="float:left;"> 받는이 란에 반드시 수신자의 아이디를 적어주세요.</span>
        <div class="clear"></div>
        <form>
          <table class="new_msg_tb">
            <tr>
              <td><strong>받는이</strong></td>
              <td><input type="text" class="TEXT" style="width: 259px;


font-size: 12px;
padding: 1px;" /><div class="fr_list">친구 선택</div></td>
            </tr>
            <tr>
              <td><strong>제목</strong></td>
              <td><input type="text" class="TEXT" style="width: 100%;


font-size: 12px;
padding: 1px;" /></td>
            </tr>
            <tr>
              <td colspan="2"><textarea class="TEXT" style="width:100%;height:150px;" cols="7"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" value="submit" />
                <input type="submit" value="cancel" /></td>
            </tr>
          </table>
        </form>
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
