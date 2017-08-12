<?php

if ($login_by_username AND $login_by_email) {
	$login_label = '아이디/이메일주소:';
} else if ($login_by_username) {
	$login_label = '아이디:';
} else {
	$login_label = '이메일주소:';
}

$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'TEXT',
);
?>
<?php $this->load->view('public/_header'); ?>
<div id="contents">
<div id="auth_wrapper">
<div id="login_wrapper">
<h2>엠투쓰리에 로그인하기</h2>
<?=form_open($this->uri->uri_string()) ?>
<table>
<tr><th></th><td></td></tr>
	<tr>
		<th><?php echo form_label($login_label, 'login'); ?></th>
		<td><input type="text" name="login" value="" id="login" class="TEXT" /></td>
		<td style="color: red;">
			<?=form_error('login') ?>
			<?php echo isset($errors['login'])?$errors['login']:''; ?>
		</td>
	</tr>
	<tr>
		<th><label for="password">비밀번호:</label></th>
		<td><input type="password" name="password" value="" id="password" class="TEXT" /></td>
		<td style="color: red;">
			<?=form_error('password') ?>
			<?php echo isset($errors['password'])?$errors['password']:''; ?>
		</td>
	</tr>
	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?=form_error('recaptcha_response_field') ?></td>
		<?=$recaptcha_html ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>자동입력 방지를 위해서 아래같은 코드를 입력하세요:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
    <th><?=form_label('인증코드', $captcha['id']) ?></th>
		<td><?=form_input($captcha)?></td>
		<td style="color: red;"><?=form_error($captcha['name']) ?></td>
	</tr>
	<?php }
	} ?>
	<tr>
    	<th></th>
		<td colspan="3">
			<input type="checkbox" name="remember" value="1" id="remember"  />			
			<label for="remember">로그인 상태 유지</label>
		
			
		</td>
	</tr>
    <tr><th></th><td><input type="submit" name="submit" value="바로 로그인"  />	<?php echo anchor('/auth/forgot_password/', '비번찾기'); ?></td></tr>
</table>

<?=form_close() ?>
</div>

<div id="login_tip">
	아이디가 없으세요？ <?php if ($this->config->item('allow_registration', 'fx_auth')) echo anchor('/auth/register/', '엠투쓰리에 가입하기'); ?>
	<h3>가입한후？</h3>
	<ol>
		<li>예전에 동창,친구?</li>
		<li>취업,부동산 정보교류</li>
		<li>우리 만남의 시작</li>
		<li>엠투쓰리에서 바로 시작하세요!</li>
	</ol>
    </div>

</div>
<div class="clear"></div>