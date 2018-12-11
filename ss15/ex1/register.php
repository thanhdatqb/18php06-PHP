<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
</head>
<body>
	<?php
	$tableName = 'users';
	function connectDb() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "18php06";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
	function insertUser($name ,$username, $password, $gender, $city) {
		$message = "";
		global $tableName;
		$conn = connectDb();		 
		$sql = "INSERT INTO $tableName (name, username, password, gender, city)
		VALUES ('$name', '$username', '$password', '$gender', '$city')";
		if ($conn->query($sql) === TRUE) {
		    $message = "Thành Công";
		} else {
		    $message = "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		return $message;
	}
	
	?>

	<?php
	$errName = $errUsername = $errPassword = $errGender = $errCity = "";
	$name = $username = $password = $gender = $city = "";
	$message = "";
	if(isset($_POST['register'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (!empty($_POST['gender'])) {
			$gender = $_POST['gender'];
		}
		$city = $_POST['city'];
		if ($name == '') {
			$errName = 'Vui long nhap ten';
		}
		if ($username == '') {
			$errUsername = 'Vui long nhap ten dang nhap';
		}
		if ($password == '') {
			$errPassword = 'Vui long nhap mat khau';
		}
		if ($gender == '') {
			$errGender = 'Vui long chon gioi tinh';
		}
		if ($city == '') {
			$errCity = 'Vui long chon thanh pho';
		}
		if ($errName . $errUsername . $errPassword . $errGender . $errCity == '') {
			$message = insertUser($name ,$username, $password, $gender, $city);
		}
	}
	?>
	<h1>Register Form</h1>
	<form action="#" method="post">
		<p >Name:<input type="text" name="name" value="<?php echo $name ?>"></p>
		<p style="color: red;">
			<?php echo $errName;?>
		</p>
		<p>Username:<input type="text" name="username" value="<?php echo $username ?>"></p>
		<p style="color: red;">
			<?php echo $errUsername; ?>
		</p>
		<p>Password:<input type="password" name="password" value="<?php echo $password ?>"></p>
		<p style="color: red;">
			<?php echo $errPassword;?>	
		</p>
		<p>
			<input type="radio" name="gender" value="male" <?php if($gender == 'male') echo "checked"; ?>> Male<br>
			<input type="radio" name="gender" value="female" <?php if($gender == 'female') echo "checked"; ?>> Female<br>
		</p>
		<p style="color: red;">
			<?php echo $errGender;?>	
		</p>
		<p>
			<select name="city">
				<option value="">Choose City</option>
				<option value="HaNoi" <?php if($city == 'HaNoi') echo "selected"; ?>>Ha Noi</option>
				<option value="DaNang" <?php if($city == 'DaNang') echo "selected"; ?>>Da Nang</option>
				<option value="HoChiMinh" <?php if($city == 'HoChiMinh') echo "selected"; ?>>Ho Chi Minh</option>
			</select>
		</p>
		<p style="color: red;">
			<?php echo $errCity;?>	
		</p>
		<input type="submit" name="register" value="Register">
	</form>
	<p style="color: red;font-size: 20px;">
		<?php echo $message;?>
	</p>
</body>
</html>