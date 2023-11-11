<?php 
	session_start();
	require_once "../controller/userController.php";
	if(isset($_POST["loginButton"]) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		if(isset($_POST["email"]) && $_POST["password"]){
			$userController = new UserController();

			$email = $_POST['email'];
    		$password = $_POST['password'];

    		$loginResult = $userController->loginUser($email, $password);

    		if ($loginResult === false) {
		        echo "<script>alert('Invalid login credentials');</script>";
		    }
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>
	<?php include 'shared/header.php'; ?>
	<div class="container">
		<?php include 'forms/loginForm.php'; ?>
	</div>
	<script src="../assets/js/jquery-3.7.1.js"></script>
	<script src="../assets/js/validator/loginFormValidator.js"></script>
</body>
</html>