<!-- Functions for interacting with the database -->

<?php 

require_once 'dbConfig.php';

function insertIntoStudentRecords($pdo,$user_name, $pass_word, $gender, $computer_id,) {

	$sql = "INSERT INTO customer_records (user_name,pass_word,gender,computer_id,remaining_balance) VALUES (?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$user_name, $pass_word, $gender, $computer_id, 
,]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllStudentRecords($pdo) {
	$sql = "SELECT * FROM customer_records";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getStudentByID($pdo, $customer_id) {
	$sql = "SELECT * FROM customer_records WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$customer_id])) {
		return $stmt->fetch();
	}
}

function updateAStudent($pdo, $customer_id, $user_name, $pass_word, 
	$gender, $computer_id,) {

	$sql = "UPDATE customer_records 
				SET user_name = ?, 
					pass_word = ?, 
					gender = ?, 
					computer_id = ?, 
					remaining_balance = ?, 
			WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$user_name, $pass_word, $gender, 
		$computer_id,, $customer_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteAStudent($pdo, $customer_id) {

	$sql = "DELETE FROM customer_records WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$customer_id]);

	if ($executeQuery) {
		return true;
	}

}




?>
