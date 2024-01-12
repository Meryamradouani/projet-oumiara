<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>

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
    <style>
        body {
    background-image: url('photo/knz.jpg');
    background-size: 1000PX;
    background-repeat: no-repeat; 
    margin: 0;
    padding: 70px;
    display: flex;
    justify-content: right;
    align-items: center;
    height: 100vh;

}


.main {
    background-color:#dff2ff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    padding: 80px;
    width: 400px;
    text-align: center;
    height: 300px;

}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    font-size: 18px;
    font-weight: 500;
    color: #333;
    margin-bottom: 10px;
}

input {
    width: 100%;
    padding: 12px; /* Augmentez la hauteur du champ de saisie */
    margin-bottom: 40px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color:#22427C;
    color: #fff;
    padding: 12px; /* Augmentez la hauteur du bouton */
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

    </style>
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