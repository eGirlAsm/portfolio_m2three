<?php $this->load->view('public/_header'); ?>
<?php echo form_open_multipart('house/new_submit');?>
<table id="tb_form">
<tr><td>분류</td><td><input type="text" name="type"  /></td></tr>
<tr><td>사진</td><td><input type="file" name="userfile" /></td></tr>
<tr><td>제목</td><td><input type="text" name="title"  /></td></tr>
<tr><td>면적</td><td><input type="text" name="meter"  /></td></tr>
<tr><td>가격</td><td><input type="text" name="price"  /></td></tr>
<tr><td></td><td><input type="submit"   /></td></tr>

</table>
</form>
<?php $this->load->view('public/_footer'); ?>