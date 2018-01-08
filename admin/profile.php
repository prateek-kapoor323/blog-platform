<?php
session_start();
ob_start();
include "includes/db.php";
$user_id=$_SESSION['user_id'];
if(!$_SESSION['user_id'])
{
    header("location:./index.php");
}
?>
<?php
if($_SESSION['user_id'])
{
    $query="SELECT * FROM users where user_id='$user_id'";
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result))
    {
        $username=$row['username'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_role=$row['user_role'];
        $user_image=$row['user_image'];
    }
}
?>

<html>
<?php include "includes/header.php";?>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/navigation.php";?>
    <br>
    <br>
    <div id="page-wrapper">

        <div>
            <!-- Page Heading -->

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
        <div>
<form  method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Profile Picture">Profile Picture</label>
        <?php echo"<img width='250px' src='../images/user/$user_image'>";?> <input type="file" name="image" id="fileToUpload">
        <br>

    </div>
    <div class="form-group">
        <label for="Useername">Username</label>
        <input type="text" value="<?php echo $username;?>" placeholder="Author Name" class="form-control" name="username" >
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="<?php echo $user_email;?>" class="form-control"   name="user_email" >
    </div>

    <div class="form-group">
        <label for="First Name">First Name</label>
        <input type="text" value="<?php echo $user_firstname;?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="Post Content">Role</label>
        <input type="text" value="<?php echo $user_role;?>" class="form-control" name="user_role" readonly>

    </div>
    <button type="submit" name="updateProfile" class="btn btn-primary">Update Profile</button>
</form>
</div>
</div>


</body>
</html>

<?php
if(isset($_POST['updateProfile']))
{
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($user_image_temp, "./images/user/$user_image") ;
    if (empty($user_image)) {
        $query = "select * from users WHERE user_id={$user_id}";

        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
            $user_image = $row['user_image'];
        }

    }
    $user_firstname=$_POST['user_firstname'];
    $user_email=$_POST['user_email'];
    $username=$_POST['username'];
    $updateQuery="UPDATE users SET user_image='{$user_image}',user_firstname='{$user_firstname}',user_email='{$user_email}',username='{$username}' WHERE user_id= {$user_id}";
    $result=mysqli_query($connection,$updateQuery);
    if($updateQuery)
    {
        header("location:profile.php");
    }
   else{
        DIE("Query Failed").mysqli_error($connection);
   }

}

?>