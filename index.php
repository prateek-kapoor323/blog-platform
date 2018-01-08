<!DOCTYPE html>
<html lang="en">
<?php
include "includes/db.php";
?>
<?php
include "includes/headsection.php";
?>
<body>

    <!-- Navigation -->
   <?php
   include "includes/navigation.php";
   ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post -->

                <?php

                $query="select * from posts ";
                $result= mysqli_query($connection,$query) or die($connection);
                while($row=mysqli_fetch_assoc($result)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_content = mysqli_real_escape_string($connection, $row['post_content']);
                    $post_date = $row['post_date'];
//                    $post_status = $row['post_status'];


                        ?>

                    <h2>
                        <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo "$post_author"; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date"; ?></p>
                    <hr>
                    <img class="img-responsive" src="<?php echo "images/$post_image"; ?>" alt="">
                    <hr>
                    <p><?php echo "$post_content"; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span
                                class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                        <?php

                }
                ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
                   <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <?php
                include "includes/search.php";
                ?>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
               <?php
               include "includes/blogCategories.php";
               ?>

                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Login</h4>
               <?php include_once "includes/login_html.php";?>
            </div>

        </div>

    </div>
    <!-- /.row -->

        <hr>

        <!-- Footer -->
   <?php
   include "includes/footer.php";
   ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>