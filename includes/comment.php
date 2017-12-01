<?php
include "db.php";
?>


<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" method="post">
        <div class="form-group">
            <label for="Author">Author</label>
           <input type="text" class="form-control" name="comment_author" required>
        </div>

        <div class="form-group">
            <label for="Email">E-mail</label>
            <input type="text" class="form-control" name="comment_email" required>
        </div>
        <label for="Content">Content</label>
        <div class="form-group">
          <textarea name="comment_content" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>
<!-- Comment Input In Database -->

<?php
if(isset($_POST['submit']))
{
    $comment_post_id=$_GET['post_id'];
    $comment_author=$_POST['comment_author'];
    $comment_email=$_POST['comment_email'];
    $comment_content=$_POST['comment_content'];

    $query="insert into comments(comment_author,comment_post_id,comment_email,comment_content,comment_date) VALUES ('$comment_author','$comment_post_id','$comment_email','$comment_content', now())";
    $result=mysqli_query($connection,$query) or die(mysqli_error($connection));

    $count_query="UPDATE posts SET post_comment_count= post_comment_count+1 where post_id=$comment_post_id";
    $count_result=mysqli_query($connection,$count_query);
}

?>



<!-- Posted Comments -->
<div class="media">
<?php

$comment_post_id=$_GET['post_id'];

$query="SELECT * FROM comments WHERE comment_post_id=$comment_post_id && comment_status='approved' ORDER BY  comment_id desc";
$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
while($row=mysqli_fetch_assoc($result))
{
    $comment_author=$row['comment_author'];
    $comment_date=$row['comment_date'];
    $comment_content=$row['comment_content'];
    ?>

        <div class="media">

            <h4 class="media-heading"><?php echo $comment_author;?>
                <small>Posted On <?php echo $comment_date;?></small>
            </h4>
            <?php echo $comment_content;?>
        </div>
    </div>


    <?php
}
?>



<!-- Comment -->


