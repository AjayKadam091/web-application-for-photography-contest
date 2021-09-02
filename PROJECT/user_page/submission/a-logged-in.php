<?php

session_start();

if(isset($_POST['save']))
{
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
  $email = $_POST['a_email_id'];
  $pass = $_POST['a_password'];
  $sql_query = " SELECT `a_email_id`,`a_password` FROM `admin` WHERE `a_email_id`='$email' and `a_password`='$pass' ";
  $result = mysqli_query($conn,$sql_query);
   $count =mysqli_num_rows($result);
   if ($count>0){
		 $_SESSION['email'] = $_POST['a_email_id'];
		 while($row = mysqli_fetch_assoc($result)){
			 $_SESSION['name'] = $row['name'];
		 }
 echo "<script type='text/javascript'>
			 window.location.href = 'http://localhost/PROJECT/user_page/admin.html';
		 </script>";;
	}
	else {
		echo "<script type='text/javascript'>
			alert('Please enter correct email and password.');
			window.location.href = 'http://localhost/PROJECT/login/index.html';
		</script>";
	}
}


 ?>
