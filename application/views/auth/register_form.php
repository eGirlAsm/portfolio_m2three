<?php
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<?php $this->load->view('public/_header'); ?>

<div id="register_wrapper">
<div id="login_wrapper">
<h2>엠투쓰리에 가입하기</h2>

<?=form_open($this->uri->uri_string()) ?>
<table>
<font color="#FF0000">-고객님의 소중한 신상 정보는 다 자동으로 안전하게(암호화)(MD5加密) 처리되므로 <br/>그 누구(운영자)도 볼수 없으며 필요한 정보에만 사용됨니다.  </font>
	<?php if ($use_username) { ?>
	<tr>
		<th><label for="username">아이디</label></th>
		<td><input type="text" name="username" value="" id="username" class="TEXT" /></td>
		<td style="color: red;">
		<?=form_error('username'); ?>
		<?php echo isset($errors['username'])?$errors['username']:''; ?>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<th><label for="email">이메일 주소</label></th>
		<td><input type="text" name="email" value="" id="email" class="TEXT" /></td>
		<td >
		<font color="#FF0000"><?=form_error('email'); ?></font>
		<?php echo isset($errors['email'])?$errors['email']:''; ?>
		</td>
	</tr>
	<tr>
		<th><label for="password">비밀번호</label></th>
		<td><input type="password" name="password" value="" id="password" class="TEXT" /></td>
		<td style="color: red;"><?=form_error('password') ?></td>
	</tr>
	<tr>
		<th><label for="confirm_password">비밀번호 확인</label></th>
		<td><input type="password" name="confirm_password" value="" id="confirm_password" class="TEXT" /></td>
		<td style="color: red;"><?=form_error('confirm_password') ?></td>
	</tr>

	<?php if ($captcha_registration) {
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
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="TEXT" /></td>
		<td style="color: red;"><?=form_error('recaptcha_response_field') ?></td>
		<?=$recaptcha_html ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>자동입력 방지를 위해서 아래같은 코드를 입력하세요:</p>
			<?=$captcha_html ?>
		</td>
	</tr>
	<tr>
		<th><label for="captcha">인증코드</label></th>
		<td><input type="text" name="captcha" value="" id="captcha" maxlength="8" class="TEXT" /></td>
		<td style="color: red;"><?=form_error('captcha') ?></td>
	</tr>
    
    </tr>
    <tr><th></th><td><input type="submit" name="register" value="가입하기" class="BUTTON" />	</tr>
    
	<?php }
	} ?>
</table>

<?=form_close() ?>
</div>

<div id="login_tip">
	나는 엠투쓰리 회원？ <a href="<?php echo site_url(); ?>/auth/login">로그인</a>
	<h3>로그인후？</h3>
	<ol>
		<li>예전에 동창,친구?</li>
		<li>취업,부동산 정보교류</li>
		<li>우리 만남의 시작</li>
		<li>엠투쓰리에서 바로 시작하세요!</li>
	</ol>
    </div>

</div>
<div class="clear"></div>