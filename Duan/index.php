<?php
include "view/header.php";
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case 'value':
            # code...
            break;
        
        default:
            include "view/body.php";
            break;
    }
}else {
    include "view/body.php";
}
include "view/footer.php";

?>