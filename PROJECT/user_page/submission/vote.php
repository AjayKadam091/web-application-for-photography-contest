

<html>
<head>
<title>Participants</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
    body {
        margin: 0px;
        border: 0px;
    }
#header {
    width: 100%;
    height: 150px;
    background: black;
    color: white;
}
#data {
    height: 700px;
    background: linear-gradient(110deg, red, pink);
    color: black;
    font-family: Times New Roman;
    font-size: 25px;
}
#adminlogo {
    background: white;
    border-radius: 50px;
}
select {
  text-align: center;
  text-align-last: center;
}
option {
  text-align: left;
}
#category {
    position: center;
    z-index: 10;
    width: 450px;
    height: 50px;
    border: 1px solid #000;
    font-family: Times New Roman;
    font-size: 20px;
}


</style>
</head>
<body>
<div id="header">
<center><h1 class="display-3">THE ICONIC EYE</h1> </center>
 <input type="checkbox" id="openSidebarMenu">
    <label for="openSidebarMenu" class="sidebarIconToggle">
        <div class="spinner top"></div>
        <div class="spinner middle"></div>
        <div class="spinner bottom"></div>
    </label>
    <div id="sidebarMenu">
<ul class="menu">
<li><a href="http://localhost/PROJECT/user_page/dashboard.html">Dashboard</a></li>
<li><a href="https://localhost/PROJECT/user_page/submission/mysubmsn.php">My Submission</a></li>
<li><a href="http://localhost/PROJECT/login/change_upass.html">Change Password</a></li>
<li><a href="http://localhost/PROJECT/login/index.html">Logout</a></li>
</ul>
</div>
</div>

<div class="container mt-5" >
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-info">
          <h2 class="text-white" style="text-align:center;">Vote for your favourite Photographer</h2>
          <hr>
        </div>
        <div class="card-body">
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

          if (isset($_POST['show'])) {
            $category = $_POST['category'];

          $sql_query = "SELECT first_name,last_name,u_email_id,category,upload_img,sub_id FROM `submission` WHERE category='$category'";
          $result =mysqli_query($conn,$sql_query);


           ?>
          <table class="table" border="2" align="center">
            <thead>
              <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>u_email_id</th>
                <!-- <th>add_1</th>
                <th>add_2</th>
                <th>city</th>
                <th>state</th>
                <th>pincode</th> -->
                <!-- <th>country</th> -->
                <th>upload_img</th>
                <th>category</th>
                <!-- <th>contact</th> -->

                <th>sub_id</th>
                <th>Vote For</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql =mysqli_num_rows($result);
                  if ($sql>0){

                    foreach ($result as $row){
                      ?>
                      <tr border="2">
                        <td><?php echo  $row['first_name'] ;  ?></td>
                        <td><?php echo  $row['last_name'] ;  ?></td>
                        <td><?php echo  $row['u_email_id'] ;  ?></td>


                        <td><?php echo '<img src = "data:image/jpg;base64,' . base64_encode($row['upload_img']) . '" width = "150px"/>'; ?></td>

                        <form class="" action="https://localhost/PROJECT/user_page/submission/submit_vote.php" method="get">

                              <td>     <input type="text" name="category" value="<?php echo  $row['category'] ; ?>" readonly></td>
                              <td>     <input type="text" name="sub_id" value="<?php echo  $row['sub_id']; ?>" readonly></td>
                        <td>
                          <center> <button type="submit" class="btn btn-danger" name="submit_vote" value="<?php echo  $row['sub_id']; ?>">Submit Vote</button></center>  </form>

                        </td>
                      </tr>


                      <?php
                    }


                  }
                  else {
                    echo "  <script>
                        alert('No records found!');
                         window.location.href = 'http://localhost/PROJECT/user_page/vote.html';
                      </script>";
                  }
            }

            ?>


            <?php

              ?>

            </tbody>
          </table>
          <br>
          <!-- <center> <button type="submit" class="btn btn-danger" name="button">Submit Vote</button></center> -->
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
