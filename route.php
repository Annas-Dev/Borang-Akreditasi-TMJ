<?php
$page = isset($_GET['mod']) ? $_GET['mod'] : '';
if($page == 'borang'){
    include "borang.php";
} else {
    include "home.php";
}
?>