<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Smalt and Beryl</a>
            <a class="navbar-brand" href="./admin/index.php">Admin Board</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                $query="SELECT * FROM categories";
                $result=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $category_id=$row['category_id'];
                    $category=$row['category_name'];



?>

                <li>
                    <a href="post_category.php?category_id=<?php echo $category_id;?>"><?php echo $category;?></a>
                </li>
                <?php }?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>