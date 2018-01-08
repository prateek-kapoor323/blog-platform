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
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>In Response To</th>
                        <th>Date</th>
                        <th>Approve</th>
                        <th>Unapproved</th>
                        <th>Delete</th>
                     </tr>
                    </thead>
                    <tbody>

                    <?php

                    $query="SELECT * FROM comments WHERE comment_user_id='$user_id'";
                    $result=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $comment_id = $row['comment_id'];
                        $comment_post_id=$row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                        $comment_status = $row['comment_status'];


                        echo "<tr>";
                        echo "<td>$comment_id</td>";
                        echo "<td>$comment_author</td>";
                        echo "<td>$comment_content</td>";
                        echo "<td>$comment_email</td>";
                        echo "<td>$comment_status</td>";

                        $query1="SELECT * from posts WHERE post_id=$comment_post_id";

                        $resultQuery=mysqli_query($connection,$query1);
                        while($queryRow=mysqli_fetch_assoc($resultQuery))
                        {
                            $response=$queryRow['post_category'];
                        }

                        echo  "<td><a href='../post.php?post_id=$comment_post_id'>$response</a></td>";
                        echo "<td>$comment_date</td>";
                        echo "<td><a href='comments.php?approved=$comment_id'> Approve</a></td>";
                         echo "<td><a href='comments.php?unapproved=$comment_id'>Unapprove</a> </td>";
                         echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a> </td>";
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
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>
</html>


<!--Delete Query-->
<?php

if(isset($_GET['approved']))
{
    $comment_id=$_GET['approved'];
    $approve_Query="UPDATE comments SET comment_status='approved' where comment_id={$comment_id}";
    $resultQuery=mysqli_query($connection,$approve_Query) or die(mysqli_error($connection));
    header("location:./comments.php");
}



if(isset($_GET['unapproved']))
{
    $comment_id=$_GET['unapproved'];
    $unapprove_Query="UPDATE comments SET comment_status='unapproved' where comment_id={$comment_id}";
    $resultQuery=mysqli_query($connection,$unapprove_Query) or die(mysqli_error($connection));
    header("location:./comments.php");
}

if(isset($_GET['delete']))
{
    $comment_id=$_GET['delete'];
    $deleteQuery="Delete from comments where comment_id=$comment_id";
    $resultQuery=mysqli_query($connection,$deleteQuery) or die(mysqli_error($connection));
    $count_query="UPDATE posts SET post_comment_count= post_comment_count-1 where post_id=$comment_post_id";
    $count_result=mysqli_query($connection,$count_query);
  header("location:./comments.php");
}
?>
