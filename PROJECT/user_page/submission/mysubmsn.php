

 <html>
 <head>
 <title>Participants</title>
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
 <li><a href="http://localhost/PROJECT/user_page/change_upass.html">Change Password</a></li>
 <li><a href="http://localhost/PROJECT/user_page/index.html">Logout</a></li>
 </ul>
 </div>
 </div>

 <div class="container mt-5">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
         <div class="card-header bg-info">
           <h2 class="text-white" style="text-align:center;">My Submissions</h2>
           <hr>
         </div>
         <div class="card-body">
           <?php

           session_start();
           include ("db.php");

           $email =$_SESSION['email'];
           $sql_query = "SELECT category,upload_img,sub_id FROM `submission` WHERE u_email_id='$email' ";
           $result = mysqli_query($conn,$sql_query);

            ?>
           <table class="table" border="2" align="center">
             <thead>
               <tr>
                 <!-- <th>first_name</th>
                 <th>last_name</th>
                 <th>u_email_id</th> -->
                 <!-- <th>add_1</th>
                 <th>add_2</th>
                 <th>city</th>
                 <th>state</th>
                 <th>pincode</th> -->
                 <!-- <th>country</th> -->
                 <th>category</th>
                 <!-- <th>contact</th> -->
                 <th>upload_img</th>
                 <th>sub_id</th>
                 <th>Delete</th>
               </tr>
             </thead>
             <tbody>
               <?php
                 $sql =mysqli_num_rows($result);
                   if ($sql>0){

                     foreach ($result as $row){
                       ?>
                       <tr border="2">


                         <td><?php echo  $row['category'] ;  ?></td>

                         <td><?php echo '<img src = "data:image/jpg;base64,' . base64_encode($row['upload_img']) . '" width = "150px"/>'; ?></td>
                         <td><?php echo  $row['sub_id']; ?></td>
                         <td>
                           <button type="button" class="btn btn-info" name="button">DELETE</button>
                         </td>
                       </tr>


                       <?php
                     }
                   }
                   else {
                     echo "  <script>
                         alert('No records found!');
                          window.location.href = 'http://localhost/PROJECT/user_page/admin.html';
                       </script>";
                   }
            ?>
               <tr>

               </tr>
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>


 </body>
 </html>
