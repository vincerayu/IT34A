<?php
require_once ('config/config.php');
require_once ('includes/activity-logger.php');

$user_id = "root" ?? null;
$user_email = "root" ?? null;

$success = logactivity($pdo,$user_name,$user_email, 'test_activity' , 'success');

if($success){
    echo "Activity log insert successfuly."
}else{
    echo "Failed to imsert activity log."
}

?>

//on config
// require_once(_DIR_ . '/..includes/activity-logger.php');