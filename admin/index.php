
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

                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

                                        $query="SELECT * from posts";
                                        $result=mysqli_query($connection,$query);
                                        $post_count=mysqli_num_rows($result);
                                        echo "<div class='huge'>$post_count</div>";
                                        ?>
                                     <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php?source=viewallposts">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                     <?php
                                     $comment_query="SELECT * from comments";
                                     $result=mysqli_query($connection,$comment_query);
                                     $comment_count=mysqli_num_rows($result);

                                     echo "<div class='huge'>$comment_count</div>";
                                     ?>

                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                      <?php

                                      $query="select * from users";
                                      $result=mysqli_query($connection,$query);
                                      $user_count=mysqli_num_rows($result);

                                      echo "<div class='huge'>$user_count</div>";
                                      ?>
                                     <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php?source=viewallusers">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">


                                      <?php
                                      $query="SELECT * FROM categories";
                                      $result=mysqli_query($connection,$query);
                                      $categories_count=mysqli_num_rows($result);

                                      echo "<div class='huge'>$categories_count</div>";
                                      ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            <div class="col-md-6">
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php
                            $element_text=['Posts','Comments','users','categories'];
                            $element_count=[$post_count,$comment_count,$user_count,$categories_count];

                            for($i=0;$i<4;$i++)
                            {
                               echo "['{$element_text[$i]}'".","."{$element_count[$i]}"."],";
                            }
                            ?>


                        ]);

                        var options = {
                            chart: {
                                title: 'Total Number of Posts',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>

                <div id="columnchart_material" style="width: 500px; height: 500px;"></div>
            </div>

            <div class="col-md-6">

                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['Category', 'Number of Comments'],

                           <?php
                            $query="select * from comments where comment_post_id= 1";
                            $result=mysqli_query($connection,$query);
                            $count_id1=mysqli_num_rows($result);

                            $queryforpostid2="select * from comments where comment_post_id= 2";
                            $resultforpostid2=mysqli_query($connection,$queryforpostid2);
                            $count_id2=mysqli_num_rows($resultforpostid2);

                            $post_category=['Margdarshak','Renewable Energy'];
                            $post_comment_count=[$count_id1,$count_id2];

                            for($i=0;$i<2;$i++)
                            {
                                echo "['{$post_category[$i]}'".","."{$post_comment_count[$i]}"."],";
                            }
                            ?>

                        ]);
                        var options = {
                            title: 'Number of Comments in Each Category'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                    }
                </script>
                <div id="piechart" style="width: 600px; height: 500px;"></div>
            </div>


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
