<!DOCTYPE html>

<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->

<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->

<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Web Site Manage system Login Form</title>

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">

  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

  

<script language="javascript">

	function CheckForm()

	{

		if(document.Login.UserName.value=="")

		{

			document.Login.UserName.focus();

			return false;

		}

		if(document.Login.Password.value == "")

		{

			document.Login.Password.focus();

			return false;

		}

	}

</script>

</head>

<body>

<?php echo form_open('login/check_login',array('onSubmit'=>'return CheckForm();','target'=>'_parent','name'=>'Login','class'=>'login'));?>



    <h1>Web Site Manage system</h1>

    <h2 style="color:#CCC; text-align:center;border:1px solid #F00;margin-bottom:10px;"> <?php echo $error; ?></h2>

    <input type="UserName" name="UserName" class="login-input" placeholder="UserName" autofocus>

    <input type="Password" name="Password" class="login-input" placeholder="Password">

    <input type="hidden" name="CheckCode" class="login-input" placeholder="CheckCode">

    <input type="submit" value="Login" class="login-submit">

  </form>

</body>

</html>

