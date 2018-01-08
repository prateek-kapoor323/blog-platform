<?php
session_start();
if(!$_SESSION['user_id'])
{
    header("location:../index.php");
}
?>
<?php
include_once "db.php";
$user_firstname=$_SESSION['firstname'];
$user_image=$_SESSION['user_image'];
include"header.php";
?>
<?php
if(isset($_POST['register']))
{
    $username=$_POST['username'];
    $user_password=$_POST['password'];
    $user_firstname=$_POST['firstname'];
    $user_lastname=$_POST['lastname'];
    $user_email=$_POST['email'];
    $user_role=ucfirst($_POST['role']);
    $user_image = $_FILES['image']['name'];
    $user_image_temp =$_FILES['image']['tmp_name'];
    $user_date=date('d-m-y');
    move_uploaded_file($user_image_temp,"../images/user/$user_image");


    $query="INSERT INTO users(username, user_password,user_firstname,user_lastname,user_email,user_image, user_role,user_date) VALUES ('$username' ,'$user_password',
    '$user_firstname','$user_lastname','$user_email','$user_image','$user_role',now())";
    $result=mysqli_query($connection,$query) or die (mysqli_error($connection));
    if(!$query)
    {
        DIE("Query Failed".mysqli_connect_error($connection));
    }
}
?>



<html lang="en">

<?php
include "header.php";

?>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "navigation.php";?>
    <div id="page-wrapper">

        <div>

            <!-- Page Heading -->
            <?php
            include "add_user_html.php";
            ?>


            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>
</html>