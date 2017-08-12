<?php $this->load->view('public/_header'); ?>

<div class="row">
  <div id="job_contents"> 
    <!--<div class="job_left">
      <div id="job_area_menu" class="n_box" style="height:300px;"> </div>
    </div> -->
    <div class="job_center">
      <div id="job_form_wrap" style="background: white;-webkit-box-shadow: 0 1px 3px rgba(198, 198, 198, 0.5);box-shadow: 0 1px 3px rgba(198, 198, 198, 0.5);">
      <?=form_open($this->uri->uri_string(),array('id'=>'add_company')) ?>
                  <table class="CompanyInfoForm">
                    <tbody>
                      <tr>
                        <td colspan="4"><div id="Job_Page_title">
                          <h2></h2>
                          <hr width="100%" style="float:left;"  /></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name">회사이름：</td>
                        <td class="td_content"><input class="TEXT_HAN" id="name" maxlength="40" name="corporate_name" size="40" type="text">
                          <em>*</em> <span class="error_info"></span></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name">회사기업：</td>
                        <td class="td_content"><select id="nature" name="nature">
                            <option value="0" selected="selected">--선택--</option>
                            <option value="외자기업">외자기업</option>
                            <option value="합작기업">합작기업</option>
                            <option value="국가기업">국가기업</option>
                            <option value="주식회사">주식회사</option>
                            <option value="개인회사">개인회사</option>
                            <option value="기타">기타</option>
                          </select>
                          <em>*</em><span class="error_info"></span></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name">회사분류：</td>
                        <td class="td_content"><select id="industry" name="industry">
                            <option value="0">--선택--</option>
                            <option value="인터넷">인터넷</option>
                            <option value="컴퓨터프로그램">컴퓨터프로그램</option>
                            <option value="컴퓨터하드웨어">컴퓨터하드웨어</option>
                            <option value="컴퓨터서비스">컴퓨터서비스</option>
                            <option value="쇼핑몰">쇼핑몰</option>
                            <option value="게임">게임</option>
                            <option value="문의">문의</option>
                            <option value="전자">전자</option>
                            <option value="통신">통신</option>
                            <option value="컴퓨터기타">컴퓨터기타</option>
                            <option value="은행/금융">은행/금융</option>
                            <option value="생산">생산</option>
                            <option value="교육">교육</option>
                            <option value="의학">의학</option>
                            <option value="음식/호텔/여행">음식/호텔/여행</option>
                            <option value="물류/교통/운수">물류/교통/운수</option>
                            <option value="부동산/쫭쓔">부동산/쫭쓔</option>
                            <option value="정부">정부</option>
                            <option value="기타">기타</option>
                          </select>
                          <em>*</em><span class="error_info"></span></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name"> 회사규모：</td>
                        <td class="td_content"><select id="size" name="size">
                            <option value="0">--선택--</option>
                            <option value="미형(10인이하)">미형(10인이하)</option>
                            <option value="소형(10-50인)">소형(10-50인)</option>
                            <option value="중소(50-100인)">중소(50-100인)</option>
                            <option value="중형(100-500인)">중형(100-500인)</option>
                            <option value="대형(500인 이상)">대형(500인 이상)</option>
                          </select>
                          <em>*</em><span class="error_info"></span></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name">회사위치：</td>
                        <td class="td_content"><select onchange="loadCity();" name="addr_prv" id="addr_province">
                            <option value="">-지역/상세-</option>
                  <option value="북경">북경</option>
                  <option value="상해">상해</option>
                  <option value="천진">천진</option>
                  <option value="연변">연변</option>
                  <option value="광주">광주</option>
                  <option value="심천">심천</option>
                  <option value="동관">동관</option>
                  <option value="청도">청도</option>
                  <option value="연태">연태</option>
                  <option value="위해">위해</option>
                  <option value="대련">대련</option>
                  <option value="심양">심양</option>
                  <option value="이우">이우</option>
                  <option value="항주">항주</option>
                  <option value="소주">소주</option>
                  <option value="남경">남경</option>
                  <option value="할빈">할빈</option>
                  <option value="한국">한국</option>
                  <option value="일본">일본</option>
                  <option value="로씨아">로씨아</option>
                  <option value="미국">미국</option>
                  <option value="대만">대만</option>
                          </select>
                          <em>*</em><span class="error_info"></span></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name"> 상세주소：</td>
                        <td class="td_content"><input class="TEXT_HAN" id="addr_street" maxlength="100" name="addr_street" size="40" type="text">
                          <em>*</em> <span class="error_info"></span></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name" valign="top"> 회사소개：</td>
                        <td class="td_content"><textarea  style="width: 300px;
resize: none;" id="intro" rows="10" name="intro" maxlength="1000"></textarea>
                          <em>*</em><span class="error_info"></span></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name"> 담당자이름：</td>
                        <td class="td_content"><input class="TEXT_HAN" maxlength="20" id="contacts" name="contacts" type="text">
                          <em>*</em><span class="error_info"></span></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name"> 연계전화：</td>
                        <td class="td_content"><input maxlength="20" class="TEXT_HAN" id="tel" name="tel" type="text">
                          <em>*</em><span class="error_info"></span></td>
                      </tr>
                      <tr>
                        <td class="td_flag">&nbsp;</td>
                        <td class="td_name"> 이메일주소：</td>
                        <td class="td_content"><input class="TEXT_HAN" id="email" maxlength="50" name="email" type="text">
                          <em>*</em><span class="error_info"></span></td>
                      </tr>
                    </tbody>
                  </table>
                      <?=form_close() ?>
                      <div class="clear"></div>
                  <div><a class="rndbutton" id="com_info_submit" style="float:left;"><span>회사정보추가</span></a><span id="error_msg"></span></div>
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/m2three.js"></script> 
        <script type="text/javascript">
		
    $("#com_info_submit").click(function(){
    	$("#add_company").submit();
    });
		</script>
      </div>
    </div>
    <?php $this->load->view('job/right'); ?>
  </div>
</div>
<!-- row -->
<div class="clear"></div>
<?php $this->load->view('public/_footer'); ?>
