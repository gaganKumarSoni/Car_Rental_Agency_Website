<?php
$servername = "remotemysql.com:3306";
$username = "46jFxTqxq7";
$password = "1VVPXVhnfa";
$database = "46jFxTqxq7";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error());
}
#echo "Connected successfully".connection_status();
function getSessionDetail($table){
  global $conn;
  $ses_email = $_SESSION['useremail'];
  $ses_name = $_SESSION['username'];
  $sql = ($table=="agency") ? "SELECT aid, aname FROM $table WHERE aemail='$ses_email' AND aname='$ses_name'" : "SELECT cid, cname FROM $table WHERE cemail='$ses_email' AND cname='$ses_name'";
  $reslt = $conn->query($sql)->fetch_assoc();
  return ($table=="agency") ? array($reslt['aid'], $reslt['aname']) : array($reslt['cid'],  $reslt['cname']);
}
?>