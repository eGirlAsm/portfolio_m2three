<?php $this->load->view('public/_header'); ?>

<div class="row">
  <div id="job_contents">
    <div class="job_center">
      <div id="job_form_wrap" style="background: white;-webkit-box-shadow: 0 1px 3px rgba(198, 198, 198, 0.5);box-shadow: 0 1px 3px rgba(198, 198, 198, 0.5);">
        <?=form_open($this->uri->uri_string(),array('id'=>'form_job')) ?>
        <input name="company" value="2539" type="hidden">
        <table>
          <tbody>
            <tr>
              <td colspan="4">
              <div id="Job_Page_title">
                  <h2></h2>

                </div>
              </td>
            </tr>
            <tr>
              <td class="td_flag">&nbsp;</td>
              <td class="td_name"> 제목：</td>
              <td class="td_content"><input id="job_title" name="job_title" maxlength="100" class="TEXT_HAN" type="text" style="width: 500px;">
                <em>*</em><span class="error_info"></span></td>
            </tr>
            <tr>
              <td class="td_flag">&nbsp;</td>
              <td class="td_name">직업분류：</td>
              <td class="td_content"><select id="type" name="type" >
                  <option value="0">직업종류를 선택하세요</option>
                  <option value="사무">사무</option>
                  <option value="복무">복무</option>
                  <option value="영업">영업</option>
                  <option value="IT기술">IT기술</option>
                  <option value="디자인">디자인</option>
                  <option value="교욱">교욱</option>
                  <option value="건설">건설</option>
                  <option value="무역">무역</option>
                  <option value="생산">생산</option>
                  <option value="도우미">도우미</option>
                  <option value="기타">기타</option>
                </select>
                <em>*</em><span class="error_info"></span></td>
            </tr>
            <tr>
              <td class="td_flag">&nbsp;</td>
              <td class="td_name">현재위치：</td>
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
              <td class="td_name"> 월급：</td>
              <td class="td_content"><select id="salary" name="salary">
                  <option value="">선택해주세요</option>
                  <option value="1000원이하">1000원이하</option>
                  <option value="1000-2000원">1000-2000원</option>
                  <option value="2001-4000원">2001-4000원</option>
                  <option value="4001-6000원">4001-6000원</option>
                  <option value="6001-8000원">6001-8000원</option>
                  <option value="8001-10000원">8001-10000원</option>
                  <option value="10001-15000원">10001-15000원</option>
                  <option value="15000-25000원">15000-25000원</option>
                  <option value="25000원이상">25000원이상</option>
                </select>
                <em>*</em> <span class="error_info"></span></td>
            </tr>
            <tr>
              <td class="td_flag">&nbsp;</td>
              <td class="td_name">학력요구：</td>
              <td class="td_content"><input checked="checked" name="education" value="학력무관" id="education_0" type="radio">
                <label for="education_0">학력무관&nbsp;&nbsp;</label>
                <input name="education" value="고졸이하" id="education_1" type="radio">
                <label for="education_1">고졸이하&nbsp;&nbsp;</label>
                <input name="education" value="고졸.전문학교" id="education_2" type="radio">
                <label for="education_2">고졸.전문학교&nbsp;&nbsp;</label>
                <input name="education" value="대졸" id="education_3" type="radio">
                <label for="education_3">대졸&nbsp;&nbsp;</label>
                <input name="education" value="석사이상" id="education_4" type="radio">
                <label for="education_4">석사이상&nbsp;&nbsp; </label>
                <em>*</em><span class="error_info"></span></td>
            </tr>
            <tr>
              <td class="td_flag">&nbsp;</td>
              <td class="td_name">경력：</td>
              <td class="td_content"><select  style="font-family: 'microsoft yahei',Verdana,sans-serif,宋体;" name="experience" id="experience">
                  <option value="경력무관">경력무관</option>
                  <option value="필업생">필업생</option>
                  <option value="1년이하">1년이하</option>
                  <option value="1~3년">1~3년</option>
                  <option value="1~3년">1~3년</option>
                  <option value="3~5년">3~5년</option>
                  <option value="5~10년">5~10년</option>
                  <option value="10년이상">10년이상</option>
                </select>
                <em></em><span class="error_info"></span></td>
            </tr>
            <tr>
              <td class="td_flag">&nbsp;</td>
              <td class="td_name"> 모집인원：</td>
              <td class="td_content"><input id="people" name="people" maxlength="6" type="text" class="TEXT_HAN">
                <em>*</em><span class="error_info"></span></td>
            </tr>
            <tr>
              <td class="td_flag">&nbsp;</td>
              <td class="td_name" style="color:#A00;font-size:15px;">주의사항：</td>
              <td class="td_content" style="color:#A00;font-size:15px;">등록된 채용정보는 다시 편집할수 없습니다</td>
            </tr>
            <tr>
              <td class="td_flag">&nbsp;</td>
              <td class="td_content" colspan="2"><span></span><em>*</em><span class="error_info"></span>
                <textarea id="description" name="description" rows="10" maxlength="1000" style="width:730px;height:250px;"> </textarea></td>
            </tr>
          </tbody>
        </table>
        <?=form_close() ?>
        <div class="clear"></div>
        <div><a class="rndbutton" id="info_submit" style="float:right;margin-top:10px;"><span>채용정보 등록하기</span></a><span id="error_msg"></span></div>
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/m2three.js"></script> 
        <script type="text/javascript">
		
    $("#info_submit").click(function(){
    	$("#form_job").submit();
    });
		</script>
        <div class="clear"></div>
      </div>
    </div>
    <?php $this->load->view('job/right'); ?>
  </div>
</div>
<!-- row -->
<div class="clear"></div>
<?php $this->load->view('public/_footer'); ?>
