<!-- Full Code of php file for mySql database connection with html form -->
<?php

session_start();

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
	 $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
	 $email = $_POST['email'];
   $add_1 = $_POST['add_1'];
   $add_2 = $_POST['add_2'];
   $city = $_POST['city'];
   $state = $_POST['state'];
    $pincode = $_POST['pincode'];
   $country = $_POST['country'];
   $category = $_POST['category'];
   $contact = $_POST['contact'];
	 $file =addslashes(file_get_contents($_FILES['upload_img']['tmp_name']));


	 $query = "SELECT category FROM submission WHERE u_email_id='$email'";
	 $sqlsearch = mysqli_query($conn,$query);
	$resultcount = mysqli_num_rows($sqlsearch);
	 if ($resultcount<2) {

		 $sql_query = "INSERT INTO submission (first_name,last_name,u_email_id,add_1,add_2,city,state,pincode,country,category,contact,upload_img)
					 VALUES ('$first_name','$last_name','$email','$add_1','$add_2','$city','$state','$pincode','$country','$category','$contact','$file')";
		 $result = mysqli_query($conn,$sql_query);

		if ($result)
		{
		
			$_SESSION['status']="Image inserted successfully";
	 		header("LOCATION: http://localhost/PROJECT/user_page/thankyou.html");
		}

 else {
	 echo "<script type='text/javascript'>
				alert('Registration is not done');
				window.location.href = 'http://localhost/PROJECT/user_page/userlogin.html';
			 </script>" ;

 }
}
		 else
				{
					header("LOCATION:http://localhost/PROJECT/user_page/limitexceed.html");

				}
	 }

?>













<!--
//
//    if ($query<2) {
//
//      $sql_query = "INSERT INTO submission (fisrt_name,last_name,u_email_id,add_1,add_2,city,state,pincode,country,category,contact,upload_img)
//   	 VALUES ('$first_name','$last_name','$email','$add_1','$add_2','$city','$state','$pincode','$country','$category','$cantact','$upload_img')";
//
// 	 if (mysqli_query($conn, $sql_query))
// 	 {
// 	header("Location: http://localhost/PROJECT/user_page/thankyou.html");
// 	 }
// 	 else
//      {
// 		echo "<h4 style='color:red'>YOUR LIMIT IS EXCEED!</h4> " . $sql . "" . mysqli_error($conn);
// 	 }
//
// }
//
//    else {
//      echo "<h4 style='color:red'>YOUR LIMIT IS EXCEED!</h4>";
//    }


	 // mysqli_close($conn);




<! (fisrt_name,last_name,u_email_id,add_1,add_2,city,state,pincode,country,category,contact,upload_img) -->

<!--
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$add_1 = $_POST['add_1'];
$add_2 = $_POST['add_2'];
$city = $_POST['city'];
$state = $_POST['state'];
 $pincode = $_POST['pincode'];
$country = $_POST['country'];
$category = $_POST['category'];
$contact = $_POST['contact'];
$upload_img = $_POST['upload_img']; -->
