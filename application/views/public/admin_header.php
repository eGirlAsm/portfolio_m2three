<html xmlns="http://www.w3.org/1999/xhtml"><head>
<link href="http://www.moonyuan.com/thinksns/apps/admin/_static/admin_header.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ThinkSNS V3 - 最有价值的社会化网络产品</title>
<script type="text/javascript" src="http://www.moonyuan.com/thinksns/addons/theme/stv1/_static/js/jquery.js"></script>
<script type="text/javascript">
var SITE_URL ='http://www.moonyuan.com/thinksns';
var APPNAME   = 'admin';
/* 按下F5时仅刷新iframe页面 */
function inactiveF5(e) {
	e=window.event||e;
	var key = e.keyCode;
	if (key == 116){
		parent.MainIframe.location.reload();
		if(document.all) {
			e.keyCode = 0;
			e.returnValue = false;
		}else {
			e.cancelBubble = true;
			e.preventDefault();
		}
	}
}

function nof5() {
    return ;
	if(window.frames&&window.frames[0]) {
		window.frames[0].focus();
		for (var i_tem = 0; i_tem < window.frames.length; i_tem++) {
			if (document.all) {
				window.frames[i_tem].document.onkeydown = new Function("var e=window.frames[" + i_tem + "].event; if(e.keyCode==116){parent.MainIframe.location.reload();e.keyCode = 0;e.returnValue = false;};");
			}else {
				window.frames[i_tem].onkeypress = new Function("e", "if(e.keyCode==116){parent.MainIframe.location.reload();e.cancelBubble = true;e.preventDefault();}");
			}
		} //END for()
	} //END if()
}
//模拟ts U函数 需要预先定义JS全局变量 SITE_URL 和 APPNAME

var U =function(url,params){
	var website = SITE_URL+'/index.php';
	url = url.split('/');
	if(url[0]=='' || url[0]=='@')
		url[0] = APPNAME;
	if (!url[1])
		url[1] = 'Index';
	if (!url[2])
		url[2] = 'index';
	website = website+'?app='+url[0]+'&mod='+url[1]+'&act='+url[2];
	if(params){
		params = params.join('&');
		website = website + '&' + params;
	}
	return website;
};

function refresh() {
	parent.MainIframe.location.reload();
}

function addTonav(name,url){
	var appname = url.split('/');
	$('.main_nav').append('<a href="#" onclick="gotoApp(this,\''+url+'\')" appname="'+appname[0]+'">'+name+'</a>');
	$.post(U('admin/Home/addNav'),{appname:appname[0],url:url},function(){});}

function removeFromNav(app){
	$('.main_nav').find('a').each(function(){
		if($(this).attr('appname') == app){
			$(this).remove();
			$.post(U('admin/Home/removeNav'),{appname:app},function(){});}
	});
}

function gotoApp(obj,url){
	
	switchChannel('apps');

	$('.main_nav').find('a').removeClass('on');

	$(obj).addClass('on');

	obj.className = 'on';

	parent.MainIframe.location = U(url);

}

document.onkeydown=inactiveF5;

</script>
</head>

<body scroll="no" style="margin:0; padding:0;" onLoad="nof5()">

