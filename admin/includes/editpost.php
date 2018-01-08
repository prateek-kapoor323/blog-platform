<html lang="en">

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
    <br>
    <br>
    <div id="page-wrapper">

        <div>

            <!-- Page Heading -->


            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
<div>

    <?php
    if(isset($_GET['post_id'])) {
        $edit_id = $_GET['post_id'];
    }

        $query = " SELECT * FROM posts WHERE post_id= $edit_id ";
        //  echo $query;
        $result = mysqli_query($connection, $query);
        //
        while ($row = mysqli_fetch_assoc($result)) {
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_category = $row['post_category'];
            $post_tags = $row['post_tags'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];


        }

        if (isset($_POST['submit'])) {


            $post_title = $_POST['title'];
            $post_author = $_POST['author'];
            $post_category = $_POST['category'];
            $post_tags = $_POST['tags'];

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];
            $post_content = mysqli_real_escape_string($connection, $_POST['content']);

            move_uploaded_file($post_image_temp, "../images/$post_image") ;
            if (empty($post_image)) {
                $query = "select * from posts WHERE post_id={$edit_id}";

                $result = mysqli_query($connection, $query);
                $count = mysqli_num_rows($result);

                while ($row = mysqli_fetch_assoc($result)) {
                    $post_image = $row['post_image'];
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






            $query = "UPDATE posts SET post_title='{$post_title}',post_author='{$post_author}', post_category='{$post_category}',post_tags='{$post_tags}',
                                post_image='{$post_image}',post_content='{$post_content}' WHERE post_id= {$edit_id}";
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    }


?>
    <form  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Title">Post Title</label>
            <input type="text" value="<?php echo $post_title;?>" class="form-control"  placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label for="Author">Post Author</label>
            <input type="text" value="<?php echo $post_author;?>" placeholder="Author Name" class="form-control" name="author">
        </div>

        <div class="form-group">
            <label for="category">Post Category</label>
            <input type="text" value="<?php echo $post_category;?>" class="form-control"  placeholder="Enter Category" name="category">
        </div>

        <div class="form-group">
            <label for="Post Tags">Post Tags</label>
            <input type="text" value="<?php echo $post_tags;?>" class="form-control" placeholder="Post Tags" name="tags">
        </div>

        <label for="image">Upload Image</label>
        <br>
         <img width="100" src="../images/<?php echo $post_image;?>" alt="image">

        <input type="file" name="image" id="fileToUpload">
        <br>


        <div class="form-group">
            <label for="Post Content">Post Content</label>
            <textarea name="content" rows="15" cols="75 "><?php echo $post_content;?></textarea>

        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
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