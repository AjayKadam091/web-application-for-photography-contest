<?php
session_start();
include 'db.php';
if (isset($_GET['submit_vote'])) {
  $email = $_SESSION['email'];
  $sub_id=$_GET['sub_id'];
  $category=$_GET['category'];

      $sql_query ="SELECT * FROM `votes` WHERE u_email_id='$email' AND category='$category' ";
      $query_run = mysqli_query($conn,$sql_query);

      if(mysqli_num_rows($query_run)){
        echo "  <script>
            alert('You have already voted');
            window.location.href = 'http://localhost/PROJECT/user_page/vote.html';
          </script>";

      }
      else {
        $query = "INSERT INTO `votes` (sub_id,u_email_id,category) VALUES ('$sub_id','$email','$category')";
        $result = mysqli_query($conn,$query);
        if ($result) {
          echo "
          <script>
            alert('Thank you for the vote!');
            window.location.href = 'http://localhost/PROJECT/user_page/dashboard.html';
          </script>";

        }
        else {
          echo "<script type='text/javascript'>
               alert('Your vote is not submitted');
               window.location.href = 'http://localhost/PROJECT/user_page/submission/vote.php';
              </script>" ;
        }
      }


} ?>
