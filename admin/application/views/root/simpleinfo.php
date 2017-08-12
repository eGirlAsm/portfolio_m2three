<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/reset.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
<script src="<?php echo base_url(); ?>js/nof5.js"></script>
</head>

<body>
<div id="wrap">
  <h2 class="path_router_title">欢迎使用后台管理系统</h2>
  <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=1)" width="100%"  align="left" color=#987cb9 SIZE=3 >
  <h2 class="prompt_title">啦啦啦这里是提示</h2>
  <h2 class="normal_title">用户信息</h2>
  <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=1)" width="100%"  align="left" color=#987cb9 SIZE=1 >
  <table width="100%" bgcolor="#c0de98" class="tb_normal">
    <thead>
      <tr>
        <td>总注册用户</td>
        <td>总活跃用户</td>
        <td>昨日最大在线量</td>
        <td>当前在线用户数</td>
        <td>一周最大在线用户数</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
    </tbody>
  </table>
  <h2 class="normal_title">访问信息</h2>
  <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=1)" width="100%"  align="left" color=#987cb9 SIZE=1 >
  <table width="100%" bgcolor="#c0de98" class="tb_normal">
    <thead>
      <tr>
        <td>时间</td>
        <td>浏览量</td>
        <td>独立访客量</td>
        <td>人均浏览次数</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>今日</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
      <tr>
        <td>昨日</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
      <tr>
        <td>一周平均</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
    </tbody>
  </table>
  <h2 class="normal_title">服务器信息</h2>
  <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=1)" width="100%"  align="left" color=#987cb9 SIZE=1 >
  <table width="100%" bgcolor="#c0de98" class="tb_normal">
    <thead>
      <tr>
        <td>获取系统类型及版本号：</td>
        <td><?php echo php_uname(); ?></td>
        <td></td>
        <td></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>服务器软件：</td>
        <td><?php
echo $_SERVER['SERVER_SOFTWARE']; ?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>最大上传许可： </td>
        <td><?PHP echo get_cfg_var("upload_max_filesize"); ?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>MySQL版本：</td>
        <td><?php
echo mysql_get_server_info();  ?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>服务器语言：</td>
        <td><?php
echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <h2 class="normal_title">开发团队</h2>
  <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=1)" width="100%"  align="left" color=#987cb9 SIZE=1 >
  <p>全程由 egirlasm 独立开发 版权所有,禁止盗版,违禁者，格杀勿论。</p>
</div>
</body>
</html>