<table cellpadding="0" cellspacing="0" height="100%" border="0" width="100%">
  <tbody><tr>
    <td colspan="3">
		<div class="header"><!-- 头部 begin -->
		    <div class="logo">
		    	<a href="http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Index&amp;act=index"><strong style="font-size:18px;">管理中心</strong></a>
		    </div>
		    <div class="nav_sub">
		    	您好,管理员&nbsp; | <a href="http://www.moonyuan.com/thinksns/index.php?app=public&amp;mod=Index&amp;act=index">返回前台</a> | <a href="javascript:void(0);" onClick="refresh();">刷新</a> | <a href="http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Public&amp;act=logout">退出</a><br>
		    	<div id="TopTime"></div>
		    </div>
		    <div class="main_nav">
		    	<a id="channel_index" class="on" href="javascript:void(0)" onClick="switchChannel('index');" hidefocus="true" style="outline:none;">首页</a><a id="channel_system" href="javascript:void(0)" onClick="switchChannel('system');" hidefocus="true" style="outline:none;">系统</a><a id="channel_user" href="javascript:void(0)" onClick="switchChannel('user');" hidefocus="true" style="outline:none;">用户</a><a id="channel_content" href="javascript:void(0)" onClick="switchChannel('content');" hidefocus="true" style="outline:none;">内容</a><a id="channel_task" href="javascript:void(0)" onClick="switchChannel('task');" hidefocus="true" style="outline:none;">任务</a><a id="channel_apps" href="javascript:void(0)" onClick="switchChannel('apps');" hidefocus="true" style="outline:none;">应用</a><a id="channel_extends" href="javascript:void(0)" onClick="switchChannel('extends');" hidefocus="true" style="outline:none;">插件</a>		    	<a href="#" onClick="gotoApp(this,'page/Admin/index')" appname="page">门户</a>	
			</div>                   
		</div>
		<div class="header_line"><span>&nbsp;</span></div>
	</td>
  </tr>
  <tr>
  	<td id="FrameTitle" height="100%" background="http://www.moonyuan.com/thinksns/apps/admin/_static/image/left_bg.gif" valign="top" width="200px">
  		<div class="LeftMenu">
		  		<!-- 第一级菜单，即大频道 -->
  			      	<ul style="display: block;" class="MenuList" id="root_index">
	      	<!-- 第二级菜单 -->
	      			        <li style="background-image: url(&quot;http://www.moonyuan.com/thinksns/apps/admin/_static/image/ArrOff.png&quot;);" class="treemenu">
		          <a id="root_1" class="actuator" href="javascript:void(0)" onClick="switch_root_menu('1');" hidefocus="true" style="outline:none;">首页</a>
		          <ul style="display: block;" id="tree_1" class="submenu">
		            		          	<!-- 第三级菜单 -->
		          	                        		            	<li><a id="menu_2" href="javascript:void(0)" onClick="switch_sub_menu('2', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Home&amp;act=statistics');" class="submenuB" hidefocus="true" style="outline:none;">基本信息</a></li>
											                        		            	<li><a id="menu_3" href="javascript:void(0)" onClick="switch_sub_menu('3', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Home&amp;act=visitorCount');" class="submenuA" hidefocus="true" style="outline:none;">访问统计</a></li>
											                        		            	<li><a id="menu_4" href="javascript:void(0)" onClick="switch_sub_menu('4', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Home&amp;act=logs');" class="submenuA" hidefocus="true" style="outline:none;">管理日志</a></li>
											                        		            	<li><a id="menu_5" href="javascript:void(0)" onClick="switch_sub_menu('5', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Home&amp;act=message');" class="submenuA" hidefocus="true" style="outline:none;">群发消息</a></li>
											                        		            	<li><a id="menu_6" href="javascript:void(0)" onClick="switch_sub_menu('6', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Home&amp;act=schedule');" class="submenuA" hidefocus="true" style="outline:none;">计划任务</a></li>
											                        		            	<li><a id="menu_7" href="javascript:void(0)" onClick="switch_sub_menu('7', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Tool&amp;act=cleancache');" class="submenuA" hidefocus="true" style="outline:none;">缓存清理</a></li>
											                        		            	<li><a id="menu_8" href="javascript:void(0)" onClick="switch_sub_menu('8', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Home&amp;act=cacheConfig');" class="submenuA" hidefocus="true" style="outline:none;">缓存配置</a></li>
											                        		            	<li><a id="menu_9" href="javascript:void(0)" onClick="switch_sub_menu('9', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Tool&amp;act=backup');" class="submenuA" hidefocus="true" style="outline:none;">数据备份</a></li>
											                        		            	<li><a id="menu_10" href="javascript:void(0)" onClick="switch_sub_menu('10', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Update&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">在线升级</a></li>
											                        		            	<li><a id="menu_11" href="javascript:void(0)" onClick="switch_sub_menu('11', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Tool&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">小工具</a></li>
											                        		            	<li><a id="menu_12" href="javascript:void(0)" onClick="switch_sub_menu('12', 'http://www.fanghuyun.com/?do=simple&amp;IDKey=00a2dd77015dc5e3ff21266ac0515659');" class="submenuA" hidefocus="true" style="outline:none;">安全防护</a></li>
													          </ul>
		        </li>
				      	</ul>
			      	<ul class="MenuList" id="root_system" style="display:none;">
	      	<!-- 第二级菜单 -->
	      			        <li class="treemenu">
		          <a id="root_13" class="actuator" href="javascript:void(0)" onClick="switch_root_menu('13');" hidefocus="true" style="outline:none;">系统配置</a>
		          <ul id="tree_13" class="submenu">
		            		          	<!-- 第三级菜单 -->
		          	                        		            	<li><a id="menu_14" href="javascript:void(0)" onClick="switch_sub_menu('14', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=site');" class="submenuA" hidefocus="true" style="outline:none;">站点配置</a></li>
											                        		            	<li><a id="menu_15" href="javascript:void(0)" onClick="switch_sub_menu('15', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=nav');" class="submenuA" hidefocus="true" style="outline:none;">导航配置</a></li>
											                        		            	<li><a id="menu_16" href="javascript:void(0)" onClick="switch_sub_menu('16', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=register');" class="submenuA" hidefocus="true" style="outline:none;">注册配置</a></li>
											                        		            	<li><a id="menu_17" href="javascript:void(0)" onClick="switch_sub_menu('17', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=invite');" class="submenuA" hidefocus="true" style="outline:none;">邀请配置</a></li>
											                        		            	<li><a id="menu_18" href="javascript:void(0)" onClick="switch_sub_menu('18', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=feed');" class="submenuA" hidefocus="true" style="outline:none;">微博配置</a></li>
											                        		            	<li><a id="menu_19" href="javascript:void(0)" onClick="switch_sub_menu('19', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=email');" class="submenuA" hidefocus="true" style="outline:none;">邮件配置</a></li>
											                        		            	<li><a id="menu_20" href="javascript:void(0)" onClick="switch_sub_menu('20', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=attach');" class="submenuA" hidefocus="true" style="outline:none;">附件配置</a></li>
											                        		            	<li><a id="menu_21" href="javascript:void(0)" onClick="switch_sub_menu('21', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=audit');" class="submenuA" hidefocus="true" style="outline:none;">过滤配置</a></li>
											                        		            	<li><a id="menu_22" href="javascript:void(0)" onClick="switch_sub_menu('22', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Global&amp;act=credit');" class="submenuA" hidefocus="true" style="outline:none;">积分配置</a></li>
											                        		            	<li><a id="menu_23" href="javascript:void(0)" onClick="switch_sub_menu('23', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=area');" class="submenuA" hidefocus="true" style="outline:none;">地区配置</a></li>
											                        		            	<li><a id="menu_24" href="javascript:void(0)" onClick="switch_sub_menu('24', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=lang');" class="submenuA" hidefocus="true" style="outline:none;">语言配置</a></li>
											                        		            	<li><a id="menu_25" href="javascript:void(0)" onClick="switch_sub_menu('25', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=notify');" class="submenuA" hidefocus="true" style="outline:none;">消息配置</a></li>
											                        		            	<li><a id="menu_26" href="javascript:void(0)" onClick="switch_sub_menu('26', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Department&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">部门配置</a></li>
											                        		            	<li><a id="menu_27" href="javascript:void(0)" onClick="switch_sub_menu('27', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Apps&amp;act=setPermNode');" class="submenuA" hidefocus="true" style="outline:none;">权限节点配置</a></li>
											                        		            	<li><a id="menu_28" href="javascript:void(0)" onClick="switch_sub_menu('28', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=setSeo');" class="submenuA" hidefocus="true" style="outline:none;">SEO配置</a></li>
											                        		            	<li><a id="menu_29" href="javascript:void(0)" onClick="switch_sub_menu('29', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=updateAdminTab');" class="submenuA" hidefocus="true" style="outline:none;">页面配置同步</a></li>
											                        		            	<li><a id="menu_30" href="javascript:void(0)" onClick="switch_sub_menu('30', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=setUcenter');" class="submenuA" hidefocus="true" style="outline:none;">UCenter配置</a></li>
													          </ul>
		        </li>
				      	</ul>
			      	<ul class="MenuList" id="root_user" style="display:none;">
	      	<!-- 第二级菜单 -->
	      			        <li class="treemenu">
		          <a id="root_31" class="actuator" href="javascript:void(0)" onClick="switch_root_menu('31');" hidefocus="true" style="outline:none;">用户</a>
		          <ul id="tree_31" class="submenu">
		            		          	<!-- 第三级菜单 -->
		          	                        		            	<li><a id="menu_32" href="javascript:void(0)" onClick="switch_sub_menu('32', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=User&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">用户管理</a></li>
											                        		            	<li><a id="menu_33" href="javascript:void(0)" onClick="switch_sub_menu('33', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=UserGroup&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">用户组管理</a></li>
											                        		            	<li><a id="menu_34" href="javascript:void(0)" onClick="switch_sub_menu('34', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=User&amp;act=profile');" class="submenuA" hidefocus="true" style="outline:none;">资料配置</a></li>
											                        		            	<li><a id="menu_35" href="javascript:void(0)" onClick="switch_sub_menu('35', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=User&amp;act=category');" class="submenuA" hidefocus="true" style="outline:none;">用户标签</a></li>
											                        		            	<li><a id="menu_36" href="javascript:void(0)" onClick="switch_sub_menu('36', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=User&amp;act=verifyCategory');" class="submenuA" hidefocus="true" style="outline:none;">用户认证</a></li>
											                        		            	<li><a id="menu_37" href="javascript:void(0)" onClick="switch_sub_menu('37', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=User&amp;act=findPeopleConfig');" class="submenuA" hidefocus="true" style="outline:none;">找人配置</a></li>
											                        		            	<li><a id="menu_38" href="javascript:void(0)" onClick="switch_sub_menu('38', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=User&amp;act=officialCategory');" class="submenuA" hidefocus="true" style="outline:none;">找人推荐</a></li>
													          </ul>
		        </li>
				      	</ul>
			      	<ul class="MenuList" id="root_content" style="display:none;">
	      	<!-- 第二级菜单 -->
	      			        <li class="treemenu">
		          <a id="root_39" class="actuator" href="javascript:void(0)" onClick="switch_root_menu('39');" hidefocus="true" style="outline:none;">内容管理</a>
		          <ul id="tree_39" class="submenu">
		            		          	<!-- 第三级菜单 -->
		          	                        		            	<li><a id="menu_40" href="javascript:void(0)" onClick="switch_sub_menu('40', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Config&amp;act=announcement');" class="submenuA" hidefocus="true" style="outline:none;">公告配置</a></li>
											                        		            	<li><a id="menu_41" href="javascript:void(0)" onClick="switch_sub_menu('41', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Content&amp;act=feed');" class="submenuA" hidefocus="true" style="outline:none;">微博管理</a></li>
											                        		            	<li><a id="menu_42" href="javascript:void(0)" onClick="switch_sub_menu('42', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Content&amp;act=topic');" class="submenuA" hidefocus="true" style="outline:none;">话题管理</a></li>
											                        		            	<li><a id="menu_43" href="javascript:void(0)" onClick="switch_sub_menu('43', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Content&amp;act=comment');" class="submenuA" hidefocus="true" style="outline:none;">评论管理</a></li>
											                        		            	<li><a id="menu_44" href="javascript:void(0)" onClick="switch_sub_menu('44', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Content&amp;act=message');" class="submenuA" hidefocus="true" style="outline:none;">私信管理</a></li>
											                        		            	<li><a id="menu_45" href="javascript:void(0)" onClick="switch_sub_menu('45', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Content&amp;act=attach');" class="submenuA" hidefocus="true" style="outline:none;">附件管理</a></li>
											                        		            	<li><a id="menu_46" href="javascript:void(0)" onClick="switch_sub_menu('46', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Content&amp;act=denounce');" class="submenuA" hidefocus="true" style="outline:none;">举报管理</a></li>
											                        		            	<li><a id="menu_47" href="javascript:void(0)" onClick="switch_sub_menu('47', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Home&amp;act=tag');" class="submenuA" hidefocus="true" style="outline:none;">标签管理</a></li>
											                        		            	<li><a id="menu_48" href="javascript:void(0)" onClick="switch_sub_menu('48', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Home&amp;act=invatecount');" class="submenuA" hidefocus="true" style="outline:none;">邀请统计</a></li>
											                        		            	<li><a id="menu_49" href="javascript:void(0)" onClick="switch_sub_menu('49', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Content&amp;act=template');" class="submenuA" hidefocus="true" style="outline:none;">模板管理</a></li>
													          </ul>
		        </li>
				      	</ul>
			      	<ul class="MenuList" id="root_task" style="display:none;">
	      	<!-- 第二级菜单 -->
	      			        <li class="treemenu">
		          <a id="root_50" class="actuator" href="javascript:void(0)" onClick="switch_root_menu('50');" hidefocus="true" style="outline:none;">任务管理</a>
		          <ul id="tree_50" class="submenu">
		            		          	<!-- 第三级菜单 -->
		          	                        		            	<li><a id="menu_51" href="javascript:void(0)" onClick="switch_sub_menu('51', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Task&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">任务列表</a></li>
											                        		            	<li><a id="menu_52" href="javascript:void(0)" onClick="switch_sub_menu('52', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Task&amp;act=reward');" class="submenuA" hidefocus="true" style="outline:none;">任务奖励</a></li>
											                        		            	<li><a id="menu_53" href="javascript:void(0)" onClick="switch_sub_menu('53', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Medal&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">勋章列表</a></li>
											                        		            	<li><a id="menu_54" href="javascript:void(0)" onClick="switch_sub_menu('54', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Medal&amp;act=userMedal');" class="submenuA" hidefocus="true" style="outline:none;">用户勋章</a></li>
											                        		            	<li><a id="menu_55" href="javascript:void(0)" onClick="switch_sub_menu('55', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Task&amp;act=taskConfig');" class="submenuA" hidefocus="true" style="outline:none;">任务配置</a></li>
													          </ul>
		        </li>
				      	</ul>
			      	<ul class="MenuList" id="root_apps" style="display:none;">
	      	<!-- 第二级菜单 -->
	      			        <li class="treemenu">
		          <a id="root_56" class="actuator" href="javascript:void(0)" onClick="switch_root_menu('56');" hidefocus="true" style="outline:none;">应用管理</a>
		          <ul id="tree_56" class="submenu">
		            		          	<!-- 第三级菜单 -->
		          	                        		            	<li><a id="menu_57" href="javascript:void(0)" onClick="switch_sub_menu('57', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Apps&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">已安装应用列表</a></li>
											                        		            	<li><a id="menu_58" href="javascript:void(0)" onClick="switch_sub_menu('58', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Apps&amp;act=install');" class="submenuA" hidefocus="true" style="outline:none;">未安装应用列表</a></li>
											                        		            	<li><a id="menu_59" href="javascript:void(0)" onClick="switch_sub_menu('59', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Apps&amp;act=onLineApp');" class="submenuA" hidefocus="true" style="outline:none;">在线应用</a></li>
											                        		            	<li><a id="menu_60" href="javascript:void(0)" onClick="switch_sub_menu('60', 'http://www.moonyuan.com/thinksns/index.php?app=channel&amp;mod=Admin&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">频道</a></li>
											                        		            	<li><a id="menu_61" href="javascript:void(0)" onClick="switch_sub_menu('61', 'http://www.moonyuan.com/thinksns/index.php?app=weiba&amp;mod=Admin&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">微吧</a></li>
													          </ul>
		        </li>
				      	</ul>
			      	<ul class="MenuList" id="root_extends" style="display:none;">
	      	<!-- 第二级菜单 -->
	      			        <li class="treemenu">
		          <a id="root_62" class="actuator" href="javascript:void(0)" onClick="switch_root_menu('62');" hidefocus="true" style="outline:none;">插件管理</a>
		          <ul id="tree_62" class="submenu">
		            		          	<!-- 第三级菜单 -->
		          	                        		            	<li><a id="menu_63" href="javascript:void(0)" onClick="switch_sub_menu('63', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Addons&amp;act=index');" class="submenuA" hidefocus="true" style="outline:none;">所有插件列表</a></li>
											                        		            	<li><a id="menu_64" href="javascript:void(0)" onClick="switch_sub_menu('64', 'http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Addons&amp;act=admin&amp;pluginid=1');" class="submenuA" hidefocus="true" style="outline:none;">空间换肤 - 官方优化版</a></li>
													          </ul>
		        </li>
				      	</ul>
				</div>
	</td>

    <td>
   	  <iframe onload="nof5()" id="MainIframe" name="MainIframe" noresize="" frameborder="0" height="100%" scrolling="yes" width="100%"> </iframe>
	</td>
  </tr>
