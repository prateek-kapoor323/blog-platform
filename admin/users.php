<?php
if (isset($_GET['source'])) {
    $source = $_GET['source'];


    switch ($source) {
        case 'addusers';
            include "includes/addusers.php";
            break;

        case 'editpost';
            include "includes/edit_users.php";
            break;

        case 'viewallusers';
            include "includes/view_all_users.php";
            break;


        default:
            include "includes/view_all_users.php";

    }
}
?>