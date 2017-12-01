
<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
session_start();
if(!$_SESSION['user_id'])
{
    header("location:../index.php");
}
else
include_once "includes/db.php";
?>
<?php
include "includes/header.php";
if(isset($_SESSION['user_role']))
{
    $user_role=$_SESSION['user_role'];
    if($user_role!="Admin")
    {
        header("location:../index.php");
    }
    else
        {
        $user_id=$_SESSION['user_id'];
        $display_query="SELECT * FROM users WHERE user_id=$user_id";
        $result=mysqli_query($connection,$display_query) ;
        while($row=mysqli_fetch_assoc($result))
        {
            $username=$row['username'];
            $user_firstname=$row['user_firstname'];
           // $user_lastname=$row['user_lastname'];
            $user_image=$row['user_image'];
        }
           $_SESSION['firstname']=$user_firstname;
           $_SESSION['user_image']=$user_image;

        }
}

?>
<body>

    <div id="wrapper">

       <!-- Navigation -->
  <?php include "includes/navigation.php";?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome <?php echo ucfirst($user_firstname);?>
                            <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>

                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
