<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['username']) && isset($_GET['password'])){
$username = $_GET['username'];
$password = $_GET['password'];
// $status = "0";
$created = date(Ymd);

$query="INSERT INTO users(username,password,date_created)  VALUES ('$username', '$password', NOW())";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);
}
?>
