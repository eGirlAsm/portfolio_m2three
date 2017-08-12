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
  <div id="page_tit">电视剧管理<span onclick="admin.fold('page_config')"> [页面配置] </span></div>
  <div id="title_tab">
    <ul>
      <li><a class="on" href="#">电视剧管理</a></li>
      <li><a href="#">电视剧添加</a></li>
    </ul>
  </div>
  <!-- START TOOLBAR -->
  <div class="Toolbar_inbox">
    <div class="page right"> </div>
    <a onclick="location.href='http://www.moonyuan.com/thinksns/index.php?app=admin&amp;mod=Content&amp;act=upTemplate'" class="btn_a"><span>添加电视剧</span></a><a onclick="admin.delTemplate()" class="btn_a"><span>删除电视剧</span></a> </div>
    <!-- END TOOLBAR -->
  <div class="list" id="list">
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tbody>
        <tr>
          <th style="width:30px;"> <input id="checkbox_handle" onclick="admin.checkAll(this)" value="0" type="checkbox">
          </th>
          <th class="line_l">电视剧ID</th>
          <th class="line_l">名称</th>
          <th class="line_l">别名</th>
          <th class="line_l">标题模板</th>
          <th class="line_l">内容模板</th>
          <th class="line_l">语言</th>
          <th class="line_l">模板类型</th>
          <th class="line_l">模板类型2</th>
          <th class="line_l">是否默认缓存</th>
          <th class="line_l">创建时间</th>
          <th class="line_l">操作</th>
        </tr>
        <tr>
          <td colspan="100" align="center">没有需要显示的数据!</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>