<?php
	require_once "config.php";
	require_once "../model/User.php";

	class userController {
		private $conn;

		public function __construct(){
			 $this->conn = connectToDatabase();
		}

		public function createUser(User $user) {
        	// Hash the password
	        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);

	        $sql = "INSERT INTO user (email, first_name, last_name, role, password, gender, phone, picture) 
	                VALUES (:email, :first_name, :last_name, :role, :password, :gender, :phone, :picture)";

	        // Create a PDO statement
	        $stmt = $this->conn->prepare($sql);

	        // Bind parameters
	        $stmt->bindParam(':email', $user->email);
	        $stmt->bindParam(':first_name', $user->first_name);
	        $stmt->bindParam(':last_name', $user->last_name);
	        $stmt->bindParam(':role', $user->role);
	        $stmt->bindParam(':password', $hashedPassword);
	        $stmt->bindParam(':gender', $user->gender);
	        $stmt->bindParam(':phone', $user->phone);
	        $stmt->bindParam(':picture', $user->picture);

	        // Execute the statement
	        $stmt->execute();
    	}

		public function loginUser($email, $password) {
	        // Prepare the SQL statement to retrieve user information
	        $sql = "SELECT * FROM user WHERE email = :email";
	        $stmt = $this->conn->prepare($sql);
	        $stmt->bindParam(':email', $email);
	        $stmt->execute();

	        // Fetch the user data
	        $user = $stmt->fetch(PDO::FETCH_ASSOC);

	        // Check if the user exists and the password is valid
	        if ($user && password_verify($password, $user['password'])) {
	            // Start the session
	            session_start();

	            // Store user information in the session
	            $_SESSION['user_id'] = $user['id'];
	            $_SESSION['user_email'] = $user['email'];
	            $_SESSION['user_role'] = $user['role'];

	            // Redirect based on user role
	            switch ($user['role']) {
	                case 'ADMIN':
	                    header("Location: ../view/adminDashboard.php");
	                    exit();
	                case 'TEACHER':
	                    header("Location: ../view/teacherDashboard.php");
	                    exit();
	                // Add more roles as needed
	                default:
	                    // Redirect to a default page or handle accordingly
	                    header("Location: ../view/studentDashboard.php");
	                    exit();
	            }
	        } else {
	            return false;
	        }
	    }
   	}



	/*$newUser = new User(null, 'aya@gmail.com', 'aya', 'midassi', 'TEACHER', '96794628', 'FEMALE', '55760128', 'profile.jpg');

	$userController = new UserController();

	//Call the createUser method to insert the new user into the database
	$userController->createUser($newUser);*/
