<html>
<head>
    <title> BMI Calculator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
</head>
<body>
<form method="post">
<div class="jumbotron">
   Enter Text: <input type="text" name="first" >
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</form>
<?php

 if(isset($_POST['submit'])) {
     global $first;
     $first = $_POST['first'];
     ?>
     <div class="well">
             <?php  echo $first;?>
     </div>
     <?php
 }
?>
</body>
</html>