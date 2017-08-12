		
        <script type="text/javascript" src="<?php echo base_url()?>js/plugins/exp/exp.js" ></script>
        <div class="exp-holder" style="margin: 0 auto; width: 500px; ">
			<textarea id="J_t" style="width:100%;">点击"表情"添加</textarea>
			<a class="exp-block-trigger" href="javascript:;">表情</a>
		</div>
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