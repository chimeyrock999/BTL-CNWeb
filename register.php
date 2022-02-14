<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}

	$update_view_query = mysqli_query($con, "UPDATE views SET views = views + 1 WHERE id =1 ");
?>

<html>
<head>
	<title>Welcome!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
	

	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Đăng nhập</h2>
                    
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Tên đăng nhập</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="" value="<?php getInputValue('loginUsername') ?>" required>
					</p>
                    
                    
                    
					<p>
						<label for="loginPassword">Mật khẩu</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="" required>
					</p>

					<button type="submit" name="loginButton">ĐĂNG NHẬP</button>

					<div class="hasAccountText">
						<span id="hideLogin">Bạn chưa có tài khoản? Đăng ký ngay.</span>
					</div>
					
				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Đăng ký miễn phí để bắt đầu nghe.</h2>
					<p>
						<?php echo $account->getError(Constants::$userNameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Tên đăng nhập</label>
						<input id="username" name="username" type="text" placeholder="" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">Tên</label>
						<input id="firstName" name="firstName" type="text" placeholder="" value="<?php getInputValue('firstName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Họ và tên đệm</label>
						<input id="lastName" name="lastName" type="text" placeholder="" value="<?php getInputValue('lastName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Mật khẩu</label>
						<input id="password" name="password" type="password" placeholder="" required>
					</p>

					<p>
						<label for="password2">Nhập lại mật khẩu</label>
						<input id="password2" name="password2" type="password" placeholder="" required>
					</p>

					<button type="submit" name="registerButton">ĐĂNG KÝ</button>

					<div class="hasAccountText">
						<span id="hideRegister">Bạn có tài khoản? Đăng nhập.</span>
					</div>
					
				</form>


			</div>
            
      
            

			<div id="loginText">
				<h1>Âm nhạc không giới hạn</h1>
				<h2>Thưởng thức mọi giai điệu mà không có quảng cáo.</h2>
				<ul>
					<li>Nghe nhạc tùy thích, bất cứ lúc nào.</li>
					<li>Tìm kiếm bài nhạc mà bạn yêu thích.</li>
					<li>Theo dõi nghệ sĩ yêu thích của bạn để cập nhật những bản nhạc mới nhất.</li>
				</ul>
			</div>

		</div>
	</div>

</body>
</html>