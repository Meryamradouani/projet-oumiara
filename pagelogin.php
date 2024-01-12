<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet"  href="login.css">
</head>
<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_email = $_POST['email'];
    $user_password = $_POST['pswd'];
    $login=$_POST['login'];
    $_SESSION['user_logged_in'] = true;

    if ( $login=='admin' &&   $user_email == 'admin1@gmail.com' &&  $user_password == 'admin2023') {
        $login=$_POST['login'];
        $_SESSION['admin']= $login=$_POST['login'];

        header('Location: admin.php');
        exit();
    }else {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['login']=$_POST['login'];
            header('Location: index.php');
            exit();
        }
    }
?>

<body>
	<div class="main">  

			<div class="signup">
				<form action="" method="POST">
					<label  for="chk" aria-hidden="true">CONNECTER</label>
					<input type="text" name="login" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>

	</div>
</body>
</html>