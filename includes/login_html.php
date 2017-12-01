<?php include "includes/db.php";?>

<div class="container">
    <form action="" method="post">
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
        </div>
        <div class="input-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control"  name="password" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="#">Don't have an account?Sign in here</a>
</div>


<?php
 if(isset($_POST['submit']))
 {

     $username=$_POST['username'];
     $user_password=$_POST['password'];

     /** @var TYPE_NAME $query */
     $query="select * from users where username='{$username}'&& user_password='{$user_password}'";
     $result=mysqli_query($connection,$query) or die("Query Failed".mysqli_error($connection));
     $count=mysqli_num_rows($result);
     if($count>0) {
         while ($row = mysqli_fetch_assoc($result)) {
             $user_role = $row['user_role'];
             $user_id = $row['user_id'];
             }
                 session_start();
                 //$_SESSION['user_firstname']= $user_firstname;
                  $_SESSION['user_role']= $user_role;
                  $_SESSION['user_id']=$user_id;
                 header("location:./admin/index.php");
         }

     else
     {
         echo "Invalid Credentials";
     }
 }

?>
