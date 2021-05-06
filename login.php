<?php 
	$conn = new mysqli("localhost", "root", "", "login");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="post">
		<label>Username</label>
		<input type="text" name="username"> <br><br>
		<label>Password</label>
		<input type="password" name="password"><br><br>
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>

<?php 

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM user WHERE username=LOWER('$username') AND password='$password';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if (!empty($row)) {
            $_SESSION["login"] = $username;
            echo "<script> location= 'index.php'; </script>";
        } else{
            echo "<script> alert('Username / Password salah!') </script>";
        }
    }
?>