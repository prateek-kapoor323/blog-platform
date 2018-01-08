<html lang="en">

<?php
session_start();
$user_id=$_SESSION['user_id'];
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
    <?php
    include"navigation.php";
    ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome Admin
                        <small>Author</small>
                    </h1>

                </div>
            </div>
            <div class="">
                <table  class="table table-bordered table-hover" border="1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Role</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $query="SELECT * FROM users where user_id='$user_id'";
                    $result=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $user_id = $row['user_id'];
                        $username=$row['username'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $user_email = $row['user_email'];
                        $user_image = $row['user_image'];
                        $user_role = $row['user_role'];
                        $user_date=$row['user_date'];

                        echo "<tr>";
                        echo "<td>$user_id</td>";
                        echo "<td>$username</td>";
                        echo "<td>$user_firstname</td>";
                        echo "<td>$user_lastname</td>";
                        echo "<td>$user_email</td>";
                        echo "<td><img width='50'src='../images/user/$user_image'</td>";
                        echo "<td>$user_role</td>";
                        echo "<td>$user_date</td>";
                        echo "<td><a href='./users.php?source=viewallusers&change_to_admin={$user_id}'>Admin</a> </td>";
                        echo "<td><a href='./users.php?source=viewallusers&change_to_sub={$user_id}'>Subscriber</a> </td>";
                        echo "<td><a href='./users.php?source=viewallusers&user_id={$user_id}'>Delete</a> </td>";
//                        echo "<td><a href='./includes/view_all_users.php?user_id={$user_id}'>Delete</a> </td>";
                        echo "</tr>";

                        ?>

                    <?php
                    }
                    ?>
                    </tbody>
                </table>



            </div>

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>


<?php
 if(isset($_GET['user_id'])) {
     $delete_user_id = $_GET['user_id'];


     $query = "delete from users where user_id={$delete_user_id}";
     $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    header("location:./users.php?source=viewallusers");
     /// echo "<script type='text/javascript'>window.location.href = './users.php?source=viewallusers';</script>";
 }

 if(isset($_GET['change_to_admin']))
 {
     $change_to_admin=$_GET['change_to_admin'];
     $query="UPDATE users set user_role='Admin' where user_id={$change_to_admin}";
     $result=mysqli_query($connection,$query) or die(mysqli_error($connection));
     header("location:./users.php?source=viewallusers");
 }

 if(isset($_GET['change_to_sub']))
 {
     $change_to_sub=$_GET['change_to_sub'];
     $query="UPDATE users set user_role='Subscriber' where user_id={$change_to_sub}";
     $result=mysqli_query($connection,$query) or die(mysqli_error($connection));
     header("location:./users.php?source=viewallusers");
     // header("location:view_all_users.php");

 }

 ?>






<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>
</html>