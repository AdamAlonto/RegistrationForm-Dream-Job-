
<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewStudentBtn'])) {
	$user_name = trim($_POST['user_name']);
	$pass_word = trim($_POST['pass_word']);
	$gender = trim($_POST['gender']);
	$computer_id = trim($_POST['computer_id']);
	$remaining_balance = trim($_POST['remaining_balance']);
	

	if (!empty($user_name) && !empty($pass_word) && !empty($gender) && !empty($computer_id) && !empty($remaining_balance)  && !empty($remaining_balance) ) {
			$query = insertIntoStudentRecords($pdo, $user_name, $pass_word, 
			$gender, $computer_id, $remaining_balance, $adviser);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editStudentBtn'])) {
	$student_id = $_GET['student_id'];
	$user_name = trim($_POST['user_name']);
	$pass_word = trim($_POST['pass_word']);
	$gender = trim($_POST['gender']);
	$computer_id = trim($_POST['computer_id']);
	$remaining_balance = trim($_POST['remaining_balance']);
	

	if (!empty($student_id) && !empty($user_name) && !empty($pass_word) && !empty($gender) && !empty($computer_id) && !empty($remaining_balance) ) {

		$query = updateAStudent($pdo, $student_id, $user_name, $pass_word, $gender, $computer_id, $remaining_balance, $adviser);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteStudentBtn'])) {

	$query = deleteAStudent($pdo, $_GET['student_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}




?>
