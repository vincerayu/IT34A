<?php
function logactivity($pdo,$user_id,$email,$action, $status='success'){
try{
    //Get client ip address
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADOR'] ?? 'unkown';
if (strpos ($ip,',')!== false){
    $ip = trim (explode(',',$ip)[0]);
}
     //Get user agent(browser)
 $user_agent = substr($_SERVER['HTTP_USER_AGENT'] ?? 'unkown' , 0,255);


 //query
 $stmt = $pdo->prepare("
  INSERT INTO activity_logs (
  user_id,
  user_email,
  activity_log_action,
  activity_log_status,
  activity_log_ip_address,
  activity_log_user_agent,
  ) VALUES (?,?,?,?,?,?)

 ")
} catch(PDOExeption $e){
    error_log("Activity Log Error:" . $e->getMessage());
    return false;
}
}
?>