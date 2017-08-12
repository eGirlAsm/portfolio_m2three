<?php $this->load->view('public/_header'); ?>

<div class="page_icenter bg4">
	<?php $this->load->view('mypage/side'); ?>
  <div id="colMain" class="col_main bg">
    <div class="col_main_feed lbor">
      <div id="MyTweetForm">
        <div id="TFormTitle"><span class="r">아직도 <em id="TweetContentLength">160</em> 자</span> 쓸수 있습니다</div>
        <form id="TForm" action="/action/tweet/pub" method="POST" onkeydown="if((event.metaKey || event.ctrlKey)&amp;&amp;event.keyCode==13){$('#TForm').submit();}">
          <input name="user" value="570911" type="hidden">
          <input name="user_code" value="qN9SqSuuUA1coNt8WJxJrMVvb5MEIaaEx2yWyHaK" type="hidden">
          <input id="TweetAttachment" name="attachment" value="0" type="hidden">
          <div id="TFormEditor">
            <textarea name="msg" id="TXT_Tweet_Text"></textarea>
          </div>
          <div id="TFormOpts">
            <ul>
              <li class="t">입력：</li>
              <li class="emotion"><a href="javascript:insert_emotions()">스마이</a></li>
              <li class="img"><a href="javascript:insert_images()">사진</a></li>
              <li class="app"><a href="javascript:insert_projects()">기타</a></li>
            </ul>
            <input value="확인" class="B" type="submit">
            <div style="clear:right;"></div>
          </div>
        </form>
        <div style="display: none;" id="TweetFormPopupWraper">
          <div id="TweetFormPopupArrow">
            <div id="TweetFormPopup">
              <div id="TweetEmotions">
                <div class="TweetPopupTitle"><a href="javascript:;" onclick="$('#TweetFormPopupWraper').hide();return false;">닫기</a>이모티콘</div>
                <a href="javascript:;" onclick="return ins_e(132);" class="emotion" style="background-position: -3168px 0px;"></a> <a href="javascript:;" onclick="return ins_e(133);" class="emotion" style="background-position: -3192px 0px;"></a> <a href="javascript:;" onclick="return ins_e(134);" class="emotion" style="background-position: -3216px 0px;"></a>
                <div class="clear"></div>
              </div>
              <div id="TweetImages">
                <div class="TweetPopupTitle"><a href="javascript:;" onclick="$('#TweetFormPopupWraper').hide();return false;">닫기</a>사진</div>
                <form id="TweetImageForm" action="/action/tweet/insert_img?user=570911" method="POST" enctype="multipart/form-data">
                  <div class="l">
                    <input name="source" value="1" id="ti_img_source_1" checked="" type="radio">
                    <label for="ti_img_source_1">上传本地图片</label>
                    <input name="source" value="2" id="ti_img_source_2" type="radio">
                    <label for="ti_img_source_2">인터넷사진</label>
                  </div>
                  <div class="l" id="t_image_upload"> 本地图片：
                    <input name="file" size="30" type="file">
                  </div>
                  <div class="l" id="t_image_network" style="display:none;"> 网络图片:
                    <input name="url" size="40" id="img_network_url" type="text">
                  </div>
                  <div class="l tip">仅支持JPG、GIF、PNG图片文件，且文件小于200K</div>
                  <div class="l submit">
                    <input value="插入图片" id="BTN_TweetImageInsert" style="height:24px;line-height:24px;padding:0 3px;" type="submit">
                    <span id="ajax_processing" style="display:none;">正在插入图片，请稍候...</span> </div>
                </form>
                <div id="TweetImage" style="display:none;">
                  <p> <span id="TweetImageFilename"></span> <a href="" id="DeleteTweetImage">삭제</a> </p>
                  <img id="TweetImageObj" src="" style="display:block;margin:10px;border:1px solid #40AA53;"> </div>
              </div>
            </div>
          </div>
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
