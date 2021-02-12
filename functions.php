<?php
session_start();

//connect to database
$db = mysqli_connect('localhost', 'root', '', 'school_login_system');


// variable declaration
$username = "";
$email    = "";
$errors   = array();
$update = false;
$id = "";
$englishLanguage = "";
$socialStudies = "";
$physicalEducation = "";
$history = "";
$maths = "";


//call the delete function
if (isset($_GET['delete'])) {
	delete();
}
//delete grades
function delete()
{

	global $db, $errors, $id, $username, $email;

	$id = $_GET['delete'];
	$query = "DELETE FROM personal_information WHERE id = $id";

	mysqli_query($db, $query);

	$_SESSION['message'] = "Record Has Been Deleted";
	$_SESSION['msg_type'] = "danger";
	header("location: adminpage.php");
}
//call the Edit function
if (isset($_GET['edit'])) {
	edit();
}
//edit grades
function edit()
{

	global $db,$username, $englishLanguage, $socialStudies, $physicalEducation, $history, $maths, $id, $update;

	$id = $_GET['edit'];
	$update = true;
	$query = ("SELECT *FROM personal_information WHERE id=$id");
	$result = mysqli_query($db, $query);

	if ($result->num_rows) {
		$row = $result->fetch_array();
		$username = $row['username'];
		$englishLanguage = $row['english'];
		$socialStudies = $row['socialstudies'];
		$physicalEducation = $row['physicaleducation'];
		$history = $row['history'];
		$maths = $row['maths'];
	}
}

//call the register() function if signup_submit is clicked

if (isset($_POST['signup_submit'])) {
	register();
}
//Register user
function register()
{
	// call these variables with the global keyword to make them available in the function
	global $db, $errors, $username, $email;

	// receive all input values from the form . Call the e() function
	// defined below to escape form values
	$username = e($_POST['username']);
	$email =  e($_POST['email']);
	$password  =  e($_POST['password']);
	$passwordRepeat =  e($_POST['passwordRepeat']);

	//form validation: ensure that the form is correctly filled
	if (empty($username)) {
		array_push($errors, "Username is required!");
	}
	if (empty($email)) {
		array_push($errors, "Email is required!");
	}
	if (empty($password)) {
		array_push($errors, "Password is required!");
	}
	if ($password != $passwordRepeat) {
		array_push($errors, "The two passwords do not match!");
	}
	//register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password); //encrpt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO personal_information (username, email, user_type, password); 
					VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: login.php');
		} else {
			$query = "INSERT INTO personal_information (username, email, user_type, password) 
					VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in!";
			header('location: login.php');
		}
	}
}

// return user array from their id
function getUserById($id)
{
	global $db;
	$query = "SELECT * FROM personal_information WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}
// escape string
function e($val)
{
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}
function display_error()
{
	global $errors;

	if (count($errors) > 0) {
		echo '<div class="error">';
		foreach ($errors as $error) {
			echo $error . '<br>';
		}
		echo '</div>';
	}
}
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	} else {
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_button'])) {
	login();
}

//LOGIN USER
function login()
{

	global $db, $username, $errors;

	//Grab form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	//form validation: make sure the form is filled correctly
	if (empty($username)) {
		array_push($errors, "Username is required!");
	}
	else if (empty($password)) {
		array_push($errors, "Password is required!");
	}
	else if (empty($username) && empty($password)) {
		array_push($errors, "The fields are empty!");
	}

	//attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT *FROM personal_information WHERE username = '$username' AND password = '$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				/*$_SESSION['success']  = "You are now logged in";*/
				header('location: adminpage.php');
			} else {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "";

				header('location: student.php');
			}
		} else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') {
		return true;
	} else {
		return false;
	}
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$englishLanguage = $_POST['english'];
	$socialStudies = $_POST['socialstudies'];
	$physicalEducation = $_POST['physicaleducation'];
	$maths = $_POST['maths'];
	$history = $_POST['history'];

	$query = " UPDATE personal_information SET english ='$englishLanguage', socialstudies ='$socialStudies',physicaleducation = '$physicalEducation',maths='$maths',history='$history' WHERE id=$id";

	mysqli_query($db, $query);

	$_SESSION['message'] = "Record Has Been Updated";
	$_SESSION['msg_type'] = "warning";

	header("location: adminpage.php");
}