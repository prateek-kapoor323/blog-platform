<h4>Blog Categories</h4>

<div class="row">
    <div class="col-lg-6">
        <ul class="list-unstyled">
            <?php
            $query="Select * from posts";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)) {
                $post_id=$row['post_id'];
                $post_category = mysqli_real_escape_string($connection, $row['post_category']);

            ?>
                <li><a href="post.php?post_id=<?php echo $post_id;?>"><?php echo"$post_category";?></a> </li>


          <?php  } ?>




        </ul>
    </div>
   </div>