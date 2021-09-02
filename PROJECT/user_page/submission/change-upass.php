

<?php

session_start();
include ("db.php");

$email =$_SESSION['email'];

if(isset($_POST["curpass"])){
  $cur =$_POST["curpass"];
  $new =$_POST["newpass"];
  $con =$_POST["conpass"];
  if ($new<>$con) {
      echo "<script type='text/javascript'>
  			alert('New Password and Confirm Password is not Matched.');
  			window.location.href = 'http://localhost/PROJECT/user_page/change_upass.html';
  		</script>";


  }
  else {
    $sql_query = "SELECT `u_email_id`,`u_password` FROM `user` WHERE `u_email_id`='$email' and `u_password`='$cur'";
    $result=$conn->query($sql_query);

    if (mysqli_num_rows($result)) {
      $sql_query ="UPDATE `user` SET `u_password`='$new',`re_u_password`='$con' WHERE `u_email_id`='$email' and `u_password`='$cur'";
      if ($conn->query($sql_query)) {

          echo   "<script type='text/javascript'>
        			alert('Password Has Changed Successfully!');
        			window.location.href = 'http://localhost/PROJECT/user_page/dashboard.html';
        		</script>"
      }
      else {
        echo
        "<script type='text/javascript'>
    			alert('Invalid Current Password');
    			window.location.href = 'http://localhost/PROJECT/user_page/change_upass.html';
    		</script>";

      }
    }
    else {
      echo "<script type='text/javascript'>
  			alert('Password cannot changed');
  			window.location.href = 'http://localhost/PROJECT/user_page/change_upass.html';
  		</script>";


    }
  }

}


 ?>
