
<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h3>Welcome to the Student Management System. Input your details here to register</h3>
	<form action="core/handleForms.php" method="POST">
		<p><label for="Username">User Name</label> <input type="text" name="Username"></p>
		<p><label for="password">Passsword</label> <input type="text" name="password"></p>
		<p><label for="gender">Gender</label> <input type="text" name="gender"></p>
		<p><label for="ComputerId">Year Level</label> <input type="text" name="ComputerId"></p>
		<p><label for="RemaingBalance">Remaing Balance</label> <input type="text" name="RemaingBalance"></p>
			<input type="submit" name="insertNewStudentBtn">
		</p>
	</form>

	<table style="width:50%; margin-top: 50px;">
	  <tr>
	    <th>Student ID</th>
	    <th>User Name</th>
	    <th>Last Name</th>
	    <th>Gender</th>
	    <th>Year Level</th>
	    <th>Remaing Balance</th>
	    <th>Action</th>
	  </tr>

	  <?php $seeAllStudentRecords = seeAllStudentRecords($pdo); ?>
	  <?php foreach ($seeAllStudentRecords as $row) { ?>
	  <tr>
	  	<td><?php echo $row['customer_id']; ?></td>
	  	<td><?php echo $row['User_name']; ?></td>
	  	<td><?php echo $row['Password']; ?></td>
	  	<td><?php echo $row['gender']; ?></td>
	  	<td><?php echo $row['Computer_Id']; ?></td>
	  	<td><?php echo $row['Remaing_Balance']; ?></td>
	  	<td>
	  		<a href="editstudent.php?customer_id=<?php echo $row['customer_id'];?>">Edit</a>
	  		<a href="deletestudent.php?customer_id=<?php echo $row['customer_id'];?>">Delete</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>



</body>
</html>
