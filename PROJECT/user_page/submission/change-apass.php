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
  			window.location.href = 'http://localhost/PROJECT/user_page/change_apass.html';
  		</script>";

  }
  else {
    $sql_query = "SELECT `a_email_id`,`a_password` FROM `admin` WHERE `a_email_id`='$email' and `a_password`='$cur'";
    $result=$conn->query($sql_query);

    if (mysqli_num_rows($result)) {
      $sql_query ="UPDATE `admin` SET `a_password`='$new',`re_a_password`='$con' WHERE `a_email_id`='$email' and `a_password`='$cur'";
      if ($conn->query($sql_query)) {

      echo  "<script type='text/javascript'>
            alert('Password Has Changed Successfully!');
            window.location.href = 'http://localhost/PROJECT/user_page/admin.html';
          </script>";



      }
      else {
        echo "<script type='text/javascript'>
    			alert('Password Cannot changed');
    			window.location.href = 'http://localhost/PROJECT/user_page/change_apass.html';
    		</script>";
      }
    }
    else {
      echo "<script type='text/javascript'>
  			alert('Invalid Current Password');
  			window.location.href = 'http://localhost/PROJECT/user_page/change_apass.html';
  		</script>";
    }
  }

}
 ?>
