<?php $this->load->view('space/header'); ?>
  <div class="page_icenter bg4">
    <div id="colMenu" class="col_menu">
      <div class="collet_box fn_profile clearfix bg4" style=""> <a href="#" title="切换空间风格" class="ThemeSetting">切换风格</a><a href="#" class="Img"><img src="http://static.oschina.net/uploads/user/285/570911_100.jpg?t=1375435968000" alt="eGirlAsm" title="eGirlAsm" class="LargePortrait" align="absmiddle"></a><span class="U"> <a href="#" class="Name" title="男">eGirlAsm</a> <span class="opts"> <img src="/img/2012/men.png" title="男" align="absmiddle"> <a href="#">修改资料</a> <a href="#">更换头像</a> </span> </span>
        <div class="clear"></div>
        <div class="stat"> <a href="#">关注(0)</a> <a href="http://my.oschina.net/egirlasm/fans">粉丝(0)</a> <a href="#" title="查看OSCHINA积分规则">积分(0)</a> </div>
      </div>
    </div>
    <div id="colMain" class="col_main bg">
    <div class="col_main_feed lbor">
      <div id="MyTweetForm">
        <div id="TFormTitle"><span class="r">还可以输入<em id="TweetContentLength">160</em>字</span>今天你动弹了吗？</div>
        <form id="TForm" action="/action/tweet/pub" method="POST" onkeydown="if((event.metaKey || event.ctrlKey)&amp;&amp;event.keyCode==13){$('#TForm').submit();}">
          <input name="user" value="570911" type="hidden">
          <input name="user_code" value="qN9SqSuuUA1coNt8WJxJrMVvb5MEIaaEx2yWyHaK" type="hidden">
          <input id="TweetAttachment" name="attachment" value="0" type="hidden">
          <div id="TFormEditor">
            <textarea name="msg" id="TXT_Tweet_Text"></textarea>
          </div>
          <div id="TFormOpts">
            <ul>
              <li class="t">插入：</li>
              <li class="emotion"><a href="javascript:insert_emotions()">表情</a></li>
              <li class="img"><a href="javascript:insert_images()">图片</a></li>
              <li class="app"><a href="javascript:insert_projects()">开源软件</a></li>
            </ul>
            <input value="发 布" class="B" type="submit">
            <div style="clear:right;"></div>
          </div>
        </form>
        <div style="display: none;" id="TweetFormPopupWraper">
          <div id="TweetFormPopupArrow">
            <div id="TweetFormPopup">
              <div id="TweetEmotions">
                <div class="TweetPopupTitle"><a href="javascript:;" onclick="$('#TweetFormPopupWraper').hide();return false;">关闭</a>插入表情</div>
                <a href="javascript:;" onclick="return ins_e(132);" class="emotion" style="background-position: -3168px 0px;"></a> <a href="javascript:;" onclick="return ins_e(133);" class="emotion" style="background-position: -3192px 0px;"></a> <a href="javascript:;" onclick="return ins_e(134);" class="emotion" style="background-position: -3216px 0px;"></a>
                <div class="clear"></div>
              </div>
              <div id="TweetImages">
                <div class="TweetPopupTitle"><a href="javascript:;" onclick="$('#TweetFormPopupWraper').hide();return false;">关闭</a>插入图片</div>
                <form id="TweetImageForm" action="/action/tweet/insert_img?user=570911" method="POST" enctype="multipart/form-data">
                  <div class="l">
                    <input name="source" value="1" id="ti_img_source_1" checked="" type="radio">
                    <label for="ti_img_source_1">上传本地图片</label>
                    <input name="source" value="2" id="ti_img_source_2" type="radio">
                    <label for="ti_img_source_2">使用网络图片</label>
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
                  <p> <span id="TweetImageFilename"></span> <a href="" id="DeleteTweetImage">删除</a> </p>
                  <img id="TweetImageObj" src="" style="display:block;margin:10px;border:1px solid #40AA53;"> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <div class="col_main_sidebar"><div class="blog_category"><h3>category</h3><ul><li><a href="#">전체보기(777)</a></li><li><a href="#">샤방샤방(2)</a></li><li><a href="#">소녀일상(16)</a></li><li><a href="#">어서들와요(1)</a></li></ul></div><div class="box_hd"><h3>다녀갔던 사람들</h3></div></div>
    </div>

  </div>
<?php $this->load->view('space/footer'); ?>