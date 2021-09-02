<?php

session_start();;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>VOTE COUNT</title>
    <link rel="stylesheet" href="css/style.css">
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
    <center><h1>THE ICONIC EYE</h1> </center>
     <input type="checkbox" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner top"></div>
            <div class="spinner middle"></div>
            <div class="spinner bottom"></div>
        </label>
        <div id="sidebarMenu">
    <ul class="menu">
      <li><a href="http://localhost/PROJECT/user_page/admin.html">Dashboard</a></li>
      <li><a href="https://localhost/PROJECT/user_page/submission/demo.php">Participants</a></li>
      <li><a href="http://localhost/PROJECT/user_page/vote-count.html">Votes</a> </li>
      <li><a href="http://localhost/PROJECT/user_page/change_apass.html">Change Password</a></li>
      <li><a href="http://localhost/PROJECT/user_page/index.html">Logout</a></li>
    </ul>
    </div>
    </div>
    <div class="container mt-5" >
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-info">
              <h2 class="text-white" style="text-align:center;">Votes</h2>
              <hr>
            </div>
            <div class="card-body">
              <?php
              include 'db.php';

              if (isset($_POST['show'])) {
                $category = $_POST['category'];

                $sql_query = "SELECT count(vote_id),sub_id,category FROM `votes` WHERE category='$category' GROUP BY sub_id  ORDER BY count(vote_id) DESC";
                $query_run = mysqli_query($conn,$sql_query);
               ?>
              <table class="table" border="2" align="center">
                <thead>
                  <tr>

                    <th>sub_id</th>
                    <th>category</th>
                    <th>vote-count</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql =mysqli_num_rows($query_run);
                      if ($sql>0){

                        foreach ($query_run as $row){
                          ?>
                          <tr border="2">
                            <td><?php echo  $row['sub_id'] ;  ?></td>
                            <td><?php echo  $row['category'] ;  ?></td>
                            <td><?php echo  $row['count(vote_id)'] ; ?></td>

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
