<!-- Full Code of php file for mySql database connection with html form -->
<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="theiconiceye";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{
	 $name = $_POST['admin_name'];
	 $email = $_POST['a_email_id'];
	 $pass = $_POST['a_password'];
   $re_u_pass = $_POST['re_a_password'];
	 $sql_query = "INSERT INTO admin (admin_name,a_email_id,a_password,re_a_password)
	 VALUES ('$name','$email','$pass','$re_u_pass')";

	 if (mysqli_query($conn, $sql_query))
	 {
		echo "<script type='text/javascript'>
					alert('Please log in with email and password.');
					window.location.href = 'http://localhost/PROJECT/login/index.html';
				</script>";
	 }
	 else
     {
			 echo "<script type='text/javascript'>
	 					alert('Please log in with email and password.');
	 					window.location.href = 'http://localhost/PROJECT/login/sign_up.html';
	 				</script>";
	 }
	 mysqli_close($conn);
}
?>
