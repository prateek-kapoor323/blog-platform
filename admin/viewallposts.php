<html lang="en">

<?php
session_start();
$user_id=$_SESSION['user_id'];
if(!$_SESSION['user_id'])
{
    header("location:../index.php");
}
?>
<?php
include_once "includes/db.php";
$user_firstname=$_SESSION['firstname'];
$user_image=$_SESSION['user_image'];
include"includes/header.php";
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
                        Welcome Admin
                        <small>Author</small>
                    </h1>

                </div>
            </div>
            <div class="">
                <table  class="table table-bordered table-hover" border="1">
                    <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>POST Title</th>
                        <th>POST Author</th>
                        <th>POST Image</th>
                        <th>POST Date</th>

                        <th>POST Category</th>
                        <th>Comment Count</th>
                        <th>Perform Operations</th>
                    </tr>
                    </thead>
                    <tbody>

                <?php

                $query="SELECT * FROM posts where post_user_id='$user_id'";
                $result=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_date = $row['post_date'];

                    $post_category = $row['post_category'];
                    $post_comment_count=$row['post_comment_count'];

                    echo "<tr>";
                    echo "<td>$post_id </td>";
                    echo "<td>$post_title </td>";
                    echo "<td>$post_author </td>";
                    echo "<td><img width='100' src='../images/$post_image'></td>";
                    echo "<td> $post_date</td>";

                    echo "<td>$post_category </td>";
                    echo "<td>$post_comment_count</td>";
                    echo "<td><a href='posts.php?source=editpost&post_id={$post_id}'>Edit</a>  <a href='viewallposts.php?post_id={$post_id}'>Delete</a> </td>";
                    echo "</tr>";
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
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php
if(isset($_GET['post_id']))
{
    $post_id=$_GET['post_id'];
    $query="delete from posts where post_id=$post_id";
    $result=mysqli_query($connection,$query);
    header("location:viewallposts.php");
   if(!$query)
   {
       DIE("Query Failed".mysqli_connect_error($connection));
   }
}
?>