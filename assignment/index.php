<?php
include_once("Home.html");
mysql_connect('localhost','root','');
mysql_select_db('cloudweb_db');
$hostname = 'localhost';
$database = 'cloudweb_db';
$username = 'root';
$password = '';

//opening conneection
$conn = new mysqli ($hostname, $username, $password, $database);
//check connection
if ($conn->connect_error) {
  die($conn->connect_error);
}

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

  if (isset($_POST['createweb'])) $createweb = true;  else $createweb = false;
  if (isset($_POST['hire'])) $hire = true;  else $hirre = false;
  if (isset($_POST['moreinfo'])) $moreinfo = true;  else $moreinfo = false;

$reference = $_POST['reference'];
$questions = $_POST['questions'];

$query = "INSERT into consult(fname, lname, email, phone, createweb, hire, moreinfo, reference, questions)
VALUES('$fName', '$lName', '$email', '$phone', '$createweb', '$hire', '$moreinfo', '$reference', '$questions')";

$results = $conn->query($query);

echo "string";
if(!$results){
  echo " insert failed"."<br/>";
}
else {
  echo " insert successfully"."<br/>";
}

$query = "select * from consult";
$results = $conn->query($query);

if (!$results) {
  echo " select error";
}

while ($row = mysqli_fetch_array($results)) {
  echo
  $row['id']." ".$row['fname']." ".$row['lname']." ".$row['email']." ".$row['phone']."<br/>";
}
?>
