<?php
$names = array();
foreach(glob('form-*.txt') as $file) {
    $names[] = basename($file);
}
foreach ($_POST["checks"] as $i){
    unlink($names[$i]);
}
header('Location: admin.php');
exit;