</tbody></table>



<script type="text/javascript">
	var current_channel   = null;
	var current_menu_root = null;
	var current_menu_sub  = null;
	var viewed_channel	  = new Array();
	
	$(document).ready(function(){
		switchChannel('index');
	});
	
	//切换频道（即头部的tab）
	function switchChannel(channel) {

		//if(current_channel == channel) return false;
		$('.main_nav').find('a').removeClass('on');

		$('#channel_'+current_channel).removeClass('on');
		$('#channel_'+channel).addClass('on');
		
		$('#root_'+current_channel).css('display', 'none');
		$('#root_'+channel).css('display', 'block');
		
		var tmp_menulist = $('#root_'+channel).find('a');
		tmp_menulist.each(function(i, n) {
			// 防止重复点击ROOT菜单
			if( i == 0 && $.inArray($(n).attr('id'), viewed_channel) == -1 ) {
				$(n).click();
				viewed_channel.push($(n).attr('id'));
			}
			if ( i == 1 ) {
				$(n).click();
			}
		});

		current_channel = channel;
	}
	
	function switch_root_menu(root) {
		root = $('#tree_'+root);
		if (root.css('display') == 'block') {
			root.css('display', 'none');
			root.parent().css('backgroundImage', 'url(http://www.moonyuan.com/thinksns/apps/admin/_static/image/ArrOn.png)');
		}else {
			root.css('display', 'block');
			root.parent().css('backgroundImage', 'url(http://www.moonyuan.com/thinksns/apps/admin/_static/image/ArrOff.png)');
		}
	}
	
	function switch_sub_menu(sub, url) {
		if(current_menu_sub) {
			$('#menu_'+current_menu_sub).attr('class', 'submenuA');
		}
		$('#menu_'+sub).attr('class', 'submenuB');
		current_menu_sub = sub;
		
		parent.MainIframe.location = url;
	}
	
	
</script>
</body></html>