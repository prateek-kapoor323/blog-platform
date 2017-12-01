<html lang="en" xmlns="http://www.w3.org/1999/html">

<?php
session_start();
if(!$_SESSION['user_id'])
{
    header("location:../index.php");
}?>
<?php
include_once "db.php";
$user_firstname=$_SESSION['firstname'];
$user_image=$_SESSION['user_image'];
include"header.php";
?>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "navigation.php";?>
    <div id="page-wrapper">

        <div>

            <!-- Page Heading -->


            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
        <div>

            <?php
            if(isset($_GET['user_id'])) {
                $user_edit_id = $_GET['user_id'];
            }

            $query = " SELECT * FROM users WHERE user_id= $user_edit_id ";
            //  echo $query;
            $result = mysqli_query($connection, $query);
            //
            while ($row = mysqli_fetch_assoc($result))
            {
                $user_id=$row['user_id'];
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];

            }

            if (isset($_POST['submit'])) {


                $username = $_POST['username'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $user_email = $_POST['user_email'];
                $user_image = $_FILES['image']['name'];
                $user_image_temp = $_FILES['image']['tmp_name'];
                $user_role = $_POST['user_role'];

                move_uploaded_file($user_image_temp, "../images/user/$user_image") ;
                if (empty($post_image)) {
                    $query = "select * from users WHERE user_id={$user_edit_id}";

                    $result = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($result);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $user_image = $row['user_image'];
                    }

                }

                /* UPDATE QUERY*/

//            $query="UPDATE posts SET";
//            $query.="post_title='{$post_title}',";
//            $query.="post_author='{$post_author}',";
//            $query.="post_category='{$post_category}',";
//            $query.="post_tags='{$post_tags}',";
//            $query.="post_status='{$post_status}',";
//            $query.= "post_image='{$post_image}',";
//            $query.="post_content='{$post_content}'";






                $query = "UPDATE users SET username='{$username}',user_firstname='{$user_firstname}', user_lastname='{$user_lastname}',user_email='{$user_email}',
                                user_image='{$user_image}',user_role='{$user_role}' WHERE user_id= {$user_edit_id}";
                $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
            }


            ?>

            <div class="container">
                <form  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Title">User ID</label>
                    <input type="text" value="<?php echo $user_id;?>" class="form-control"  readonly placeholder="Enter title" name="title">
                </div>
                <div class="form-group">
                    <label for="Title">Username</label>
                    <input type="text" value="<?php echo $username;?>" class="form-control"  name="username">
                </div>
                <div class="form-group">
                    <label for="First Name">User Firstname</label>
                    <input type="text" value="<?php echo $user_firstname;?>" class="form-control" name="firstname">
                </div>
                <div class="form-group">
                    <label for="Last Name">User Lastname</label>
                    <input type="text" value="<?php echo $user_lastname;?>"  class="form-control" name="lastname">
                </div>
                <div class="form-group">
                    <label for="Email">User Email</label>
                    <input type="text" value="<?php echo $user_email;?>"  class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="Email">User Role</label>
                    <input type="text" value="<?php echo $user_role;?>"  class="form-control" name="role">
                </div>
                <label for="image">Upload Image</label>
                <br>
                <input type="file" accept=".png,.jpg,.jpeg" name="image" id="fileToUpload">
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

    </div>
</div>
<!-- jQuery -->
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>
</html>