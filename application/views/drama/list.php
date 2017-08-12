<?php $this->load->view('Public/_header'); ?>
<script type="text/javascript" src="<?php echo base_url()?>js/plugins/exp/exp.js" ></script>
<div id="view_container">
<!-- v_left start-->
<div id="v_left" class="n_box">
  <div id="video_play">
    <h1>너의 목소리가 들려</h1>
                <address>
                <span> 2013-06-27 10:49:23 </span><span class="comment"><a rel="nofollow" href="#comment_top" id="first_comment_url" target="_self"><span id="first_comment_count">130</span>개 댓글</a></span>|<span>来源：网络</span>|<span>作者：网络</span>
                </address>
                <div id="text" class="embed">
                  <embed width="600" height="498" menu="true" loop="true" play="true" allowfullscreen="true" src="http://player.youku.com/player.php/sid/XNTc2MjA5ODE2/v.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                </div>
  </div>
  
    <div id="video_comment" class="n_box">	<div class="exp-holder" style="margin: 0 auto; width: 500px; ">
			<textarea id="J_t" style="width:100%;">点击"表情"添加</textarea>
			<a class="exp-block-trigger" href="javascript:;">表情</a>
			<button id="J_sbt" type="button">check</button>
		</div>
		<div id="J_resulte" style=" width: 500px; height: 200px; border:1px solid green; margin: 0 auto; "></div> </div>
  
  
  
  	<script type="text/javascript">
		$(document).ready(function(){
			$.expBlock.initExp({
				/*
				//用户表情结构数据
				expData: [{name: '默认',icons:[{url:"../resources/js/plugins/exp/img/zz2_thumb.gif",title:"织"},{url:"../resources/js/plugins/exp/img/horse2_thumb.gif",title:"神马"}]}]
				//包含textarea和表情触发的exp-holder
				holder: '.exp-holder',
				//exp-holder中的textarea输入dom，默认为textarea,
				textarea : 'textarea',
				//触发dom
				trigger : '.exp-block-trigger',
				//每页显示表情的组数
				grpNum : 5,
				//位置相对页面固定(absolute)||窗口固定(fixed)
				posType : 'absolute',
				//表情层数
				zIndex : '100'
				*/
			});
			
			//使表情失效
			$.expBlock.disableExp();
			//使表情重新启动
			$.expBlock.enableExp();
			
			$('#J_sbt').click(function(){
				var s, ta = $('#J_t'), val = ta.val();
				//将字符串中如"[微笑]"类的表情代号替换为<img/>标签
				s = $.expBlock.textFormat(val);
				//console.log(s);
				$('#J_resulte').html(s);
			})
			
			/*
			 * ajax远程获取表情,注意同源策略
			 * 要求返回的数据格式如:[{name: groupname,icons:[{url:'imgurl',title:"iconname"},{url:'imgurl',title:"iconname"}]},{name: groupname,icons:[{url:'imgurl',title:"iconname"},{url:'imgurl',title:"iconname"}]},...]
			 */
			//$.expBlock.getRemoteExp(url);
			
		})
	</script>
  
  </div> <!-- v_left end-->
  

  
  
          <div id="v_right" class="n_box">
          
            <div id="video_top_ad" class="n_box"></div>
            
                    <div id="video_list" class="n_box">
                      <ul>
                        <li>
                          <div class="drama_item"><span class="l_title">第 1 集 20130627</span></div>
                        </li>
                        <li>
                          <div class="drama_item"><span class="l_title">第 2 集 20130627</span></div>
                        </li>
                        <li>
                          <div class="drama_item"><span class="l_title">第 3 集 20130627</span></div>
                        </li>
                        <li>
                          <div class="drama_item"><span class="l_title">第 4 集 20130627</span></div>
                        </li>
                        <li>
                          <div class="drama_item"><span class="l_title">第 5 集 20130627</span></div>
                        </li>
                        <li>
                          <div class="drama_item"><span class="l_title">第 6 集 20130627</span></div>
                        </li>
                        <li>
                          <div class="drama_item"><span class="l_title">第 7 集 20130627</span></div>
                        </li>
                        <li>
                          <div class="drama_item"><span class="l_title">第 8 集 20130627</span></div>
                        </li>
                        <li>
                          <div class="drama_item"><span class="l_title">第 9 集 20130627</span></div>
                        </li>
                        <li>
                          <div class="drama_item"><span class="l_title">第 10 集 20130627</span></div>
                        </li>
                      </ul>
                    </div>
          </div>
</div>
<?php $this->load->view('Public/_footer'); ?>
