<div id="loginAfter" class=""> <a href="" class="picWrap man"></a>
  <div id="login_user" class=""> <a href="" class="username"><strong><?php echo $username; ?></strong></a> <a href="" class="levelWrap"> <span class="level">lv.1</span> <span class="progressbar"><span style="width:undefined%" class="value"></span></span> </a>
    <div id="coins" class=""> <a href=""> <span class="">&nbsp;45</span></a> <span>포인트</span> </div>
    <p	class="link">
      <?=anchor('/mypage/index', '내 정보','class="btn btn-primary"') ?>
      <?=anchor('/auth/logout/', '로그아웃','class="btn btn-inverse"') ?>
    </p>
  </div>
</div>

<!--

Hi, <strong><?php echo $username; ?></strong>! You are logged in now. 

<br /><?=anchor('/auth/logout/', 'Logout') ?>

<br /><?=anchor('/auth/change_password', 'Change Password') ?>

<br /><?=anchor('/auth/change_email', 'Change Email') ?>

<br /><?=anchor('/auth/unregister', 'Unregister') ?>-->