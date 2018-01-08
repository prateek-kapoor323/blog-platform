<?php ob_start();?>
<?php include "includes/db.php";?>
<html>
<head>
<title>Signup</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div><?php include "includes/navigation.php";?></div>
   <br>
   <br>
   <br>
<br>
    <div class="container">

    <form  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control"  placeholder="Username" name="username" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" placeholder="Enter Password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <label for="First Name">First Name</label>
            <input type="text" class="form-control"  placeholder="First Name" name="firstname" required>
        </div>

        <div class="form-group">
            <label for="Last Name">Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
        </div>
        <div class="form-group">
            <label for="Role">Role</label>
            <select name="role" required>
                <option value="Select Role">Choose Role</option>
                <option value="Admin">Admin</option>
                <option value="Subscriber">Subscriber</option>
            </select>
        </div>

        <label for="image">Upload Image</label>
        <br>
        <input type="file" name="image" id="fileToUpload">
        <br>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
</div>
<?php include "includes/footer.php";?>
</body>
</html>

<?php
if(isset($_POST['register']))
{
    $username=$_POST['username'];
    $user_password=$_POST['password'];
    $user_firstname=$_POST['firstname'];
    $user_lastname=$_POST['lastname'];
    $user_email=$_POST['email'];
    $user_role=ucfirst($_POST['role']);
    $user_image = $_FILES['image']['name'];
    $user_image_temp =$_FILES['image']['tmp_name'];
    $user_date=date('d-m-y');
    move_uploaded_file($user_image_temp,"images/user/$user_image");


    $query="INSERT INTO users(username, user_password,user_firstname,user_lastname,user_email,user_image, user_role,user_date) VALUES ('$username' ,'$user_password',
    '$user_firstname','$user_lastname','$user_email','$user_image','$user_role',now())";
    $result=mysqli_query($connection,$query) or die (mysqli_error($connection));
    if(!$query)
    {
        DIE("Query Failed".mysqli_connect_error($connection));
    }
    else{
        echo "<b>"."Details submitted successfully, You are being redirected to login page"."<b>";
        header( "refresh:2;url=index.php" );
    }
}
?>

