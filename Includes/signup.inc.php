<?php
 require "dbh.inc.php";
// call the register() function  if the signup-submit button is clicked
if(isset($_POST['signup-submit'])){
    register();
}

//REGISTER USER

function register(){
    //call these variables with the global keyword to make them available  in the function
    global $db, $errors, $username, $email;
}
 //  receive all input values from the form. call the e() function
 //  defined below to escape form values

    $username = e( $_POST['username']);
    $email = e( $_POST['email']);
    $password = e($_POST['password']);
    $passwordRepeat = e($_POST['password-repeat']);
    
// form validation: ensure that the form is filled correctly

    if (empty($username)){
        array_push($errors, "Username is required");
    }
    if (empty($email)){
        array_push($errors, "Email is required");
    }
    if (empty($password)){
        array_push($errors, "Password is required");
    }
    if ($password != $passwordRepeat){
        array_push($errors, "The two passswords do not match");
    }

   // register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}


// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	