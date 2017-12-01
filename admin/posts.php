<?php
if (isset($_GET['source'])) {
    $source = $_GET['source'];


    switch ($source) {
        case 'addposts';
            include "includes/addposts.php";
            break;

        case 'editpost';
            include "includes/editpost.php";
            break;

        default:
            include "viewallposts.php";

    }
}
?>