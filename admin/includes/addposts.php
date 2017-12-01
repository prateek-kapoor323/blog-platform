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
if(isset($_POST['submit']))
{
    $post_title=$_POST['title'];
    $post_author=$_POST['author'];
    $post_category=$_POST['category'];
    $post_tags=$_POST['tags'];
    $post_status=$_POST['status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp =$_FILES['image']['tmp_name'];
    $post_date=date('d-m-y');
    $post_content=mysqli_real_escape_string($connection,$_POST['content']);
    $post_comment_count=4;
    move_uploaded_file($post_image_temp,"../images/$post_image");


    $query="INSERT INTO posts (post_title, post_author,post_category, post_image, post_content, post_date, post_tags, post_comment_count,post_status) VALUES ('$post_title' ,   '$post_author',
    '$post_category','$post_image','$post_content',now(),'$post_tags','$post_comment_count','$post_status')";
    $result=mysqli_query($connection,$query);
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
           include "addpostshtml.php";
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