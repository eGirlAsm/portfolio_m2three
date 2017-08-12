<div class="textbox">

	   <p>     

		<?php if ($this->config->item('allow_registration', 'fx_auth')) echo anchor('/auth/register/', '회원가입'); ?>

		<?php echo anchor('/auth/forgot_password/', '아이디'); ?>/<?php echo anchor('/auth/forgot_password/', '비번 찾기'); ?>

      </p>

        <ul>

          <li>

            <input id="username" type="text" onfocus="this.style.background = '#FFFFFF'" style="background: none repeat scroll 0% 0% rgb(255, 255, 255);" name="username">

            </input>

          </li>

          <li>

            <input id="password" type="password" onfocus="this.style.background = '#FFFFFF'" style="background: none repeat scroll 0% 0% rgb(255, 255, 255);" name="password">

            </input>

          </li>

        </ul>

      </div>

      <div class="btn_login">

		<input src="<?php echo base_url(); ?>static/images/btn_login.png" alt="로그인" id="login_ok" type="image">

      </div>

	  <div id="" class="id_save">

			<input name="id_cookie" id="id_cookie" value="1" type="checkbox">

            <label class="save_label" for="id_cookie"> 로그인 상태 유지 </label>

	  </div>



 