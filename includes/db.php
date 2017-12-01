<?php

$connection=mysqli_connect("localhost","root","","mysql");
if(!$connection)
{
    die("cannot connect to database".mysqli_connect_error($connection));
    }


